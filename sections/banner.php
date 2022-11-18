<?php
/**
 * For Banner Section
*/
class Banner_Customize{
    public static function register ( $wp_customize ) {

         $wp_customize->add_section('sf_banner', 
               array(
                    'title'      => __( 'Banner', 'storefront-child' ),
                    'priority'   => 2
                ));

                 //  =============================
                //   = Button Title Textbox      =
                //   =============================
                $wp_customize->add_setting('banner_btn_title', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('banner_btn_title', array(
                    'label'      => __('Button Title', 'themename'),
                    'section'    => 'sf_banner',
                    'settings'   => 'banner_btn_title',
                    'priority'   => 1,  
                    'type'       => 'text'
    
                ));

                
                //  =============================
                //   = Button Link              =
                //  =============================
                $wp_customize->add_setting('btn_link', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('btn_link', array(
                    'label'      => __('Button Link', 'themename'),
                    'section'    => 'sf_banner',
                    'settings'   => 'btn_link',
                    'priority'   => 2,  
                    'type'       => 'text'
    
                ));

            }
        public static function banner_section( $wp_customize ){       

            $btntitle = get_option('banner_btn_title');
            $btnlink = get_option('btn_link');
           
            ?>    
           <a href="<?php echo $btnlink; ?>" class="banner-btn-1"><?php echo $btntitle; ?><i class="bi bi-arrow-right"></i>
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor"
                class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
              </svg>

        </a>
            
        <?php }
        
    }
    add_action( 'customize_register' , array( 'Banner_Customize' , 'register' ) );
    add_action('baner_section', array( 'Banner_Customize' , 'banner_section' ));


    /**
    * for Top Bar Header
    */

    /**
     * Home Page Banner Starts
     */
    add_action('main_banner', 'main_banner');
    function main_banner() {
        $args = [
            'post_type' => 'mainbanner',
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
                  <?php the_content(); ?>
                        <br>
                        <br>
                        <br>
                        <br>
                        <?php do_action('baner_section'); ?>
                    </div>
                    </div>
                    <div class="col-md-6 nlrp">
                    <div class="banner-2">
                        
                 
                     <?php
                     if ( has_post_thumbnail() ) {
                        
                        ?>
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="">
                        <?php
                     } else {
                        ?>
                            <img src="<?php echo get_template_directory_uri();?>/assets/images/navbar-right.png" alt="">
                        <?php 
                        }
                        ?>
                    </div>
                    </div>
                        <?php
               endwhile;
            endif;
            wp_reset_postdata();
            ?>
         <?php
    }

    function main_banners(){
        $labels = array(
            'name'                  => _x( 'Homepage Banner', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Homepage Banner', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'Homepage Banner', 'text_domain' ),
            'name_admin_bar'        => __( 'Homepage Banner', 'text_domain' ),
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
            'description'           => __( 'Homepage Banner Description', 'text_domain' ),
            'labels'                => $labels,
            // 'labels'             => 'Basics',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'homepage-banner' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
        );
        register_post_type('mainbanner', $args);
        
    }
    add_action( 'init', 'main_banners', 0 );

     /**
     * Main Banner Ends
     */
    ?>