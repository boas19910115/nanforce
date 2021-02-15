<?php
/*Footer Options*/
$wp_customize->add_section('lili_blog_footer_section', array(
    'priority' => 20,
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => __('Footer Settings', 'lili-blog'),
    'panel' => 'lili_blog_panel',
));


/*Copyright Setting*/
$wp_customize->add_setting('lili-blog-footer-copyright', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['lili-blog-footer-copyright'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('lili-blog-footer-copyright', array(
    'label' => __('Copyright Text', 'lili-blog'),
    'description' => __('Enter your own copyright text.', 'lili-blog'),
    'section' => 'lili_blog_footer_section',
    'settings' => 'lili-blog-footer-copyright',
    'type' => 'text',
    'priority' => 15,
));

/*News Letter Title Setting*/
$wp_customize->add_setting('lili-blog-footer-newsletter-title', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['lili-blog-footer-newsletter-title'],
    'sanitize_callback' => 'wp_kses_post'
));

$wp_customize->add_control('lili-blog-footer-newsletter-title', array(
    'label' => __('NewsLetter Text', 'lili-blog'),
    'description' => __('Enter your own Text. You can add <span> tag to make in next line', 'lili-blog'),
    'section' => 'lili_blog_footer_section',
    'settings' => 'lili-blog-footer-newsletter-title',
    'type' => 'text',
    'priority' => 15,
));


/*MailChimp Shortcode Setting*/
$wp_customize->add_setting('lili-blog-footer-newsletter-shortcode', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['lili-blog-footer-newsletter-shortcode'],
    'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control('lili-blog-footer-newsletter-shortcode', array(
    'label' => __('MailChimp Shortcode', 'lili-blog'),
    'description' => __('Enter your MailChimp Shortcode Here.', 'lili-blog'),
    'section' => 'lili_blog_footer_section',
    'settings' => 'lili-blog-footer-newsletter-shortcode',
    'type' => 'text',
    'priority' => 15,
));
