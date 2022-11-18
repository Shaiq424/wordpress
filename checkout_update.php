<?php
	//Template Name:checkoutlogicupdate
	global $wpdb;
	$id =  trim($_GET['id']);

	$status = 'pending';
    $post_date = date('Y-m-d h:i:s');
	
	//For Order Key

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i <= 13; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $orderString = 'wc_order_'.$randomString;
    $package_duration = $_POST['my'] .'-'.$_POST['_Month'];

    $count_query = "select * from `wc_custom_orders`";
    $results = $wpdb->get_results($count_query);
    if(!empty($results))                        // Checking if $results have some values or not
    { 
        foreach($results as $row){
            $customerId = $row->customer_id;
        }
    }
    $customerId = $customerId + 1;
	
	$execute = $wpdb->query( $wpdb->prepare("UPDATE `wc_custom_orders` 
    	SET `file_attached` = '<a href=\'". $movefile['url'] ."\' target=\'_blanck\' >". $filename ."</a>',
       `package_name`= ".$_POST['title'].",
       `package_duration` = ".$package_duration.",
       `package_price` = ".$_POST['cost'].",
       `tax_amount` = '0',
       `quantity` = '1', 
       `customer_id` = ". $customerId.",
       `created_via` = ".'checkout'.", 
       `date_paid` = ".$post_date.", 
       `paid_date` = ".$post_date.",
       `billing_first_name`= ".$_POST['fname'].",
       `billing_last_name`= ".$_POST['lname'].",
       `billing_company`= ".$_POST['company'].",
       `billing_address_1`= ".$_POST['addressone'].",
       `billing_address_2` = ".$_POST['addresstwo'].",
       `billing_city`= ".$_POST['city'].",
       `billing_state` = ".$_POST['statprov'].",
       `billing_postalcode` = ".$_POST['zipcode'].",
       `billing_country` = ".$_POST['country'].",
       `shipping_first_name` = ".$_POST['fname'].",
       `shipping_last_name` = ".$_POST['lname'].",
       `shipping_cost` = '0', 
       `shipping_tax_cost` = '0', 
       `file_attached` => ''
       	WHERE `id` = ".$id ."")
    );

       //if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
if ( !function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
      $uploadedfile = $_FILES['fileToUpload'];

      if($_POST['contents'] == 'video')
        {
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
				echo  $id;
            }
          }else{
            echo "error";
          }
       } else if($_POST['contents'] == 'image')
        {
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

       				echo $id;
                  } else {
                       echo "error";
                  }
                  	
            
                }else{
                   
                   echo "error";
                 }
        }
        //$uploadedfile = $_FILES['fileToUpload'];
        //$upload_overrides = array( 'test_form' => false );
        //$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
        //if ( $movefile ) {
         // $filename = substr(strrchr(rtrim($movefile['file'], '/'), '/'), 1);
          // echo "File is valid, and was successfully uploaded.\n";
         // $execute = $wpdb->query
           // ("
                 //       UPDATE `wc_custom_orders` 
             //           SET `file_attached` = '<a href=\'". $movefile['url'] ."\' target=\'_blanck\' >". $filename ."</a>'
               //         WHERE `id` = ". $id ."
                   //     ");

          //echo  $id;
        //} 
	
?>	