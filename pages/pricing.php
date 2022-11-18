<?php

    /**
     * Prising Starts
     */
    add_action('m_gallery', 'm_pricing');
    function m_gallery() {
        $args = [
            'post_type' => 'mpricing',
            'posts_per_page'         => 100,
            // 'post_type'              => 'post',
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false,
         ];
         
         $post_query = new \WP_Query( $args );
         ?>
         
            <?php
            if ( $post_query->have_posts() ) :
               while ( $post_query->have_posts() ) :
                  $post_query->the_post();
                  $search_text = get_the_excerpt();

                  // Strip the <p> tag by replacing it empty string
                  $tags = array("<p>", "</p>");
                  $search_content = str_replace($tags, "", $search_text);
                  
                  // get custom fields
                  $custom = get_post_custom();

                  ?>
                
                <div class="card">
                    <div class="card-header <?php if(isset($custom['collapsed'])) {
                            echo $custom['collapsed'][0];
                        }?>" data-toggle="collapse" data-target="#<?php echo $search_content; ?>" aria-expanded="<?php 
                          if(isset($custom['aria-expanded'])) {
                            echo $custom['aria-expanded'][0];
                        }
                      ?>">
                      <span class="title">
                        <h2 class="price-home-h2-primary"><?php the_title(); ?></h2>
                        <input type="hidden" name="title" value="<?php the_title(); ?>" />
                      </span>
                      <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                    </div>
                    <div id="<?php echo $search_content; ?>" class="collapse <?php echo $custom['show'][0]; ?>" data-parent="#accordionExample">
                      <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                          <div class="btn-2-div">
                              <?php 
                              $fields = $custom['no of fields'][0];  
      						             $contents = $custom['contents'][0];
      						 	      //die();
                              
                              for ($x = 1; $x <= $fields; $x++) {
                                $parts = explode(" ", $custom[$x.'_value'][0]);
                                 if(isset($custom[$x.'_value'][0]))
                                {
                                  if($parts[1] == "Month" || $parts[1] == "Months" || $parts[1] == "month" || $parts[1] == "months")
                                  {
                                    $months = $parts[0] * $custom['Discounted Amounts for '.$x.' Period'][0].'$';
                                    ?>
                                    <label class="pr-radio"><?php echo $custom[$x.'_value'][0]; ?>
                                      <input type="radio" required="required" name="radio_" value="<?php echo the_title().'-'.$parts[0].' '.$parts[1].'_'.$months.'_'.$contents?>">
                                      <span class="checkmark"></span>
                                      <div class="adv-price-tag">
                                        <?php
                                          if($parts[1] == "Month" || $parts[1] == "Months" || $parts[1] == "month" || $parts[1] == "months")
                                          {
                                            echo $parts[0] * $custom['Discounted Amounts for '.$x.' Period'][0].'$'.'----';
                                          }else if($parts[1] == "Year" || $parts[1] == "Years" || $parts[1] == "year" || $parts[1] == "years"){
                                            echo ($parts[0] * 12) * $custom['Discounted Amounts for '.$x.' Period'][0].'$';
                                          }
                                          
                                        ?>
                                      </div>
                                    </label>
                                    <?php
                                  }else if($parts[1] == "Year" || $parts[1] == "Years" || $parts[1] == "year" || $parts[1] == "years"){
                                    $years =($parts[0] * 12) * $custom['Discounted Amounts for '.$x.' Period'][0];
                                    ?>
                                    <label class="pr-radio"><?php echo $custom[$x.'_value'][0]; ?>
                                      <input type="radio" required="required" name="radio_" value="<?php echo the_title().'-'.$parts[0].' '.$parts[1].'_'.$years.'_'.$contents?>">
                                      <span class="checkmark"></span>
                                      <div class="adv-price-tag">
                                        <?php
                                          if($parts[1] == "Month" || $parts[1] == "Months" || $parts[1] == "month" || $parts[1] == "months")
                                          {
                                            echo $parts[0] * $custom['Discounted Amounts for '.$x.' Period'][0].'$';
                                          }else if($parts[1] == "Year" || $parts[1] == "Years" || $parts[1] == "year" || $parts[1] == "years"){
                                            echo ($parts[0] * 12) * $custom['Discounted Amounts for '.$x.' Period'][0].'$';
                                          }
                                          
                                        ?>
                                      </div>
                                    </label>
                                    <?php
                                  }
  
                                }
                          ?>
                            
                          <?php
                              }
                          ?>
                          </div>
                            <!-- <div class="btn-2-div">
                              <?php if(isset($custom['a_Month'])){ ?>
                              <label class="pr-radio"><?php if(isset($custom['a_Month'])){
                                echo $custom['a_Month'][0];
                              } echo $custom['Months'][0];?>
                                
                                <input type="radio" required="required" name="radio_" value="<?php if( isset($custom['a_month_value']) && isset($custom['a_Month'])){
                          		 
                                echo the_title().'-'.$custom['a_Month'][0].'_'. $custom['a_Month'][0] * $custom['a_month_value'][0].'-'.$custom['Months'][0];
                              }?>" >
                                <span class="checkmark"></span>
                                <div class="adv-price-tag">
                                  $<?php if(isset($custom['a_month_value']) && isset($custom['a_Month'])){
                                echo $custom['a_month_value'][0] * $custom['a_Month'][0];
                              }?> 
                                </div>
                              </label>
                              <?php }?>
                              <?php if(isset($custom['b_Month'])){?>
                              <label class="pr-radio"><?php if(isset($custom['b_Month'])){
                                echo $custom['b_Month'][0];
                              } echo $custom['Months'][0];?>
                                <input type="radio" required="required" name="radio_" value="<?php if(isset($custom['a_month_value']) && isset($custom['b_Month'])){
                                echo the_title().'-'.$custom['b_Month'][0].'_'.$custom['b_Month'][0] * $custom['a_month_value'][0].'-'. $custom['Months'][0];
                              }?>">
                                <span class="checkmark"></span>
                                <div class="adv-price-tag">
                                  $<?php if(isset($custom['a_month_value']) && isset($custom['b_Month'])){
                                  echo $custom['a_month_value'][0] * $custom['b_Month'][0];
                              }?>
                                </div>
                              </label>
                              <?php }?>
                              <?php if(isset($custom['c_Month'])){ ?>
                              <label class="pr-radio"><?php if(isset($custom['c_Month'])){
                                echo $custom['c_Month'][0];
                              } echo $custom['Years'][0]; ?>
                                <input type="radio" required="required" name="radio_" value="<?php if(isset($custom['a_month_value']) && isset($custom['c_Month'])){
                                echo the_title().'-'.$custom['c_Month'][0].'_'. $custom['a_month_value'][0] * ($custom['c_Month'][0] * 12).'-'.$custom['Years'][0];
                              }?>">
                                <span class="checkmark"></span>
                                <div class="adv-price-tag">
                                $<?php if(isset($custom['a_month_value']) && isset($custom['c_Month'])){
                          			
                                  echo $custom['a_month_value'][0] * ($custom['c_Month'][0] * 12);
                          			
                                }?>
                                </div>
                              </label>
                              <?php }?>
                            </div> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- <div class="card">
                  <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="false">
                    <span class="title">
                        <h2 class="price-home-h2-primary"><?php the_title(); ?></h2>
                        <input type="hidden" name="title" value="<?php the_title(); ?>" />
                    </span>
                    <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                  </div>
                  <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="btn-2-div">
                            <label class="pr-radio">3 Months
                              <input type="radio" name="radio2">
                              <span class="checkmark"></span>
                              <div class="adv-price-tag">
                                $1,800
                              </div>
                            </label>
                            <label class="pr-radio">6 Months
                              <input type="radio" name="radio2">
                              <span class="checkmark"></span>
                              <div class="adv-price-tag">
                                $3,000
                              </div>
                            </label>
                            <label class="pr-radio">1 Year
                              <input type="radio" name="radio2">
                              <span class="checkmark"></span>
                              <div class="adv-price-tag">
                                $4,800
                              </div>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->

                <!-- <div class="card">
                  <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="false">
                    <span class="title">
                      <h2 class="price-h2-secondary">10 second still Ad card</h2>
                    </span>
                    <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                  </div>
                  <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="btn-2-div">
                            <label class="pr-radio">3 Months
                              <input type="radio" name="radio2">
                              <span class="checkmark"></span>
                              <div class="adv-price-tag">
                                $1,800
                              </div>
                            </label>
                            <label class="pr-radio">6 Months
                              <input type="radio" name="radio2">
                              <span class="checkmark"></span>
                              <div class="adv-price-tag">
                                $3,000
                              </div>
                            </label>
                            <label class="pr-radio">1 Year
                              <input type="radio" name="radio2">
                              <span class="checkmark"></span>
                              <div class="adv-price-tag">
                                $4,800
                              </div>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
                        <?php
               endwhile;
               ?>


               
               <?php
            endif;
            wp_reset_postdata();
            ?>
         <?php
    }

    function m_pricings(){
        $labels = array(
            'name'                  => _x( 'Packages', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Packages', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'Packages', 'text_domain' ),
            'name_admin_bar'        => __( 'Packages', 'text_domain' ),
            'archives'              => __( 'Item Archives', 'text_domain' ),
            'attributes'            => __( 'Item Attributes', 'text_domain' ),
            'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
            'all_items'             => __( 'All Items', 'text_domain' ),
            'add_new_item'          => __( 'Add New Item', 'text_domain' ),
            'add_new'               => __( 'Add New', 'text_domain' ),
            'new_item'              => __( 'New Item', 'text_domain' ),
            'edit_item'             => __( 'Edit Item', 'text_domain' ),
            'update_item'           => __( 'Update Item', 'text_domain' ),
            'view_item'             => __( 'View Item', 'text_domain' ),
            'view_items'            => __( 'View Items', 'text_domain' ),
            'search_items'          => __( 'Search Item', 'text_domain' ),
            'not_found'             => __( 'Not found', 'text_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
            'featured_image'        => __( 'Featured Image', 'text_domain' ),
            'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
            'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
            'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
            'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
            'items_list'            => __( 'Items list', 'text_domain' ),
            'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
            'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
        );
        $args= array(
            'description'           => __( 'Packages Description', 'text_domain' ),
            'labels'                => $labels,
            // 'labels'             => 'Basics',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'packages' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
        );
        register_post_type('mpricing', $args);
        
    }
    add_action( 'init', 'm_pricings', 0 );

     /**
     * Main Banner Ends
     */
?>