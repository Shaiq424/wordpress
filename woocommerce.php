<?php 
//Template Name:shop
get_header(); 
 ?>
 <section id="pricing-nav">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class=" logo-pricing"><img src="<?php echo get_header_image(); ?>" alt="" height="60px"></div>
        </div>
      </div>
    </div>
  </section>
  <section id="pricing-bg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 nlrp">
          <div class="price-bg">
            <img src="<?php echo get_template_directory_uri();?>/assets/images/pricing-bg.png" alt="">
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
          <h1 class="price-home-h1-primary"><?php echo  "Advertising Guarantee";//$pricingMainHeadings; ?>
            <hr class="pricing-hr-primary">
            <hr class="pricing-hr-primary">
          </h1>
          <h4 class="price-home-h4-primary mt-4 mb-4"><?php echo "Choose your Plan"; //$pricing_sub_headings; ?></h4>
        </div>
      </div>

      <div class="pricing-acc">
        <div class="container">
          <?php do_action('m_pricing');?>
          <?php woocommerce_content(); ?>
          <div class="row">
            <div class="col-md-12">
              <div class="pricing-btn">
                <div class="btn-select-div">
                  <a href="<?php echo $pricing_btn_link; ?>" class="select"><?php echo $pricing_btn_title; ?><i class="bi bi-arrow-right"></i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor"
                      class="bi bi-arrow-right" viewBox="0 0 16 16">
                      <path fill-rule="evenodd"
                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>