<?php
  //https://discord.gg/UZECupU6eg
  //http://localhost/wordpress/wp-admin/
  //https://developer.cybersource.com
  //keys
?>


<div>
  <iframe name=”ddc-iframe” height="10" width="10" style="display: none;">
  </iframe>
  <form id="ddc-form" target=”ddc-iframe” method="POST" action="">
      <input id = "access" type="hidden" name="JWT" value=""/>
  </form>

  <div class="row">
    <div class="form-group col-md-12">
      <label for="cardNum">Card Number</label>
      <img id = "card" src = "" style = "height :25px;" />
      <div id = 'number-container' class="form-control"></div>
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-6">
      <label for="expMonth">Expiry Date</label>
      <input type="text" autocomplete = "off"  id="expDate" oninput = "expiryDate()" style = "border-style: solid; border-width: 0.5px; border-color: #e2e2e2; background-color: #fff; width: 100%" class="form-control" name = "month" placeholder = "MM/YY"  maxlength = "5" size = "5">
    </div>

    <div class="form-group col-md-6">
      <label for="cVV">CVV</label>
      <div id = 'securityCode-container' class="form-control"></div>
    </div>
  </div>
  
  <input type="hidden" id="flexresponse" name="flexresponse">
  <input type="hidden" id="token" name="token">

</div>

<script src="https://flex.cybersource.com/cybersource/assets/microform/0.11/flex-microform.min.js"></script>


<script>
    month = '';
    year = '';
    
    //expiry date function
    function expiryDate()
    {
      var button = document.querySelector('#pay-button');
      button.disabled = true;

      var date = document.querySelector('#expDate');

      if (date.value.length == 2 && isNaN(date.value) == false) {
          month = date.value;
          date.value = month + '/';

      } else if (date.value.length == 2) {
        date.value = date.value.charAt(0);

      } else if (date.value.length == 5) {
        year = 20 + date.value.charAt(3) + date.value.charAt(4);
        button.disabled = false;
      }
    }


    // JWK is set up on the server side route
    var payButton = document.querySelector('#pay-button');
    var flexResponse = document.querySelector('#flexresponse');
    var tken = document.querySelector('#token');
    var errorsOutput = document.querySelector('#errors-output');
    var num = document.querySelector('#number-container');
    var card = document.querySelector('#card');

    // the capture context that was requested server-side for this transaction
    var captureContext = '<?php echo $captureContext; ?>';

    // custom styles that will be applied to each field we create using Microform
    var myStyles = { 
      'input': {    
            'font-size': '14px',    
            'font-family': 'helvetica, tahoma, calibri, sans-serif',    
            'color': '#555'  
        },  
      ':focus': { 'color': 'blue' },  
      ':disabled': { 'cursor': 'not-allowed' },  
      'valid': { 'color': '#3c763d' },  
      'invalid': { 'color': '#a94442' } 
    };

    // setup
    var flex = new Flex(captureContext);

    if (flex) {

      var microform = flex.microform({ styles: myStyles });
      var number = microform.createField('number', { placeholder: '•••• •••• •••• ••••' });
      var securityCode = microform.createField('securityCode', { placeholder: '•••' });

      number.load('#number-container');
      securityCode.load('#securityCode-container');

      number.on('change', function(data) {
          if (data.card[0].name == 'visa') {
            card.src = '<?php echo plugin_dir_url( __FILE__ ).'/images/visa.png'; ?>';
          
          } else if (data.card[0].name == 'mastercard') {
            card.src = '<?php echo plugin_dir_url( __FILE__ ).'/images/mastercard.png'; ?>';

          } else if (data.card[0].name == 'amex') {
            card.src = '<?php echo plugin_dir_url( __FILE__ ).'/images/amex.png'; ?>';

          } else if (data.card[0].name == 'maestro') {
            card.src = '<?php echo plugin_dir_url( __FILE__ ).'/images/disc.png'; ?>';

          }
      });

    } else {
        alert('An error occurred, Please refresh page to view the payment section');
    }


    jQuery(document).ready(function($) {

      $('.new_submit').click(function(e){

        if (month != '' && year != '') {
            e.preventDefault();
            payButton.innerHTML = 'processing...';
            payButton.disabled = true;
            Token();
            
        } else {
          e.preventDefault();
          alert('Invalid date');
        }
      });
    });


    //Setting up payer authentication service
    function Setup()
    {
        var ajaxurl = '<?php echo admin_url('admin-ajax.php');?>';

        var data = {
            action: 'setup',
            tk: tken.value,
            //tk: flexResponse.value
        };

        $.post(ajaxurl, data, function(response) {

            if (response != 'error') {
              var res = JSON.parse(response);
              
              document.getElementById('ddc-form').action = res.collection_url;
              document.getElementById('access').value = res.access_token;

              var ddcForm = document.querySelector('#ddc-form');
              if(ddcForm) // ddc form exists
                  ddcForm.submit();

            } else {
              alert('An error occurred while authenticating card, please try again');
              payButton.innerHTML = 'Place order';
              payButton.disabled = false;
              return;
            }
        }); 
    }



    //Enroll to payer authentication service
    function Enroll()
    {

        var ajaxurl = '<?php echo admin_url('admin-ajax.php');?>';

        var data = {
            action: 'enroll',
            tk: tken.value,
            fname: document.querySelector('#billing_first_name').value,
            lname: document.querySelector('#billing_last_name').value,
            address: document.querySelector('#billing_address_1').value,
            locality: document.querySelector('#billing_city').value,
            country: document.querySelector('#select2-billing_country-container').innerHTML,
            email: document.querySelector('#billing_email').value,
            phone: document.querySelector('#billing_phone').value,
        };

        $.post(ajaxurl, data, function(response) {

            if (response == 'error') { 
              alert('An error occurred while authenticating card, please try again');
              payButton.innerHTML = 'Place order';
              payButton.disabled = false;
              
            } else {

              var res = JSON.parse(response);

              if (res.stepup_url != null) {
                 alert('This card is not yet supported by this payment gateway');
                 payButton.innerHTML = 'Place order';
                 payButton.disabled = false;

              } else if (res.stepup_url == null) {
                jQuery( 'form.checkout' ).submit();
                payButton.innerHTML = 'Place order';
                payButton.disabled = false;
              }         
            
            }
        }); 
     }



    //Generating transient token
    function Token()
    {

      var options = {    
          expirationMonth: month,  
          expirationYear: year 
      };

      microform.createToken(options, function (err, token) {
        if (err) {
        // handle error
          alert('An error occurred, please try again');
          payButton.innerHTML = 'Place order';
          payButton.disabled = false;
        } else {
          parseJwt(token);
          //alert(JSON.stringify(token));
          //console.log(JSON.stringify(token));
          flexResponse.value = JSON.stringify(token);

          Setup();
        }
      });
    }

    
    //Decoding transient token
    function parseJwt (tk)
    {
        var base64Url = tk.split('.')[1];
        var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
        var jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
            return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
        }).join(''));

        var transient = JSON.parse(jsonPayload);
        tken.value = transient.jti;
        //console.log(transient);
        //alert(transient.jti);
    }

</script>


<script>
    window.addEventListener("message", (event) => {
        //{MessageType: "profile.completed", Session Id: "0_57f063fd-659a-4779-b45b-9e456fdb7935", Status: true}
        if (event.origin === "https://centinelapistag.cardinalcommerce.com") {
            let data = JSON.parse(event.data);
            //console.log('Merchant received a message:', data);
            Enroll();
        }    
    }, false);

    //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
</script>

