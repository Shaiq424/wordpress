<?php
//Template Name:thanksyou
get_header();
?>

<section id="pricing-nav">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-11">
          <div class=" logo-pricing"><a href="<?php echo home_url(); ?>" style="z-index:10000;"><img src="<?php echo get_header_image(); ?>" alt="" height="60px"></a></div>
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
            <h1 class="price-home-h1-primary">Thanks You
                <hr class="pricing-hr-primary">
                <hr class="pricing-hr-primary">
            </h1>
            </div>
        </div>
        <br />
        <br />
        <div class="row">
            <div class="col-md-12">
                <center><strong>
                Thanks for placing Order with us!!
                </strong></center>
            </div>
        </div>
    </div>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
 </section>
<?php
     get_footer();
?>