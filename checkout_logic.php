<?php

session_start();
//Template Name:checkoutlogic
	global $wpdb;
    // $wpdb->show_errors();
    $status = 'pending';
    //$post_date = date('Y-m-d h:i:s');
	$post_date = date("Y-m-d",strtotime("+1 day",strtotime(date("Y-m-d",strtotime("now") ) )));//date('Y-m-d h:i:s', strtotime( $d . " +1 days"));
   	
	//For Order Key

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i <= 13; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    //$orderString = 'BW_'.$randomString;
    $count_query1 = "select count(*)+1 as total from `wc_custom_orders`";
    $results1 = $wpdb->get_results($count_query1);
    // $orderString = 'BW_'.$randomString;
    $object_encoded = json_encode( $results1 );
    $object_decoded = json_decode( $object_encoded, true );

    $orderString = $_POST['lname'].'-'.$post_date.'-00'.$object_decoded[0]['total'];//year-month-day-sequence so, Hayward-2020-04-22-001
    $package_d = $_POST['_Month'];//$_POST['my'] .'-'.$_POST['_Month'];
	$str = $package_d;
    $parts = explode("_", $str);
    $months = explode('-', $parts[0]);
 	$package_duration = $months[0];
    $str = $package_duration;
    preg_match_all('/\d+/', $str, $value);
    $end_date=date("Y-m-d",strtotime("+". $value[0][0] ." month",strtotime(date("Y-m-d",strtotime("now") ) )));
    $count_query = "select * from `wc_custom_orders`";
    $results = $wpdb->get_results($count_query);
    if(!empty($results))                        // Checking if $results have some values or not
    { 
        foreach($results as $row){
            $customerId = $row->customer_id;
        }
    }
    $customerId = $customerId + 1;
	

	$post_data = array(
       'order_key' => $orderString, 
       'package_name' => $_POST['title'],
       'package_duration' => $package_duration,
       'package_price' => $_POST['cost'],
       'tax_amount' => '0', 
       'quantity' => '1', 
       'customer_id' => $customerId,
       'created_via' => 'checkout', 
       'date_paid' => $post_date, 
       'paid_date' => $post_date,
       'billing_first_name'=> $_POST['fname'],
       'billing_last_name'=> $_POST['lname'],
       'billing_company'=> $_POST['company'],
       'billing_address_1'=> $_POST['addressone'],
       'billing_address_2'=> $_POST['addresstwo'],
       'billing_city'=> $_POST['city'],
       'billing_state'=> $_POST['statprov'],
       'billing_postalcode'=> $_POST['zipcode'],
       'billing_country'=> $_POST['country'],
       'shipping_first_name'=> $_POST['fname'],
       'shipping_last_name'=> $_POST['lname'],
       'email' => $_POST['email'],
       'shipping_cost' => '0', 
	   'package_startdate' => $post_date,
       'package_enddate' => $end_date,
       'shipping_tax_cost' => '0', 
       'file_attached' => ''
    );
    //put into post table
    $wpdb->insert('wc_custom_orders', $post_data);
     //$wpdb->print_error();
     //var_dump($wpdb);
    $new_id = $wpdb->insert_id; //'order_details' =>
  

    if($new_id)
    {
        $execute1 = $wpdb->query
        ("
        UPDATE `wc_custom_orders` 
        SET `order_details` = '<a href=\'https://beltwayad.com/order/". $new_id ."'\' target=\'_blanck\'>abc</a>',
        WHERE `id` = ". $new_id ."
        ");
        $execute2 = $wpdb->query
        ("
        UPDATE `wc_custom_orders` 
        SET `reciept` = '<a href=\'https://beltwayad.com/reciept/". $new_id ."'\' target=\'_blanck\'>abc</a>'
        WHERE `id` = ". $new_id ."
        ");

      if ( !function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
      $uploadedfile = $_FILES['fileToUpload'];
 
      // if($_POST['contents'] == 'video')
        // {
          if (($_FILES["fileToUpload"]["type"] == "video/mp4")
                || ($_FILES["fileToUpload"]["type"] == "video/env")) {
           
            $upload_overrides = array( 'test_form' => false );
            $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );

            if ( $movefile ) {
                  $filename = substr(strrchr(rtrim($movefile['file'], '/'), '/'), 1);
                  // echo "File is valid, and was successfully uploaded.\n";
                  $execute = $wpdb->query
                  ("
                  UPDATE `wc_custom_orders` 
                  SET `file_attached` = '<a href=\'". $movefile['url'] ."\' target=\'_blanck\' >". $filename ."</a>'
                  WHERE `id` = ". $new_id ."
                  ");

                echo  $new_id;
            }
          }else{
            // echo "error";
          }
                
        // } else if($_POST['contents'] == 'image')
        // {
               	 if (($_FILES["fileToUpload"]["type"] == "image/gif")
                || ($_FILES["fileToUpload"]["type"] == "image/jpeg")
                || ($_FILES["fileToUpload"]["type"] == "image/jpg")
                || ($_FILES["fileToUpload"]["type"] == "image/png")) {
                
                  $upload_overrides = array( 'test_form' => false );
                  $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
                  if ( $movefile ) {
                    $filename = substr(strrchr(rtrim($movefile['file'], '/'), '/'), 1);
                    // echo "File is valid, and was successfully uploaded.\n";
                    $execute = $wpdb->query
                    ("
                    UPDATE `wc_custom_orders` 
                    SET `file_attached` = '<a href=\'". $movefile['url'] ."\' target=\'_blanck\' >". $filename ."</a>'
                    WHERE `id` = ". $new_id ."
                    ");

                  	echo  $new_id;
  
                  } else {
                  //     echo "error";
                  }
                   
                }else{
                   
                   //echo "error";
                 }
        // }

      //Registering Cart Items in Session        
      $_SESSION['orderString'] = $orderString;
      $_SESSION['title'] = $_POST['title'];
      $_SESSION['duration'] = $package_duration;
      $_SESSION['cost'] = $_POST['cost'];
      $_SESSION['fname'] = $_POST['fname'];
      $_SESSION['lname'] = $_POST['lname'];
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['postdate'] = $post_date;
      $_SESSION['enddate'] = $end_date;

      
            // Mail Functionality to Admin...
            // $to = "xyz@somedomain.com";
            // $subject = "This is subject";
            
            // $message = "<b>This is HTML message.</b>";
            // $message .= "<h1>This is headline.</h1>";
            
            // $header = "From:abc@somedomain.com \r\n";
            // $header .= "Cc:afgh@somedomain.com \r\n";
            // $header .= "MIME-Version: 1.0\r\n";
            // $header .= "Content-type: text/html\r\n";
            
            // $retval = mail ($to,$subject,$message,$header);
            
            // //Redirect::
            
            // if( $retval == true ) {
                
                //$custom_page_url = 'http://localhost:81/beltwayad/wp__/thanks/';

                //wp_redirect( $custom_page_url );
                //exit;
            // }else {
            //     echo "Message could not be sent...";
            // }
            
    }
?>