<?php
/*
Plugin Name: WooCommerce payment plugin
Plugin URI: https://
Description: This is a payment plugin used to process payments from WooCommerce stores. 
Version: 1.1.0
Author: Asterisk
Author URI: https://
License: 
Text Domain: payment
*/


if(!defined('ABSPATH')){
   exit;
}

register_activation_hook( __FILE__, 'add_transactions_table' );

//creating table in wordpress database
function add_transactions_table()
{
    global $wpdb;
    $table_name = $wpdb->prefix . "transaction_details_table"; 
    $charset_collate = $wpdb->get_charset_collate();
     $sql = "CREATE TABLE IF NOT EXISTS $table_name (
      order_id varchar(255) NOT NULL,
      authorization_id LONGTEXT NOT NULL,
      capture_id LONGTEXT NOT NULL,
      PRIMARY KEY  (order_id)
    ) $charset_collate";
    require_once( ABSPATH .'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}


//Handle capture of payment on the admin side
add_action('wp_ajax_finish', 'finish');
add_action( 'wp_ajax_nopriv_finish', 'finish' );

function finish()
{

    global $wpdb; 
    $table_name = $wpdb->prefix . "transaction_details_table"; 
    $order_id = $_POST['order_id'];
    $order = wc_get_order($order_id);

    $total = $order->get_total();
    $currency = $order->get_currency();

    $id = $wpdb->get_row("SELECT * FROM $table_name WHERE order_id = $order_id");
    $authorization_id = $id->authorization_id;
    
    include 'capture.php';

    if ($trans == 'success') {
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET capture_id='$capture_id' WHERE order_id = $order_id"));
        echo $trans;

    } else if ($trans == 'error') {
        echo $trans;

    } else {
        echo 'error';
    }

    wp_die(); 
}


//Handle reversal of an authorization
add_action('wp_ajax_reversal', 'reversal');
add_action( 'wp_ajax_nopriv_reversal', 'reversal' );

function reversal()
{

    $auth_id = WC()->session->get( 'payment_id' );
    
    if ($auth_id != "") {

        $reason = $_POST['reason'];
        $order_id = $_POST['order_id'];

        $order = wc_get_order($order_id);
        $amount = $order->get_total();
        $currency = $order->get_currency();

        include 'authorization_reversal.php';

        if ($reverse == "success") {
            echo $reverse;
            wp_delete_post($order_id, true);
            WC()->session->__unset( 'payment_id' );

        } elseif ($reverse == "error" ) {
            echo $reverse;
        }
        
        wp_die(); 
   } else {
      echo "done";
   }
}


//Handle setup of payer authentication
add_action('wp_ajax_setup', 'setup');
add_action( 'wp_ajax_nopriv_setup', 'setup' );

function setup()
{
    $token = $_POST['tk'];
    include 'setup.php';

    if ($status == 'success') {
        echo json_encode($data);
    }else {
        echo $status;
    }

    wp_die(); 
}


//Handle enrollment of payer authentication
add_action('wp_ajax_enroll', 'enroll');
add_action( 'wp_ajax_nopriv_enroll', 'enroll' );

function enroll()
{
    $token = $_POST['tk'];

    $total = WC()->cart->get_cart_contents_total();
    $currency = get_woocommerce_currency();

    $first_name = $_POST['fname'];
	$last_name = $_POST['lname'];
	$street_address = $_POST['address'];
	$locality = $_POST['locality'];
	$country = $_POST['country'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

    include 'enrollment.php';

    if ($status == 'success') {
        echo json_encode($data);
    }else {
        echo $status;
    }

    wp_die(); 
}



add_filter('woocommerce_payment_gateways', 'payment_class');

function payment_class($gateways)
{
  $gateways[] = 'Payment_Plugin';
  return $gateways;
}



add_action('plugins_loaded', 'payment_init', 11);

$icon = plugin_dir_url( __FILE__ ).'/images/img.png';

//Initializing class
function payment_init()
{
    if (class_exists('WC_Payment_Gateway')) {

        class  Payment_Plugin extends WC_Payment_Gateway {
            public function __construct()
            {
                global $icon;
                $this->id = 'asterisk';
                $this->icon = $icon;
                $this->hash_fields = true;
                $this->method_title = 'Asterisk Payments';
                $this->method_description = 'This payment plugin enables WooCommerce stores to receive card payments'; // will be displayed on the options page
            
                $this->supports = array(
                    'products',
                    'refunds',
                );

                // Method with all the options fields
                $this->init_form_fields();
            
                // Load the settings.
                $this->init_settings();

                $this->title = $this->get_option( 'title' );
                $this->description = $this->get_option( 'description' );
                $this->enabled = $this->get_option( 'enabled' );
                $this->merchant_id = $this->get_option( 'merchant_id' );
                $this->private_key = $this->get_option( 'private_key' );
                $this->publishable_key = $this->get_option( 'publishable_key' );
            
                add_action( 'wp_enqueue_scripts', array( $this, 'assets' ), 100 );

                // This action hook saves the settings
                add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
            
                add_action('woocommerce_before_checkout_form', array($this, 'scripts')); 

                add_filter('woocommerce_order_button_html', function(){
                    return '<button id ="pay-button" style="border-radius: 10px;" class ="new_submit button">Place order</button>';
                }); 

                add_action( 'woocommerce_order_details_after_order_table', array($this, 'reverse_transaction'), 10, 1);

                add_action( 'woocommerce_order_item_add_action_buttons', array($this, 'complete_transaction'), 10, 1);
                
                add_action( 'woocommerce_email_after_order_table', 'request_refund', 15, 2 );
                
            }

            
            //Adding refund email to the order email
            public function request_refund( $order ) 
            {
                $email = get_option( 'admin_email' );
                echo '<br /><p>Incase of any issues like Requesting Refund, please send an email to '.$email.'</p>';
            }
            
            
            //Capture transaction by admin
            public function complete_transaction($order)
            {
               $label = esc_html__('Custom', 'woocommerce');
               $slug = 'confirm payment';

               global $wpdb;
               $table_name = $wpdb->prefix . "transaction_details_table"; 
               $order_id = $order->get_id();
               $output = $wpdb->get_row("SELECT * FROM $table_name WHERE order_id = $order_id");
           
               if ($output) {
                   $authorization_id = $output->authorization_id;
                   $capture_id = $output->capture_id;

                  if ($authorization_id != "" && $capture_id == "") {
                    $capture = true;

                  } else {
                    $capture = false;
                  }
               }

               ?>
                  <button style = "display : none;" class = "button myajax" id = "capture">Finish Transaction</button>

                  <script>
                    var capture = <?php echo $capture; ?>;
                    var order_id = <?php echo $order_id; ?>;
                     
                    if (capture == true) {
                        document.getElementById('capture').style.display = 'block';
                    }

                    jQuery(document).ready(function($) {

                        $('.myajax').click(function(e){
                            e.preventDefault();
                            document.getElementById('capture').innerHTML = 'processing...';
                            var ajaxurl = '<?php echo admin_url('admin-ajax.php');?>';

                            var data = {
                                action: 'finish',
                                order_id: order_id
                            };

                            $.post(ajaxurl, data, function(response) {
                                //alert(response);
                                if (response == 'success') {
                                    document.getElementById('capture').style.display = 'none';
                                    document.getElementById('capture').innerHTML = 'Finish Transaction';

                                    alert('Transaction completed successfully');
                                    
                                }else if (response == 'error'){
                                    document.getElementById('capture').innerHTML = 'Finish Transaction';
                                    alert('An error occurred during processing, please try again');
                                }
                            });
                        });
                    });
                  </script>
               <?php
            } 


            //Reversing a given transaction
            public function reverse_transaction($order)
            {
                $id = $order->get_id();
            
             ?>
             <div id = "reverse">
                <div class="row">
                    <p style="color : red;">Incase you want to reverse your transaction immediately, click this button</p>
                </div>
                <div class="row">
                    <button class="btn btn-lg" style="border-radius: 10px;" id="reverse-button">Reverse</button>
                </div>

                <div id="reverse-form" style="display: none; margin-top : 15px;">
                    <form method="post">
                        <div class="row">
                            <div class="card px-1 py-4">
                                <div class="card-body">
                                    <h6 class="information mt-4">Please enter your reason</h6>
                                    <div class="row">
                                        <div class="col-sm-12"> 
                                            <div class="form-group">
                                                <!-- <label for="name">Name</label> --> 
                                                <input class="form-control" id="the_reason" type="text" placeholder="Reason" name="reason" required /> 
                                            </div>
                                        </div>
                                    </div>            
                                    <button id="confirm" class="btn btn-block confirm-button" type="submit">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
              
              <script>
                var order_id = <?php echo $id;?>;
                var rev = document.getElementById('reverse-button');

                rev.addEventListener('click', ()=> {
                    document.getElementById('reverse-form').style.display = 'block';
                })

                jQuery(document).ready(function($) {

                    $('#confirm').click(function(e){
                        e.preventDefault();
                        var reason = document.getElementById('the_reason').value;

                        if ( reason != '') {
                            document.getElementById('confirm').innerHTML = 'processing...';
                            var ajaxurl = '<?php echo admin_url('admin-ajax.php');?>';
            
                            var data = {
                                action: 'reversal',
                                order_id: order_id,
                                reason : reason
                            };

                            $.post(ajaxurl, data, function(response) {
                                //alert(response);
                                if (response == 'success') {
                                    alert(' Reversal completed successfully');
                                    document.getElementById('confirm').innerHTML = 'Confirm';
                                    document.getElementById('reverse').style.display = 'none';

                                }else if (response == 'error'){
                                    document.getElementById('confirm').innerHTML = 'Confirm';
                                    alert('An error occurred during processing, please try again');
                                } else if (response == "done"){
                                    alert('Transaction already reversed');
                                }
                            });

                        } else {
                            alert('Enter reason');
                        }
                    });
                });
              </script>
             <?php
            }


            //Processing refund
            public function process_refund($order_id, $amount = null, $reason = '')
            {
                global $wpdb;
                $table_name = $wpdb->prefix . "transaction_details_table";  
                $result = $wpdb->get_row("SELECT * FROM $table_name WHERE order_id = $order_id");
                   
                $order = wc_get_order($order_id);

                $total = $amount;
                $currency = $order->get_currency();

                $capt_id = $result->capture_id;

                if ($capt_id != "") {
                    include 'refund_capture.php';

                    if ($status == true) {
                       return true;

                    } else if ($status == false) {
                       return false;

                    }
                } else {
                    return false;
                }
            }


            //linking scripts to the plugin
            public function scripts()
            {
            ?>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <?php
            }

            

            public function init_form_fields()
            {
                $this->form_fields = array(
                    'enabled' => array(
                        'title'       => 'Enable/Disable',
                        'label'       => 'Enable Asterisk Payment Plugin',
                        'type'        => 'checkbox',
                        'description' => '',
                        'default'     => 'no'
                    ),
                    'title' => array(
                        'title'       => 'Title',
                        'type'        => 'text',
                        'description' => 'This controls the title which the user sees during checkout.',
                        'default'     => 'Credit/Debit Card',
                        'desc_tip'    => true,
                    ),
                    'description' => array(
                        'title'       => 'Description',
                        'type'        => 'textarea',
                        'description' => 'This controls the description which the user sees during checkout.',
                        'default'     => 'Pay with your credit card via our super-cool payment gateway.',
                        'desc_tip'    => true,
                    ),

                    'merchant_id' => array(
                        'title'       => 'Merchant ID',
                        'type'        => 'text',
                        'desc_tip'    => true,
                    ),

                    'publishable_key' => array(
                        'title'       => 'Live publishable key',
                        'type'        => 'text',
                    ),

                    'private_key' => array(
                        'title'       => 'Live private key',
                        'type'        => 'password',
                    ),

                );
            }

            

            //Processing payment
            public function process_payment( $order_id )
            {
                $order = wc_get_order($order_id);

                if ($_POST['flexresponse'] == "") {
                    wc_add_notice('An error occurred, please try again', 'error');
   
                } else {
                    # code...
                    $transientToken = $_POST['flexresponse'];
                    $token = $_POST['token'];

                    $first_name = $order->get_billing_first_name();
                    $last_name = $order->get_billing_last_name();
                    $country = WC()->countries->countries[$order->get_billing_country()];
                    $count = $order->get_billing_country();
                    $state = WC()->countries->get_states($count)[$order->get_billing_state()];
                    $locality = $order->get_billing_city();
                    $street_address = $order->get_billing_address_1();
                    $email = $order->get_billing_email();
                    $phone = $order->get_billing_phone();
                    $total = $order->get_total();
                    $currency = $order->get_currency();
                    
                    include 'payment.php';

                    if ($payment == "error") {
                        wc_add_notice('An error occurred, please try again', 'error' );

                    } else if ($payment == "INVALID_REQUEST") {
                        wc_add_notice('An error occurred due to an invalid request, please try again', 'error' );
                    
                    }else if ($payment == "DECLINED") {
                        wc_add_notice('This transaction was declined, please check your account balance or contact your bank', 'error' );
                    
                    } else if ($payment == "AUTHORIZED") {

                        include 'authorization_id.php';

                        $order->payment_complete();
                        $order->reduce_order_stock();
                        //$order->update_status('completed');

                        // some notes to customer
                        $order->add_order_note( 'Hey, your order is paid! Thank you!', false);
                            
                        // Redirect to the thank you page
                        return array(
                            'result' => 'success',
                            'redirect' => $this->get_return_url( $order )
                        );
                    }   
               
                }
            }


            //Displaying payment form
            public function payment_fields()
            {
                //delete_option( 'my_option' );
                delete_option( 'merchant_id' );
                delete_option( 'private_key' );
                delete_option( 'publishable_key' );

                add_option( 'merchant_id', $this->merchant_id );
                add_option( 'private_key', $this->private_key );
                add_option( 'publishable_key', $this->publishable_key );

                include 'key.php';

                if ($jwt_error != '') {
                    wc_add_notice('An error occurred, Please refresh page to view the payment section', 'error');

                 } else {                
                    include 'checkout.php';
                 }
            }
         


            //add css and javascript files.
            public function assets()
            { 
                wp_enqueue_style(
                    'bootstrap_css',
                    plugin_dir_url( __FILE__ ) . '/css/bootstrap.min.css'
                );
                 
                wp_enqueue_style(
                    'styles',
                    plugin_dir_url( __FILE__ ).'/css/styles.css'
                );

                wp_enqueue_script(
                    'javascript',
                    plugin_dir_url( __FILE__ ).'/js/form.js'
                );
            }
        }
    }
}



