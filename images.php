<?php
//Template Name:images
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
 <style>
     .gallery-section video{
        width: 468px !important;
    }.embed-responsive-item{
        width: 468px !important;
        height: 260px !important;
    }
 </style>
 <div class="gallery-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabOne">Images</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabTwo">Videos</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-3" id="myTabContent">
                        <div class="tab-pane fade active show" id="tabOne">

                            <section class="container">
                                <div class="row gallery">
                                    <div class="col-12 p-0">
                                        <div class="grid-wrapper mt-5">
                                            <?php
                                            $args = array(
                                                'post_type' => 'post',
                                                'post_status' => 'publish',
                                                'category_name' => 'gallery',
                                                'posts_per_page' => 5,
                                            );
                                            $arr_posts = new WP_Query( $args );
                                            if ( $arr_posts->have_posts() ) :
                                                while ( $arr_posts->have_posts() ) :
                                                    $arr_posts->the_post();
                                                    remove_filter('the_excerpt', 'wpautop');
                                                    if ( has_post_thumbnail() ) :
                                                        ?>
                                                        <div class="<?php echo the_excerpt(); ?> About-body-image2">
                                                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
                                                                <div style="border-radius:10px ;" class="info-pages-overlay">
                                                                    <div class="info-pages-overlay-inner-i">
                                                                        <a href="<?php echo get_the_post_thumbnail_url(); ?>" data-lightbox="photos">
                                                                            <i class="fa fa-search-plus info-pages-overlay-inner-i"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                    endif;
                                                endwhile;
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="tabTwo">



                            <div class="container">
                                <div class="row">
                                    <div class="hm-gradient">

                                        <!--MDB Video-->
                                        <div class="container mt-4">

                                            <!-- Grid row -->
                                            <div class="row">

                                                

                                                <?php
                                                    $args = array(
                                                        'post_type' => 'post',
                                                        'post_status' => 'publish',
                                                        'category_name' => 'video',
                                                        'posts_per_page' => 5,
                                                    );
                                                    $arr_posts = new WP_Query( $args );
                                                    ?>
                                                  
                                                    <?php
                                                    if ( $arr_posts->have_posts() ) :
                                                        ?>
                                                            <?php
                                                        while ( $arr_posts->have_posts() ) :
                                                            $arr_posts->the_post();
                                                            remove_filter('the_excerpt', 'wpautop');
                                                            ?>
                                                            <!-- Grid column -->
                                                            <div class="col-md-6 mb-4">
                                                                <div class="card">
                                                                    <div class="card-block p-3">

                                                                        <div class="embed-responsive embed-responsive-16by9">
                                                                            <!-- <iframe class="embed-responsive-item"
                                                                                src="https://www.youtube.com/embed/_15z6hEu33A?feature=oembed"
                                                                                allowfullscreen></iframe> -->
                                                                                <?php 
                                                                                    if(has_excerpt()){
                                                                                        ?>
                                                                                        <iframe width="349" class="embed-responsive-item"
                                                                                src="<?php echo the_excerpt(); ?>"
                                                                                allowfullscreen></iframe>
                                                                                <?php
                                                                                    }else{
                                                                                        the_content();
                                                                                    }
                                                                                 ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Grid column -->
                                                            <?php
                                                        endwhile;
                                                        ?>
                                                  
                                                        <?php
                                                    endif;
                                                    ?>
                                            </div>
                                            <!-- Grid row -->
                                        </div>
                                        <!--MDB Video-->
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
     get_footer();
?>