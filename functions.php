<?php
error_reporting(0);


// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
    'menu-1' 		=> esc_html__( 'Primary menu', 'beltwayad' ),
    'footer_menu' 	=> esc_html__( 'Footer menu', 'beltwayad' ),

) );

/**
 * For logo or Header Image Starts
 * */
add_theme_support('post-thumbnails');
function themename_custom_header_setup() {
    $args = array(
        'default-image'      => get_template_directory_uri() .'/assets/images/logo.png', //get_template_directory_uri() . 'img/default-image.jpg',
        'default-text-color' => '000',
        'flex-width'         => true,
        'flex-height'        => true,
    );
    add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'themename_custom_header_setup' );
add_theme_support('favicon');
/**
 * For logo or Header Image Ends
 * */
// For Front Page sections
require_once( get_template_directory() . '/sections/topbar.php' );
require_once( get_template_directory() . '/sections/banner.php' );
require_once( get_template_directory() . '/sections/benefits.php' );
require_once( get_template_directory() . '/sections/footer.php' );
require_once( get_template_directory() . '/sections/whyus.php' );
require_once( get_template_directory() . '/sections/capabilities.php' );
require_once( get_template_directory() . '/sections/advertising.php');
// require_once( get_template_directory() . '/sections/gallery.php');

// For Pages
require_once( get_template_directory() . '/pages/pricing.php');

/**
 * For Pricing Page
*/
class Pricing_Customize{
    public static function register ( $wp_customize ) {

            $wp_customize->add_section('sf_pricing', 
            array(
                'title'      => __( 'Pricing', 'storefront-child' ),
                'priority'   => 6
            ));

                //  =============================
                //  = Pricing Main Heading      =
                //  =============================
                $wp_customize->add_setting('pricing_main_headings', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('pricing_main_headings', array(
                    'label'      => __('Pricing Main Heading', 'themename'),
                    'section'    => 'sf_pricing',
                    'settings'   => 'pricing_main_headings',
                    'priority'   => 1,  
                    'type'       => 'text'
                ));

                //  =============================
                //   = Pricing Sub Heading      =
                //  =============================
                $wp_customize->add_setting('pricing_sub_headings', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('pricing_sub_headings', array(
                    'label'      => __('Pricing Sub Heading', 'themename'),
                    'section'    => 'sf_pricing',
                    'settings'   => 'pricing_sub_headings',
                    'priority'   => 2,  
                    'type'       => 'text'
                ));


                //  =============================
                //  = Image Uploads             =
                //  =============================
                $wp_customize->add_setting('pricing_main_img', array(
                    'default'           => '',
                    'capability'        => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'img_p_m', array(
                    'label'    => __('Image Upload', 'themename'),
                    'section'  => 'sf_pricing',
                    'priority'   => 3, 
                    'settings' => 'pricing_main_img',
                )));

                //  =============================
                //  = Button Title              =
                //  =============================
                $wp_customize->add_setting('pricing_btn_title', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('pricing_btn_title', array(
                    'label'      => __('Button Title', 'themename'),
                    'section'    => 'sf_pricing',
                    'settings'   => 'pricing_btn_title',
                    'priority'   => 4,  
                    'type'       => 'text'
                ));

                //  =============================
                //  = Button Link              =
                //  =============================
                $wp_customize->add_setting('pricing_btn_link', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('pricing_btn_link', array(
                    'label'      => __('Button Link', 'themename'),
                    'section'    => 'sf_pricing',
                    'settings'   => 'pricing_btn_link',
                    'priority'   => 5,  
                    'type'       => 'text'
                ));

        }
        public static function pricing_html( $wp_customize ){       

            $pricingMainHeadings = get_option('pricing_main_headings');
            $pricing_sub_headings = get_option('pricing_sub_headings');
            $pricing_main_img = get_option('pricing_main_img');
            $pricing_btn_title = get_option('pricing_btn_title');
            $pricing_btn_link = get_option('pricing_btn_link');
            ?>    

<section id="pricing-nav">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class=" logo-pricing"><a href="<?php echo home_url(); ?>" style="z-index:10000;"><img src="<?php echo get_header_image(); ?>" alt="" height="60px" /></a></div>
        </div>
      </div>
    </div>
  </section>
  <section id="pricing-bg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 nlrp">
          <div class="price-bg">
         
            <img src="<?php echo $pricing_main_img; ?>" alt="">
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
            <!-- <ul>

              <li><a href="#">Home</a></li>
              <li><a href="#">Who We Are</a></li>
              <li><a href="#">Benefits</a></li>
              <li><a href="#">Pricing Plan</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul> -->
          </nav>
          <?php do_action('after_menu'); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <h1 class="price-home-h1-primary"><?php echo $pricingMainHeadings; ?>
            <hr class="pricing-hr-primary">
            <hr class="pricing-hr-primary">
          </h1>
          <h4 class="price-home-h4-primary mt-4 mb-4"><?php echo $pricing_sub_headings; ?></h4>
        </div>
      </div>

      <div class="pricing-acc">
        <div class="container">   
        <form method="POST" action="<?php echo site_url(); ?>/checkout-2/">        
          <div class="row">
              <div class="col-md-6 offset-3">
                <div class="accordion" id="accordionExample">
                <?php do_action('m_pricing');?>
                </div>
              </div>
          </div>
          <div class="row">
          <div class="col-md-12">
            <div class="pricing-btn">
              <div class="btn-select-div">
                <button type="submit" class="select" name="submit"><?php echo "Select"; ?><i class="bi bi-arrow-right"></i>
                  <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor"
                    class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                      d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                  </svg></button>
              </div>
            </div>
          </div>
        </div>  

        

          
          
        </form>
        </div>
      </div>
    </div>
  </section>
        <?php }
    }
    add_action('customize_register' , array( 'Pricing_Customize' , 'register' ) );
    add_action('pricing_page', array( 'Pricing_Customize' , 'pricing_html' ));

    remove_filter( 'the_content', 'wpautop' );

    function customtheme_add_woocommerce_support()
    {
      add_theme_support( 'woocommerce' ); 
    }
    add_action( 'after_setup_theme', 'customtheme_add_woocommerce_support' );

    /** Remove Default Sorting
  * @snippet       Remove "Default Sorting" Dropdown @ WooCommerce Shop & Archive Pages
  * @how-to        Get CustomizeWoo.com FREE
  * @author        Rodolfo Melogli
  * @compatible    Woo 3.8
  * @donate $9     https://businessbloomer.com/bloomer-armada/
  */

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );