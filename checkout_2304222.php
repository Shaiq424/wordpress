	<?php
//Template Name:checkout
if ( isset( $_POST['submit'] ) ){
    if(isset($_POST['my']))
    {
        $my = $_POST['my'];
    }
    if(isset($_POST['title']))
    {
        $title = $_POST['title'];
    }
    if(isset($_POST['_month']))
    {
        $_Month = $_POST['_month'];
    }
    if(isset($_POST['cost']))
    {
        $cost = $_POST['cost'];
    }
	if(isset($_POST['radio_']))
    {
        $radio = $_POST['radio_'];
    }
    // $_Month = substr($str, strpos($str, "-") + 1);    
  
	$str = $radio;
    $parts = explode("_", $str);
    $my = explode('-', $parts[0]);
    $cost = explode('-', $parts[1]);
    $cost = $cost[0];
    $_Month = substr($str, strpos($str, "-") + 1);  
}

if( isset($_POST["cheqqckout"]) && !empty($_POST["cheqqckout"]) ){

    global $wpdb;
    // $wpdb->show_errors();

    $status = 'pending';
    //$post_date = date('Y-m-d h:i:s');
  
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
       'shipping_cost' => '0', 
       'shipping_tax_cost' => '0', 
       'file_attached' => ''
    );

    //put into post table
    $wpdb->insert('wc_custom_orders', $post_data);
    // $wpdb->print_error();
    // var_dump($wpdb);
    $new_id = $wpdb->insert_id;
    if($new_id)
    {
        
        if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );

            $uploadedfile = $_FILES['fileToUpload'];
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
              return $new_id;
            } else {
                // echo "Possible file upload attack!\n";
            }

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

}
//For Woocommerce logic..
if ( isset( $_POST['checkout_'] ) ){

    global $wpdb;
    // $wpdb->show_errors();

    $status = 'wc-pending';
    // $old_id = $old_record[0];
    // $name = $old_record[1];
    $post_date = date('Y-m-d h:i:s');

    $post_data = array(
       'post_author' => 1, 
       'post_date' => $post_date,
       'post_date_gmt' => $post_date, 
       'post_content' => $_POST['postcontent'],
       'post_title' => $_POST['title'], 
       'post_excerpt' => '', 
       'post_status' => $status,
       'comment_status' => 'open', 
       'ping_status' => 'close', 
       'post_password' => '',
       'post_name' => $_POST['title'], 
       'to_ping' => '', 
       'pinged' => '', 
       'post_modified' => $post_date,
       'post_modified_gmt' => $post_date,
       'post_parent' => '0',
       'guid' => 'http://localhost:81/beltwayad/wp__/?post_type=shop_order',
       'menu_order' => '0',
       'post_type' => 'shop_order',
       'post_mime_type' => '',
       'comment_count' => '0'
);

    //put into post table
    $wpdb->insert('wp_posts', $post_data);
    // $wpdb->print_error();
    // var_dump($wpdb);
    $new_id = $wpdb->insert_id;
    if($new_id)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i <= 13; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $postId = $new_id;

        $table_name = $wpdb->prefix . 'postmeta';
        $count_query = "select * from `wp_postmeta` where meta_key = '_customer_user';";
        $results = $wpdb->get_results($count_query);
        if(!empty($results))                        // Checking if $results have some values or not
        { 
            foreach($results as $row){
                $customerId = $row->meta_value;
            }
        }
        $customerId = $customerId + 1;
        // Perhaps you have multiple key value pairs, like this:
        $metaValues = array(
            '_order_key' => 'wc_order_'.$randomString,
            '_customer_user' => $customerId, 
            '_created_via' => 'checkout', 
            '_date_paid' => $post_date, 
            '_paid_date' => $post_date, 
            '_billing_first_name'=> $_POST['fname'],
            '_billing_last_name'=> $_POST['lname'],
            '_billing_company'=> $_POST['company'],
            '_billing_address_1'=> $_POST['addressone'],
            '_billing_address_2'=> $_POST['addresstwo'],
            '_billing_city'=> $_POST['city'],
            '_billing_state'=> $_POST['statprov'],
            '_billing_postcode'=> $_POST['zipcode'],
            '_billing_country'=> $_POST['country'],
            // '_billing_email'=> $_POST['company'],
            // '_billing_phone'=> $_POST['company'],
            '_shipping_first_name'=> $_POST['fname'],
            '_shipping_last_name'=> $_POST['lname'],
            //   ... as many key/values as you want
        );

        // Set all key/value pairs in $metaValues
        foreach ($metaValues as $metaKey => $metaValue) {
            update_post_meta($postId, $metaKey, $metaValue);
        }

        $_query = "select * from `wp_wc_order_product_lookup`";
        $results_ = $wpdb->get_results($_query);
        if(!empty($results_))                        // Checking if $results have some values or not
        { 
            foreach($results_ as $row){
                $productLookupId = $row->order_item_id;
            }
        }
        $productLookupId = $productLookupId + 1;

        $productLookup = array(
            'order_item_id' => $productLookupId,
            'order_id' => $postId, 
            'product_id' => 'checkout', 
            'variation_id' => '', 
            'customer_id' => $customerId, 
            'date_created'=> $post_date,
            'product_qty'=> 1,
            'product_net_revenue'=> $_POST['cost'],
            'product_gross_revenue'=> $_POST['cost'],
            'coupon_amount'=> '0',
            'tax_amount'=> '0',
            'shipping_amount'=> '0',
            'shipping_tax_amount'=> '0'
        );
        
        //put into post table
        $wpdb->insert('wp_wc_order_product_lookup', $post_data);

    }
}

?>

<?php
     get_header();
?>
<section id="pricing-nav">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-11">
          <div class=" logo-pricing"><img src="<?php echo get_header_image(); ?>" alt="" height="60px"></div>
        </div>
      </div>
    </div>
  </section>
  <section id="price-home">
    <div class="container-fluid">
      <div class="nav-menu">
        <div class="button_container" id="toggle">
          <span class="top"></span>
          <span class="middle"></span>
          <span class="bottom"></span>
        </div>

        <div class="overlay" id="overlay">
          <nav class="overlay-menu">
          <?php
            wp_nav_menu( array(
                'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                ) );
         ?>
          </nav>
          <?php do_action('after_menu'); ?>
        </div>
    </div>
 </section>
 <section id="cart-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h1 class="price-home-h1-primary">Check Out
                <hr class="pricing-hr-primary">
                <hr class="pricing-hr-primary">
            </h1>
            </div>
        </div>
        <br />
        <br />
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Package Selected
                            </th>
                            <th>
                                Total
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <b><?php echo $my[0]; ?></b>
                                <br />
                                <?php 
	                             $parts = explode("_", $_Month);


                                 $my = explode('-', $parts[1]);
                              ?>
                                <?php echo $parts[0]; ?>
                              	<?php echo $my[1]; ?>
                            </td>
                            <td>
                                <b><?php echo $cost;?>$</b>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-md-6">  
              
              
              
              
              
              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header detail" style="background-color: #ffc000;"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">
                    <span class="title">
                      <h2 class="price-home-h2-primary">Details</h2>
                    </span>
                  </div>
                  <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-11">
                          <div class="btn-div">
                            <form class="form-horizontal" id="form" method="POST" action="" enctype="multipart/form-data">
                              <div class="form-group">
                                  <h1 class="price-home-h1-primary" >&nbsp;</h1>
                                  <label class="control-label col-sm-12">First Name</label>
                                  <div class="col-sm-12">
                                      <p class="form-control-static"><input type="text" required="required" class="form-control fname" name="fname" /></p>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-12">Last Name</label>
                                  <div class="col-sm-12">
                                      <p class="form-control-static"><input type="text" required="required" class="form-control lname" name="lname" /></p>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-12">Company Name:</label>
                                  <div class="col-sm-12">
                                      <p class="form-control-static"><input type="text" required="required" class="form-control" name="company" /></p>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-12">Address One:</label>
                                  <div class="col-sm-12">
                                      <p class="form-control-static"><input type="text" required="required" class="form-control" name="addressone" /></p>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-12">Address two:</label>
                                  <div class="col-sm-12">
                                      <p class="form-control-static"><input type="text" required="required" class="form-control" name="addresstwo" /></p>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-12">City:</label>
                                  <div class="col-sm-12">
                                      <p class="form-control-static"><input type="text" required="required" class="form-control" name="city" /></p>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-12">State/Provence:</label>
                                  <div class="col-sm-12">
                                      <p class="form-control-static"><input type="text" required="required" class="form-control" name="statprov" /></p>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-12">Country:</label>
                                  <div class="col-sm-12">
                                      <p class="form-control-static"><input type="text" required="required" class="form-control" name="country" /></p>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-12">Zip Code:</label>
                                  <div class="col-sm-12">
                                      <p class="form-control-static"><input type="text" required="required" class="form-control" name="zipcode" /></p>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-sm-12">Attachment:</label>
                                  <div class="col-sm-12">
                                      <p class="form-control-static"><input type="file" required="required" id="myFile" name="fileToUpload"></p>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="btn-select-div">
                                      <input type="hidden" name="title" value="<?php echo $title; ?>" />
                                      <input type="hidden" name="my" value="<?php echo $my; ?>" />&nbsp;
                                      <input type="hidden" name="_Month" value="<?php echo $_Month; ?>" />
                                      <input type="hidden" name="postcontent" value="<?php echo $title.' - '.$my.' '.$_Month; ?>" />
                                      <input type="hidden" name="cost" value="<?php echo $cost; ?>" />

                                      <button type="submit" class="select" name="checkout">Pay<i class="bi bi-arrow-right"></i>
                                          <!--<svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor"
                                          class="bi bi-arrow-right" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd"
                                              d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                      </svg>--></button> 
                                  </div>
                              </div>
                          </form>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header collapsed payment" style="background-color: #ffc000;" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="false">
                    <span class="title">
                      <h2 class="price-h2-secondary">Payment</h2>
                    </span>
                  </div>
                  <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-11">
                          <div class="btn-2-div">
                            <?php echo do_shortcode('[wpep-form id="64"]'); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
				
				
            </div>
			
				
        </div>
    </div>
 </section>
<?php
     get_footer();
?>
    <script>
      $(document).ready(function (e) {
       $("#form").on('submit',(function(e) {
        e.preventDefault();
          formData =new FormData(this)
          var uri;
          if($('.select').val() == "")
          {
			 uri = "https://beltwayad.scoopsolutions.us/wp/checkout-logic/";//checkout_logic.php",
            
          }else if($('.select').val() != ""){
            
            uri = "https://beltwayad.scoopsolutions.us/wp/checkout_update?id=" + $('.select').val();//checkout_logic.php",
          }
        $.ajax({
           url: uri, 
           type: "POST",
           data: formData,//data:  {ajax: 1,name: name},//new FormData(this),
           contentType: false,
           cache: false,
           processData:false,
           beforeSend : function()
         {
          //$("#preview").fadeOut();
          //$("#err").fadeOut();
         },
         success: function(data)
          {

            // view uploaded file.
            //$("#preview").html(data).fadeIn();
            $('.select').val(data);
            $('#collapseOne').removeClass('show');           
            $('.detail').addClass('collapsed');
            $('.detail').attr("aria-expanded","false");
            
            
            $('#collapseThree').addClass('show');           
            $('.payment').removeClass('collapsed');
            $('.payment').attr("aria-expanded","true");

            //$("#form")[0].reset(); 
          },
          error: function(e) 
          {
            //$("#err").html(e).fadeIn();
          }          
        });
       }));
    });
    </script>