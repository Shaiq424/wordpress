<?php
/*
Template Name: image
*/
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
<?php

$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => 'gallery',
    'posts_per_page' => 5,
);
$arr_posts = new WP_Query( $args );
  ?>
  <header class="entry-header">
                <h1 class="entry-title"><?php echo "Gallery";//the_title(); ?></h1>
            </header>
  <?php
if ( $arr_posts->have_posts() ) :
    ?>
    <table border="1">
    <tr>
        <?php
    while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
            if ( has_post_thumbnail() ) :
                ?>
                
                    <!-- <td><img width="300" height="250" style="margin:10px;" src="http://localhost:81/beltwayad/wp__/wp-content/uploads/2022/05/bacloch.jpeg" /></td> -->
                    <td><img width="300" height="250" style="margin:10px;" src="<?php echo get_the_post_thumbnail_url(); ?>" /></td>
                   
                <?php
            endif;
            ?>
           
            <div class="entry-content">

                <?php //the_excerpt(); ?>
                <!-- <a href="<?php //the_permalink(); ?>">Read More</a> -->
            </div>
        </article>
        <?php
    endwhile;
    ?>
    </tr>
    </table>


    <?php
endif;
?>
<?php
   $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => 'video',
    'posts_per_page' => 5,
);
$arr_posts = new WP_Query( $args );
  ?>
  <header class="entry-header">
                <h1 class="entry-title"><?php echo "Gallery";//the_title(); ?></h1>
            </header>
  <?php
if ( $arr_posts->have_posts() ) :
    ?>
    <table border="1">
    <tr>
        <?php
    while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
            // if ( has_post_thumbnail() ) :
                ?>
                
                    <!-- <td><img width="300" height="250" style="margin:10px;" src="http://localhost:81/beltwayad/wp__/wp-content/uploads/2022/05/bacloch.jpeg" /></td> -->
                    <td ><?php the_content(); ?></td>
                   
                <?php
            // endif;
            ?>
           
        </article>
        <?php
    endwhile;
    ?>
    </tr>
    </table>


    <?php
endif;
?>
<?php
     get_footer();
?>
