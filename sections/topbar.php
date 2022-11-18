<?php
/**
 * for Top Bar Header
*/
class TopBar_Customize{
    public static function register ( $wp_customize ) {

         $wp_customize->add_section('sf_top_banner', 
               array(
                    'title'      => __( 'Top Banner Bar', 'storefront-child' ),
                    'priority'   => 1,
                ));

                 //  =============================
                //   = Copy Right Textbox        =
                //   =============================
                $wp_customize->add_setting('top_banner_bar_copy', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('themename_text7_1_headings', array(
                    'label'      => __('CopyRight Content', 'themename'),
                    'section'    => 'sf_top_banner',
                    'settings'   => 'top_banner_bar_copy',
                    'priority'   => 1,  
                    'type'       => 'text'
    
                ));

                //  =============================
                //  = Social 1st Image          =
                //  =============================
                $wp_customize->add_setting('first_social_icon_img', array(
                    'default'           => '',
                    'capability'        => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'img', array(
                    'label'    => __('Social Image 1', 'themename'),
                    'section'  => 'sf_top_banner',
                    'priority'   => 2, 
                    'settings' => 'first_social_icon_img',
                )));

                //  =============================
                //   = 1st Social Link          =
                //  =============================
                $wp_customize->add_setting('first_soacial_link', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('first_social_link', array(
                    'label'      => __('1st Social Link', 'themename'),
                    'section'    => 'sf_top_banner',
                    'settings'   => 'first_soacial_link',
                    'priority'   => 3,  
                    'type'       => 'text'
    
                ));


                //  =============================
                //  = Social 2nd Image          =
                //  =============================
                $wp_customize->add_setting('second_social_icon_img', array(
                    'default'           => '',
                    'capability'        => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'img2', array(
                    'label'    => __('Social Image 2', 'themename'),
                    'section'  => 'sf_top_banner',
                    'priority'   => 4, 
                    'settings' => 'second_social_icon_img',
                )));

                //  =============================
                //   =2nd  Social Link          =
                //  =============================
                $wp_customize->add_setting('second_soacial_link', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('second_social_link', array(
                    'label'      => __('2nd Social Link', 'themename'),
                    'section'    => 'sf_top_banner',
                    'settings'   => 'second_soacial_link',
                    'priority'   => 5,  
                    'type'       => 'text'
    
                ));

                //  =============================
                //  = Social 3rd Image          =
                //  =============================
                $wp_customize->add_setting('third_social_icon_img', array(
                    'default'           => '',
                    'capability'        => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'img3', array(
                    'label'    => __('Social Image 3', 'themename'),
                    'section'  => 'sf_top_banner',
                    'priority'   => 6, 
                    'settings' => 'third_social_icon_img',
                )));

                //  =============================
                //   =3rd  Social Link          =
                //  =============================
                $wp_customize->add_setting('third_soacial_link', array(
                    'default'        => '',
                    'capability'     => 'edit_theme_options',
                    'type'           => 'option',
            
                ));
            
                $wp_customize->add_control('third_soacial_link', array(
                    'label'      => __('3rd Social Link', 'themename'),
                    'section'    => 'sf_top_banner',
                    'settings'   => 'third_soacial_link',
                    'priority'   => 7,  
                    'type'       => 'text'
    
                ));


            }
        public static function top_bar( $wp_customize ){       

            $copy = get_option('top_banner_bar_copy');
            $firstsocialimg = get_option('first_social_icon_img');
            $firstsociallink = get_option('first_soacial_link');
            $secondsocialimg = get_option('second_social_icon_img');
            $secondsociallink = get_option('second_soacial_link');
            $thirdsocialimg = get_option('third_social_icon_img');
            $thirdsociallink = get_option('third_soacial_link');
            ?>    
            <div class="acc">
                    <div class="row">
                      <div class="col-md-12">
                        <ul>
                            <li><a href="<?php echo $firstsociallink;?>"><img src="<?php echo $firstsocialimg; ?>" alt="" height="40px"></a></li>
                            <li><a href="<?php echo $secondsociallink;?>"><img src="<?php echo $secondsocialimg;?>" alt="" height="40px"></a></li>
                            <li><a href="<?php echo $thirdsociallink;?>"><img src="<?php echo $thirdsocialimg; ?>" alt="" height="40px"></a></li>
                        </ul>    
                      </div>
                      <div class="col-md-12">
                        <p class="acc-para-primary"><?php echo $copy; ?></p>
                      </div>
                    </div>
                  </div>
            
        <?php }
        
    }
    add_action( 'customize_register' , array( 'TopBar_Customize' , 'register' ) );
    add_action('after_menu', array( 'TopBar_Customize' , 'top_bar' ));


    /**
    * for Top Bar Header
    */
    ?>