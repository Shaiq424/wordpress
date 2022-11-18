<?php
error_reporting(0);
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 *
 * @package beltwayad
 */

get_header(); 
?>
<!-- 
<!-- -----Navbar----- -->
<section id="header-main">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 nlrp">
          <div class="banner-1">
            <nav class="navbar navbar-expand-md navbar-light ">
            <a href="<?php echo home_url(); ?>" style="z-index:10000;"> <img src="<?php echo get_header_image(); ?>" width="100" height="100" class="navbar-brand mx-5"  alt=""></a>
              <!-- <a href="#" class="navbar-brand mx-5"><img src="<?php //do_action('after_setup_theme'); ?>" alt=""></a> -->
              <div class="full-menu">
                <div class="button_container" onclick="w3_close()" id="toggle">
                  <span class="top"></span>
                  <span class="middle"></span>
                  <span class="bottom"></span>
                </div>

                <div class="overlay" id="overlay">
                  <nav class="overlay-menu">
                    <?php
                            wp_nav_menu( array(
                                'theme_location' => 'Main Menu',
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
            </nav>
            <!-- Main Banner Starts =================================================================================================== */ -->

            <?php do_action('main_banner'); ?>

            <!-- Main Banner Ends =================================================================================================== */ -->

      </div>
    </div>
  </section>
  <section id="about">
      <!-- About Starts =================================================================================================== */ -->

      <?php do_action('main_benefits'); ?>
  
      <!-- About Starts =================================================================================================== */ -->

  </section>
  <section id="sec-3">
      <?php do_action('why_us'); ?>
      <?php do_action('capabilities'); ?>
      </div>
    </div>
  </section>
  <section id="advertising">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h1 data-aos="zoom-in" data-aos-duration="2500" class="advertising-h1-primary">Advertising Guarantee
            <hr class="ad-hr-primary">
            <hr class="ad-hr-primary">
          </h1>
        </div>
      </div>
      <div class="row">
        <?php do_action('advert_left'); ?>
        <?php do_action('advert_right'); ?>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="ad-btn-1">
            <?php do_action('advert_section'); ?>
          </div>

        </div>
      </div>
    </div>
  </section> -->
<?php 
    get_footer();
?>