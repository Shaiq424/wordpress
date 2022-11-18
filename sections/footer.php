<?php
/**
 * For Footer Section
*/
class Footer_Customize{
    public static function register ( $wp_customize ) {

         $wp_customize->add_section('sf_footer', 
               array(
                    'title'      => __( 'Footer', 'storefront-child' ),
                    'priority'   => 5
                ));

                 //  =============================
                //   = Address TextArea          =
                //   =============================
                $wp_customize->add_setting('footer_address', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('footer_address', array(
                    'label'      => __('Footer Address', 'themename'),
                    'section'    => 'sf_footer',
                    'settings'   => 'footer_address',
                    'priority'   => 1,  
                    'type'       => 'textarea'
    
                ));

                
                //  =============================
                //   = Phone                    =
                //  =============================
                $wp_customize->add_setting('phone', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('phone', array(
                    'label'      => __('Phone', 'themename'),
                    'section'    => 'sf_footer',
                    'settings'   => 'phone',
                    'priority'   => 2,  
                    'type'       => 'text'
    
                ));

                //  =============================
                //   = Email                    =
                //  =============================
                $wp_customize->add_setting('email', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('email', array(
                    'label'      => __('Email', 'themename'),
                    'section'    => 'sf_footer',
                    'settings'   => 'email',
                    'priority'   => 3,  
                    'type'       => 'text'
    
                ));

                //  =============================
                //   = CopyRight                =
                //  =============================
                $wp_customize->add_setting('copy_right', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('copy_right', array(
                    'label'      => __('Copy Right', 'themename'),
                    'section'    => 'sf_footer',
                    'settings'   => 'copy_right',
                    'priority'   => 4,  
                    'type'       => 'text'
                ));

                //  =============================
                //  = Social 1st Image          =
                //  =============================
                $wp_customize->add_setting('first_footer_social_icon_img', array(
                    'default'           => '',
                    'capability'        => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'img_f_1', array(
                    'label'    => __('Social Image 1', 'themename'),
                    'section'  => 'sf_footer',
                    'priority'   => 5, 
                    'settings' => 'first_footer_social_icon_img',
                )));

                //  =============================
                //   = 1st Social Link          =
                //  =============================
                $wp_customize->add_setting('first_footer_soacial_link', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('first_footer_soacial_link', array(
                    'label'      => __('1st Social Link', 'themename'),
                    'section'    => 'sf_footer',
                    'settings'   => 'first_footer_soacial_link',
                    'priority'   => 6,  
                    'type'       => 'text'
    
                ));


                //  =============================
                //  = Social 2nd Image          =
                //  =============================
                $wp_customize->add_setting('second_footer_social_icon_img', array(
                    'default'           => '',
                    'capability'        => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'img_f_2', array(
                    'label'    => __('Social Image 2', 'themename'),
                    'section'  => 'sf_footer',
                    'priority'   => 7, 
                    'settings' => 'second_footer_social_icon_img',
                )));

                //  =============================
                //   =2nd  Social Link          =
                //  =============================
                $wp_customize->add_setting('footer_second_soacial_link', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('footer_second_social_link', array(
                    'label'      => __('2nd Social Link', 'themename'),
                    'section'    => 'sf_footer',
                    'settings'   => 'footer_second_soacial_link',
                    'priority'   => 8,  
                    'type'       => 'text'
    
                ));

                //  =============================
                //  = Social 3rd Image          =
                //  =============================
                $wp_customize->add_setting('footer_third_social_icon_img', array(
                    'default'           => '',
                    'capability'        => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'img_f_3', array(
                    'label'    => __('Social Image 3', 'themename'),
                    'section'  => 'sf_footer',
                    'priority'   => 9, 
                    'settings' => 'footer_third_social_icon_img',
                )));

                //  =============================
                //   =3rd  Social Link          =
                //  =============================
                $wp_customize->add_setting('footer_third_soacial_link', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('footer_third_soacial_link', array(
                    'label'      => __('3rd Social Link', 'themename'),
                    'section'    => 'sf_footer',
                    'settings'   => 'footer_third_soacial_link',
                    'priority'   => 10,  
                    'type'       => 'text'
    
                ));
            }
        public static function footer_html( $wp_customize ){       

            $footerAddress = get_option('footer_address');
            $phone = get_option('phone');
            $email = get_option('email');
            $copyright = get_option('copy_right');
            $firstsocialimg = get_option('first_footer_social_icon_img');
            $firstsociallink = get_option('first_footer_soacial_link');
            $secondsocialimg = get_option('second_footer_social_icon_img');
            $secondsociallink = get_option('footer_second_soacial_link');
            $thirdsocialimg = get_option('footer_third_social_icon_img');
            $thirdsociallink = get_option('footer_third_soacial_link');
           
            ?>    
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 mt-5">
                    <p class="footer-para-primary h5">
                        <?php echo $footerAddress; ?>
                    </p>
                    </div>
                    <div class="col-md-6 mt-5">
                    <h1 class="footer-h1-primary">Follow Us</h1>
                    <div class="accounts text-end">
                        <a href="<?php echo $firstsociallink;?>"><img src="<?php echo $firstsocialimg;?>" alt="" height="40"></a>
                        <a href="<?php echo $secondsociallink;?>"><img src="<?php echo $secondsocialimg;?>" alt="" height="40"></a>
                        <a href="<?php echo $thirdsociallink; ?>"><img src="<?php echo $thirdsocialimg;?>" alt="" height="40"></a>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <hr class="footer-hr">
                    <p class="footer-para-secondary">Call us @ <span class="bold"><?php echo $phone; ?></span>eMail @ <span
                        class="bold"><?php echo $email; ?></span></p>
                    <hr class="footer-hr">
                    <p class="footer-para-third"><?php echo $copyright; ?></p>
                    </div>
                </div>
            </div>            
        <?php }
        
    }
    add_action( 'customize_register' , array( 'Footer_Customize' , 'register' ) );
    add_action('footer_section', array( 'Footer_Customize' , 'footer_html' ));


    ?>