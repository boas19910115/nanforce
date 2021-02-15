<?php
/*Header Options*/
$wp_customize->add_section('lili_blog_header_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Header Settings', 'lili-blog'),
    'panel' => 'lili_blog_panel',
));


/*Header Search Enable Option*/
$wp_customize->add_setting( 'lili_blog_enable_search', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['lili_blog_enable_search'],
    'sanitize_callback' => 'lili_blog_sanitize_checkbox'
) );

$wp_customize->add_control( 'lili_blog_enable_search', array(
    'label'     => __( 'Enable Search', 'lili-blog' ),
    'description' => __('It will help to display the search in Menu.', 'lili-blog'),
    'section'   => 'lili_blog_header_section',
    'settings'  => 'lili_blog_enable_search',
    'type'      => 'checkbox',
    'priority'  => 5,

) );


/*Header Offcanvas Enable Option*/
$wp_customize->add_setting( 'lili_blog_enable_offcanvas', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['lili_blog_enable_offcanvas'],
    'sanitize_callback' => 'lili_blog_sanitize_checkbox'
) );

$wp_customize->add_control( 'lili_blog_enable_offcanvas', array(
    'label'     => __( 'Enable Offcanvas Sidebar', 'lili-blog' ),
    'description' => __('It will help to display the Offcanvas sidebar in Menu.', 'lili-blog'),
    'section'   => 'lili_blog_header_section',
    'settings'  => 'lili_blog_enable_offcanvas',
    'type'      => 'checkbox',
    'priority'  => 5,

) );