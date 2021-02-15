<?php
/*Top Header Options*/
$wp_customize->add_section( 'lili_blog_top_header_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Top Header', 'lili-blog' ),
   'panel'          => 'lili_blog_panel',
) );

/*callback functions header section*/
if ( !function_exists('lili_blog_header_active_callback') ) :
  function lili_blog_header_active_callback(){
      
     $enable_header = absint(lili_blog_get_options('lili_blog_enable_top_header'));

      if( 1 == $enable_header ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Enable Top Header Section*/
$wp_customize->add_setting( 'lili_blog_enable_top_header', array(
   'capability'        => 'edit_theme_options',
   'transport'         => 'refresh',
   'default'           => $default['lili_blog_enable_top_header'],
   'sanitize_callback' => 'lili_blog_sanitize_checkbox'
) );

$wp_customize->add_control( 'lili_blog_enable_top_header', array(
   'label'       => __( 'Enable Top Header', 'lili-blog' ),
   'description' => __('Checked to show the top header section like search and social icons', 'lili-blog'),
   'section'     => 'lili_blog_top_header_section',
   'settings'    => 'lili_blog_enable_top_header',
   'type'        => 'checkbox',
   'priority'    => 5,
) );

/*Enable Social Icons In Header*/
$wp_customize->add_setting( 'lili_blog_enable_top_header_social', array(
   'capability'        => 'edit_theme_options',
   'transport'         => 'refresh',
   'default'           => $default['lili_blog_enable_top_header_social'],
   'sanitize_callback' => 'lili_blog_sanitize_checkbox'
) );

$wp_customize->add_control( 'lili_blog_enable_top_header_social', array(
   'label'           => __( 'Enable Social Icons', 'lili-blog' ),
   'description'     => __('You can show the social icons here. Manage social icons from Appearance > Menus. Social Menu will display here.', 'lili-blog'),
   'section'         => 'lili_blog_top_header_section',
   'settings'        => 'lili_blog_enable_top_header_social',
   'type'            => 'checkbox',
   'priority'        => 5,
   'active_callback' =>'lili_blog_header_active_callback'
) );

/*Enable Menu in top Header*/
$wp_customize->add_setting( 'lili_blog_enable_top_header_menu', array(
    'capability'        => 'edit_theme_options',
    'transport'         => 'refresh',
    'default'           => $default['lili_blog_enable_top_header_menu'],
    'sanitize_callback' => 'lili_blog_sanitize_checkbox'
) );

$wp_customize->add_control( 'lili_blog_enable_top_header_menu', array(
    'label'           => __( 'Menu in Header', 'lili-blog' ),
    'description'     => __('Top Header Menu will display here. Go to Appearance < Menu.', 'lili-blog'),
    'section'         => 'lili_blog_top_header_section',
    'settings'        => 'lili_blog_enable_top_header_menu',
    'type'            => 'checkbox',
    'priority'        => 5,
    'active_callback' =>'lili_blog_header_active_callback'
) );

/* Header Image Additional Options */
/*Enable Overlay on the Header Image Part*/
$wp_customize->add_setting( 'lili_blog_enable_header_image_overlay', array(
   'capability'        => 'edit_theme_options',
   'transport'         => 'refresh',
   'default'           => $default['lili_blog_enable_header_image_overlay'],
   'sanitize_callback' => 'lili_blog_sanitize_checkbox'
) );

$wp_customize->add_control(
    'lili_blog_enable_header_image_overlay', 
    array(
        'label'       => __( 'Enable Header Image Overlay Color Height', 'lili-blog' ),
        'description' => __('This option will add colors over the header image.', 'lili-blog'),
        'section'     => 'header_image',
        'settings'    => 'lili_blog_enable_header_image_overlay',
        'type'        => 'checkbox',
        'priority'    => 15,
   )
 );

/*callback functions slider getting from post*/
if ( !function_exists('lili_blog_header_overlay_color_active_callback') ) :
  function lili_blog_header_overlay_color_active_callback(){
      
      $slider_overlay = absint(lili_blog_get_options('lili_blog_enable_header_image_overlay'));
      if( $slider_overlay == 1 ){
          return true;
      }
      else{
          return false;
      }
  }
endif;  

/*Header Image Height*/
$wp_customize->add_setting( 'lili_blog_header_image_height', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['lili_blog_header_image_height'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'lili_blog_header_image_height', array(
   'label'     => __( 'Header Image Min Height', 'lili-blog' ),
   'description' => __('Adjust the header image min height height. Minimum is 50px and maximum is 500px.', 'lili-blog'),
   'section'   => 'header_image',
   'settings'  => 'lili_blog_header_image_height',
   'type'      => 'range',
   'priority'  => 15,
   'input_attrs' => array(
          'min' => 50,
          'max' => 500,
        ),
    'active_callback'=> 'lili_blog_header_overlay_color_active_callback',
) ); 

/* Select the color for the Overlay */
$wp_customize->add_setting( 'lili_blog_slider_overlay_color',
    array(
        'default'           => $default['lili_blog_slider_overlay_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(                 
        $wp_customize,
        'lili_blog_slider_overlay_color',
        array(
            'label'       => esc_html__( 'Header Image Overlay Color', 'lili-blog' ),
            'description' => esc_html__( 'It will add the color overlay of the Header image. To make it transparent, use the below option.', 'lili-blog' ),
            'section'     => 'header_image', 
            'priority'  => 15, 
            'active_callback'=> 'lili_blog_header_overlay_color_active_callback',
        )
    )
);

/*Overlay Range for transparent*/
$wp_customize->add_setting( 'lili_blog_slider_overlay_transparent', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['lili_blog_slider_overlay_transparent'],
    'sanitize_callback' => 'lili_blog_sanitize_number'
) );
$wp_customize->add_control( 'lili_blog_slider_overlay_transparent', array(
   'label'     => __( 'Header Image Overlay Color Transparent', 'lili-blog' ),
   'description' => __('You can make the overlay transparent using this option. Add range from 0.1 to 1.', 'lili-blog'),
   'section'   => 'header_image',
   'settings'  => 'lili_blog_slider_overlay_transparent',
   'type'      => 'number',
   'priority'  => 15,
   'input_attrs' => array(
        'min' => '0.1',
        'max' => '1',
        'step' => '0.1',
    ),
   'active_callback' => 'lili_blog_header_overlay_color_active_callback',
) );