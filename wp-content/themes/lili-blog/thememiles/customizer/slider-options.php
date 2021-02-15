<?php
/*Slider Options*/

$wp_customize->add_section( 'lili_blog_slider_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Slider Settings', 'lili-blog' ),
   'panel'          => 'lili_blog_panel',
) );

/*callback functions slider*/
if ( !function_exists('lili_blog_slider_active_callback') ) :
  function lili_blog_slider_active_callback(){
      $enable_slider = absint(lili_blog_get_options('lili_blog_enable_slider'));
      if( 1 == $enable_slider ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Slider Enable Option*/
$wp_customize->add_setting( 'lili_blog_enable_slider', array(
   'capability'        => 'edit_theme_options',
   'transport'         => 'refresh',
   'default'           => $default['lili_blog_enable_slider'],
   'sanitize_callback' => 'lili_blog_sanitize_checkbox'
) );

$wp_customize->add_control(
    'lili_blog_enable_slider', 
    array(
        'label'       => __( 'Enable Slider', 'lili-blog' ),
        'description' => __('You can select the category for the slider below. More Options are available on premium version.', 'lili-blog'),
        'section'     => 'lili_blog_slider_section',
        'settings'    => 'lili_blog_enable_slider',
        'type'        => 'checkbox',
        'priority'    => 15,
   )
 );        

/*Slider Category Selection*/
$wp_customize->add_setting( 'lili-blog-select-category', array(
    'capability'        => 'edit_theme_options',
    'transport'         => 'refresh',
    'default'           => $default['lili-blog-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Lili_Blog_Customize_Category_Dropdown_Control(
        $wp_customize,
        'lili-blog-select-category',
        array(
            'label'           => __( 'Select Category For Slider', 'lili-blog' ),
            'description'     => __('Choose one category to show the slider.', 'lili-blog'),
            'section'         => 'lili_blog_slider_section',
            'settings'        => 'lili-blog-select-category',
            'type'            => 'category_dropdown',
            'priority'        => 15,
            'active_callback' => 'lili_blog_slider_active_callback',
        )
    )

);


/*Read More Text */
$wp_customize->add_setting('lili-blog-slider-readmore-text', array(
    'capability'        => 'edit_theme_options',
    'transport'         => 'refresh',
    'default'           => $default['lili-blog-slider-readmore-text'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('lili-blog-slider-readmore-text', array(
    'label'           => __('Read More Text', 'lili-blog'),
    'description'     => __('Enter your own Read More text.', 'lili-blog'),
    'section'         => 'lili_blog_slider_section',
    'settings'        => 'lili-blog-slider-readmore-text',
    'type'            => 'text',
    'priority'        => 15,
    'active_callback' => 'lili_blog_slider_active_callback',
));