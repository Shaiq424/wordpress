<?php
/**
 * For Advertising Section
*/
class Advertising_Customize{
    public static function register ( $wp_customize ) {

         $wp_customize->add_section('sf_advertising', 
               array(
                    'title'      => __( 'Advertising', 'storefront-child' ),
                    'priority'   => 3
                ));

                 //  =============================
                //   = Button Title Textbox      =
                //   =============================
                $wp_customize->add_setting('advert_btn_title', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('advert_btn_title', array(
                    'label'      => __('Button Title', 'themename'),
                    'section'    => 'sf_advertising',
                    'settings'   => 'advert_btn_title',
                    'priority'   => 1,  
                    'type'       => 'text'
    
                ));

                
                //  =============================
                //   = Button Link              =
                //  =============================
                $wp_customize->add_setting('advert_btn_link', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('advert_btn_link', array(
                    'label'      => __('Button Link', 'themename'),
                    'section'    => 'sf_advertising',
                    'settings'   => 'advert_btn_link',
                    'priority'   => 2,  
                    'type'       => 'text'
    
                ));

            }
        public static function advert_html( $wp_customize ){       

            $btntitle = get_option('advert_btn_title');
            $btnlink = get_option('advert_btn_link');
           
            ?>    
          <a href="<?php echo $btnlink; ?>" class="ad-btn"><?php echo $btntitle; ?><i class="bi bi-arrow-right"></i>
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
              </svg>
          </a>
        <?php }
    }
    add_action( 'customize_register' , array( 'Advertising_Customize' , 'register' ) );
    add_action('advert_section', array( 'Advertising_Customize' , 'advert_html' ));

    /**
     * Advertising Left Starts
     */

    add_action('advert_left', 'advert_left');
    function advert_left() {
        $args = [
            'post_type' => 'advertleft',
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
                  the_content();
               endwhile;
            endif;
            wp_reset_postdata();
            ?>
         <?php
    }

    function advert_lefts(){
        $labels = array(
            'name'                  => _x( 'Advertisement Left', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Advertisement Left', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'Advertisement Left', 'text_domain' ),
            'name_admin_bar'        => __( 'Advertisement Left', 'text_domain' ),
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
            'description'           => __( 'Advertisement Left Description', 'text_domain' ),
            'labels'                => $labels,
            // 'labels'             => 'Basics',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'advertisement-left' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
        );
        register_post_type('advertleft', $args);
        
    }
    add_action( 'init', 'advert_lefts', 0 );
    /**
     * Advertising Left Ends
     */



     /**
     * Advertising Left Starts
     */

    add_action('advert_right', 'advert_right');
    function advert_right() {
        $args = [
            'post_type' => 'advertlefts',
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
                  the_content();
               endwhile;
            endif;
            wp_reset_postdata();
            ?>
         <?php
    }

    function advert_leftss(){
        $labels = array(
            'name'                  => _x( 'Advertisements Right', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Advertisements Right', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'Advertisements Right', 'text_domain' ),
            'name_admin_bar'        => __( 'Advertisements Right', 'text_domain' ),
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
            'description'           => __( 'Advertisements Right Description', 'text_domain' ),
            'labels'                => $labels,
            // 'labels'             => 'Basics',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'advertisements-right' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
        );
        register_post_type('advertlefts', $args);
        
    }
    add_action( 'init', 'advert_leftss', 0 );
    /**
     * Advertising Left Ends
     */



    ?>