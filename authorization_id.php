<?php

  global $wpdb;
  $table_name = $wpdb->prefix . "transaction_details_table"; 
  $wpdb->insert($table_name, array('order_id'=>$order_id, 'authorization_id'=> $payment_id, 'capture_id'=> ''),
  array('%s', '%s', '%s'));

  if (!is_admin()) {
      WC()->session->set('payment_id', $payment_id);
  }
