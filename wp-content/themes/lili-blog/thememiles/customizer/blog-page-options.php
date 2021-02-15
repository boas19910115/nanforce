<?php
/*Blog Page Options*/
$wp_customize->add_section('lili_blog_blog_page_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Blog Settings', 'lili-blog'),
    'panel' => 'lili_blog_panel',
));
/*Blog Page Sidebar Layout*/

$wp_customize->add_setting('lili-blog-sidebar-blog-page', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['lili-blog-sidebar-blog-page'],
    'sanitize_callback' => 'lili_blog_sanitize_select'
));

$wp_customize->add_control( new Lili_Blog_Radio_Image_Control(
        $wp_customize,
    'lili-blog-sidebar-blog-page', array(
    'choices' => lili_blog_blog_sidebar_position_array(),
    'label' => __('Blog and Archive Sidebar', 'lili-blog'),
    'description' => __('This sidebar will work blog and archive pages.', 'lili-blog'),
    'section' => 'lili_blog_blog_page_section',
    'settings' => 'lili-blog-sidebar-blog-page',
    'type' => 'select',
    'priority' => 15,
)));


/*Blog Page column number*/
$wp_customize->add_setting('lili-blog-column-blog-page', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['lili-blog-column-blog-page'],
    'sanitize_callback' => 'lili_blog_sanitize_select'
));

$wp_customize->add_control('lili-blog-column-blog-page', array(
    'choices' => array(
        'one-column' => __('Single Layout', 'lili-blog'),
        'masonry-post' => __('Masonry Layout', 'lili-blog'),
    
    ),
    'label' => __('Blog Layout Options', 'lili-blog'),
    'description' => __('Change your blog or archive page layout.', 'lili-blog'),
    'section' => 'lili_blog_blog_page_section',
    'settings' => 'lili-blog-column-blog-page',
    'type' => 'select',
    'priority' => 15,
));


/*Image Layout Options For Blog Page*/
$wp_customize->add_setting('lili-blog-blog-image-layout', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['lili-blog-blog-image-layout'],
    'sanitize_callback' => 'lili_blog_sanitize_select'
));

$wp_customize->add_control('lili-blog-blog-image-layout', array(
    'choices' => array(
        'full-image' => __('Full Layout', 'lili-blog'),
        'left-image' => __('Grid Layout', 'lili-blog'),
    
    ),
    'label' => __('Blog Page Layout', 'lili-blog'),
    'description' => __('This will work only on Full layout Option', 'lili-blog'),
    'section' => 'lili_blog_blog_page_section',
    'settings' => 'lili-blog-blog-image-layout',
    'type' => 'select',
    'priority' => 15,
));

/*Blog Page Show content from*/
$wp_customize->add_setting('lili-blog-content-show-from', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['lili-blog-content-show-from'],
    'sanitize_callback' => 'lili_blog_sanitize_select'
));

$wp_customize->add_control('lili-blog-content-show-from', array(
    'choices' => array(
        'excerpt' => __('Show from Excerpt', 'lili-blog'),
        'content' => __('Show from Content', 'lili-blog'),
    ),
    'label' => __('Select Content Display From', 'lili-blog'),
    'description' => __('You can enable excerpt from Screen Options inside post section of dashboard', 'lili-blog'),
    'section' => 'lili_blog_blog_page_section',
    'settings' => 'lili_blog_options[lili-blog-content-show-from]',
    'type' => 'select',
    'priority' => 15,
));


/*Blog Page excerpt length*/
$wp_customize->add_setting('lili-blog-excerpt-length', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['lili-blog-excerpt-length'],
    'sanitize_callback' => 'absint'

));

$wp_customize->add_control('lili-blog-excerpt-length', array(
    'label' => __('Excerpt Length', 'lili-blog'),
    'description' => __('Enter the number per Words to show the content in blog page.', 'lili-blog'),
    'section' => 'lili_blog_blog_page_section',
    'settings' => 'lili-blog-excerpt-length',
    'type' => 'number',
    'priority' => 15,
));

/*Exclude Category in Blog Page*/
$wp_customize->add_setting('lili-blog-blog-exclude-category', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['lili-blog-blog-exclude-category'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('lili-blog-blog-exclude-category', array(
    'label' => __('Exclude categories in Blog Listing', 'lili-blog'),
    'description' => __('Enter categories ids with comma separated eg: 2,7,14,47.', 'lili-blog'),
    'section' => 'lili_blog_blog_page_section',
    'settings' => 'lili-blog-blog-exclude-category',
    'type' => 'text',
    'priority' => 15,
));

/*Blog Page Pagination Options*/
$wp_customize->add_setting('lili-blog-pagination-options', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['lili-blog-pagination-options'],
    'sanitize_callback' => 'lili_blog_sanitize_select'

));

$wp_customize->add_control('lili-blog-pagination-options', array(
    'choices' => array(
        'numeric' => __('Numeric Pagination', 'lili-blog'),
        'ajax' => __('Ajax Pagination', 'lili-blog'),
    ),
    'label' => __('Pagination Types', 'lili-blog'),
    'description' => __('Choose Required Pagination Type', 'lili-blog'),
    'section' => 'lili_blog_blog_page_section',
    'settings' => 'lili-blog-pagination-options',
    'type' => 'select',
    'priority' => 15,
));



/*Social Share in blog page*/
$wp_customize->add_setting('lili-blog-show-hide-share', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['lili-blog-show-hide-share'],
    'sanitize_callback' => 'lili_blog_sanitize_checkbox'
));

$wp_customize->add_control('lili-blog-show-hide-share', array(
    'label' => __('Show Social Share', 'lili-blog'),
    'description' => __('Options to Enable Social Share in blog and archive page.', 'lili-blog'),
    'section' => 'lili_blog_blog_page_section',
    'settings' => 'lili-blog-show-hide-share',
    'type' => 'checkbox',
    'priority' => 15,
));

/*Category Show hide*/
$wp_customize->add_setting('lili-blog-show-hide-category', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['lili-blog-show-hide-category'],
    'sanitize_callback' => 'lili_blog_sanitize_checkbox'
));

$wp_customize->add_control('lili-blog-show-hide-category', array(
    'label' => __('Show Category', 'lili-blog'),
    'description' => __('Option to hide the category on the blog page.', 'lili-blog'),
    'section' => 'lili_blog_blog_page_section',
    'settings' => 'lili-blog-show-hide-category',
    'type' => 'checkbox',
    'priority' => 15,
));
/*Date Show hide*/
$wp_customize->add_setting('lili-blog-show-hide-date', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['lili-blog-show-hide-date'],
    'sanitize_callback' => 'lili_blog_sanitize_checkbox'
));

$wp_customize->add_control('lili-blog-show-hide-date', array(
    'label' => __('Show Date', 'lili-blog'),
    'description' => __('Option to hide the date on the blog page.', 'lili-blog'),
    'section' => 'lili_blog_blog_page_section',
    'settings' => 'lili-blog-show-hide-date',
    'type' => 'checkbox',
    'priority' => 15,
));
/*Author Show hide*/
$wp_customize->add_setting('lili-blog-show-hide-author', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['lili-blog-show-hide-author'],
    'sanitize_callback' => 'lili_blog_sanitize_checkbox'
));

$wp_customize->add_control('lili-blog-show-hide-author', array(
    'label' => __('Show Author', 'lili-blog'),
    'description' => __('Option to hide the author on the blog page.', 'lili-blog'),
    'section' => 'lili_blog_blog_page_section',
    'settings' => 'lili-blog-show-hide-author',
    'type' => 'checkbox',
    'priority' => 15,
));

