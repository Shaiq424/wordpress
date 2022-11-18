<?php
//Template Name:cart
if ( isset( $_POST['submit'] ) ){
    if(isset($_POST['radio_']))
    {
        $radio = $_POST['radio_'];
    }
    if(isset($_POST['title']))
    {
        $title = $_POST['title'];
    }
    $str = $radio;
    $parts = explode("_", $str);
    $my = $parts[0];
    $cost = explode('-', $parts[1]);
    $cost = $cost[0];
    $_Month = substr($str, strpos($str, "-") + 1);    
}

?>
<?php
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
 <section id="cart-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="price-home-h1-primary">My Cart
                    <hr class="pricing-hr-primary">
                    <hr class="pricing-hr-primary">
                </h1>
                </div>
            </div>
        <br />
        <br />
        <div class="row">
            <form method="POST" action="<?php echo site_url(); ?>/checkout/">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            Package Selected
                        </th>
                        <th>
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <b><?php echo $title; ?></b>
                            <input type="hidden" value="<?php echo $title; ?>" name="title" />
                            <br />
                            <?php echo $my;?>&nbsp;<?php echo $_Month; ?>
                            <input type="hidden" value="<?php echo $my; ?>" name="my" />
                            <input type="hidden" value="<?php echo $_Month; ?>" name="_month" />

                        </td>
                        <td>
                            <b><?php echo $cost;?>$</b>
                            <input type="hidden" value="<?php echo $cost; ?>" name="cost" />
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td><b>Item Selected</b></td>
                    <td>
                        <div class="btn-select-div">
                        <button type="submit" class="select" name="submit">Checkout<i class="bi bi-arrow-right"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor"
                            class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg></button>
                        </div>
                    </td>
                </tr>
                </tfoot>
            </table>
            </form>
        </div>
    </div>
 </section>
<?php
     get_footer();
?>