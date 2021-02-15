<?php
/*Promo Section Options*/

$wp_customize->add_section( 'lili_blog_promo_section', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Boxes Below Slider Settings', 'lili-blog' ),
    'panel'          => 'lili_blog_panel',
) );

/*callback functions slider*/
if ( !function_exists('lili_blog_promo_active_callback') ) :
    function lili_blog_promo_active_callback(){
        global $lili_blog_theme_options;
        $enable_promo = absint($lili_blog_theme_options['lili_blog_enable_promo']);
        if( 1 == $enable_promo ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

/*Boxes Enable Option*/
$wp_customize->add_setting( 'lili_blog_options[lili_blog_enable_promo]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['lili_blog_enable_promo'],
    'sanitize_callback' => 'lili_blog_sanitize_checkbox'
) );

$wp_customize->add_control( 'lili_blog_options[lili_blog_enable_promo]', array(
    'label'     => __( 'Enable Boxes', 'lili-blog' ),
    'description' => __('Enable and select the category to show the boxes below slider.', 'lili-blog'),
    'section'   => 'lili_blog_promo_section',
    'settings'  => 'lili_blog_options[lili_blog_enable_promo]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );

/*Promo Category Selection*/
$wp_customize->add_setting( 'lili_blog_options[lili-blog-promo-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['lili-blog-promo-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Lili_Blog_Customize_Category_Dropdown_Control(
        $wp_customize,
        'lili_blog_options[lili-blog-promo-select-category]',
        array(
            'label'     => __( 'Category For Boxes', 'lili-blog' ),
            'description' => __('From the dropdown select the category for the boxes. Category having post will display in below boxes section.', 'lili-blog'),
            'section'   => 'lili_blog_promo_section',
            'settings'  => 'lili_blog_options[lili-blog-promo-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 5,
            'active_callback'=>'lili_blog_promo_active_callback'
        )
    )
);