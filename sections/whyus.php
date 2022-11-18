<?php
    /**
     * Home Page Why US Starts
     */
    add_action('why_us', 'why_us');
    function why_us() {
        $args = [
            'post_type' => 'whyus',
            'posts_per_page'         => 1,
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
                  ?>
                      <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 yellow">
                            <div class="sec-3-left">
                                <h1 data-aos="zoom-in" data-aos-duration="1500" class="sec-3-h1-primary mb-5"><?php the_title(); ?></h1>
                                <?php the_content(); ?>
                            </div>
                            </div>

                    <!-- <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-5">
                                <h1 data-aos="fade-up-right" data-aos-duration="3000" class="about-h1-primary mt-5 mb-5 aos-init">Who We Are
                                    <hr class="about-hr-primary">
                                    <hr class="about-hr-primary">
                                </h1>
                                <?php //the_content(); ?>
                            </div>
                            <div class="col-md-7 nlrp">
                                <h4 class="about-h4-primary"><?php //the_excerpt();?></h4>
                                <div data-aos="fade-down-left" data-aos-duration="2000" class="about-img aos-init">
                                <?php
                                    //if ( has_post_thumbnail() ) {
                                ?>
                                    <img src="<?php //echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="" class="img-fluid">
                                <?php
                                    //} else {
                                ?>
                                    <img src="<?php //echo get_template_directory_uri();?>/assets/images/about-bg.png" alt="" class="img-fluid">
                                <?php 
                                    // }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div> -->
                        <?php
               endwhile;
            endif;
            wp_reset_postdata();
            ?>
         <?php
    }

    function why_uss(){
        $labels = array(
            'name'                  => _x( 'Homepage Why US', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Homepage Why US', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'Homepage Why US', 'text_domain' ),
            'name_admin_bar'        => __( 'Homepage Why US', 'text_domain' ),
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
            'description'           => __( 'Homepage Why US Description', 'text_domain' ),
            'labels'                => $labels,
            // 'labels'             => 'Basics',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'homepage-why-us' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
        );
        register_post_type('whyus', $args);
        
    }
    add_action( 'init', 'why_uss', 0 );

     /**
     * Main Why Us Ends
     */
    ?>