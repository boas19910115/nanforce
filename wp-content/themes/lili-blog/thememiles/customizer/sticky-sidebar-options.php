<?php 
/*Sticky Sidebar*/
$wp_customize->add_section( 'lili_blog_sticky_sidebar', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Sticky Sidebar Settings', 'lili-blog' ),
   'panel' 		 => 'lili_blog_panel',
) );

/*Sticky Sidebar Setting*/
$wp_customize->add_setting( 'lili-blog-enable-sticky-sidebar', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['lili-blog-enable-sticky-sidebar'],
    'sanitize_callback' => 'lili_blog_sanitize_checkbox'
) );

$wp_customize->add_control( 'lili-blog-enable-sticky-sidebar', array(
    'label'     => __( 'Enable Sticky Sidebar', 'lili-blog' ),
    'description' => __('Enable and Disable sticky sidebar from this section.', 'lili-blog'),
    'section'   => 'lili_blog_sticky_sidebar',
    'settings'  => 'lili-blog-enable-sticky-sidebar',
    'type'      => 'checkbox',
    'priority'  => 15,
) );