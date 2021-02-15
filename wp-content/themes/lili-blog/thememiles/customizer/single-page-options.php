<?php
/*Single Page Options*/
$wp_customize->add_section('lili_blog_single_page_section', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Single Page Settings', 'lili-blog'),
    'panel'          => 'lili_blog_panel',
));

/*Featured Image Option*/
$wp_customize->add_setting('lili-blog-single-page-featured-image', array(
    'capability'        => 'edit_theme_options',
    'transport'         => 'refresh',
    'default'           => $default['lili-blog-single-page-featured-image'],
    'sanitize_callback' => 'lili_blog_sanitize_checkbox'
));

$wp_customize->add_control('lili-blog-single-page-featured-image', array(
    'label' => __('Enable Featured Image on Single Posts', 'lili-blog'),
    'description' => __('You can hide images on single post from here.', 'lili-blog'),
    'section' => 'lili_blog_single_page_section',
    'settings' => 'lili-blog-single-page-featured-image',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Single Page Sidebar Layout*/
$wp_customize->add_setting('lili-blog-sidebar-single-page', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['lili-blog-sidebar-single-page'],
    'sanitize_callback' => 'lili_blog_sanitize_select'
));

$wp_customize->add_control( 
    new Lili_Blog_Radio_Image_Control(
        $wp_customize,
    'lili-blog-sidebar-single-page', array(
    'choices'     => lili_blog_sidebar_position_array(),
    'label'       => __('Select Sidebar', 'lili-blog'),
    'description' => __('From Appearance > Customize > Widgets and add the widgets on the respected widget areas.', 'lili-blog'),
    'section'     => 'lili_blog_single_page_section',
    'settings'    => 'lili-blog-sidebar-single-page',
    'type'        => 'select',
    'priority'    => 15,
)));

/*Related Post Options*/
$wp_customize->add_setting('lili-blog-single-page-related-posts', array(
    'capability'        => 'edit_theme_options',
    'transport'         => 'refresh',
    'default'           => $default['lili-blog-single-page-related-posts'],
    'sanitize_callback' => 'lili_blog_sanitize_checkbox'
));

$wp_customize->add_control('lili-blog-single-page-related-posts', array(
    'label'       => __('Related Posts', 'lili-blog'),
    'description' => __('2 posts of same category will appear.', 'lili-blog'),
    'section'     => 'lili_blog_single_page_section',
    'settings'    => 'lili-blog-single-page-related-posts',
    'type'        => 'checkbox',
    'priority'    => 15,
));


/*callback functions related posts*/
if (!function_exists('lili_blog_related_post_callback')) :
    function lili_blog_related_post_callback()
    {
        
        $related_posts = absint(lili_blog_get_options('lili-blog-single-page-related-posts'));

        if (1 == $related_posts) {
            return true;
        } else {
            return false;
        }
    }
endif;

/*Related Post Title*/
$wp_customize->add_setting('lili-blog-single-page-related-posts-title', array(
    'capability'        => 'edit_theme_options',
    'transport'         => 'refresh',
    'default'           => $default['lili-blog-single-page-related-posts-title'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('lili-blog-single-page-related-posts-title', array(
    'label'           => __('Related Posts Title', 'lili-blog'),
    'description'     => __('Enter the suitable title.', 'lili-blog'),
    'section'         => 'lili_blog_single_page_section',
    'settings'        => 'lili-blog-single-page-related-posts-title',
    'type'            => 'text',
    'priority'        => 15,
    'active_callback' => 'lili_blog_related_post_callback'
));


