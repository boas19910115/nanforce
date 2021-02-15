<?php
/**
 * Functions to manage breadcrumbs
 */
if (!function_exists('lili_blog_breadcrumb_options')) :
    function lili_blog_breadcrumb_options()
    {
        if (1 == lili_blog_get_options('lili-blog-extra-breadcrumb')) {
            lili_blog_breadcrumbs();
        }
    }
endif;
add_action('lili_blog_breadcrumb_options_hook', 'lili_blog_breadcrumb_options');

/**
 * BreadCrumb Settings
 */
if (!function_exists('lili_blog_breadcrumbs')):
    function lili_blog_breadcrumbs()
    {
        if (!function_exists('lili_blog_breadcrumb_trail')) {
            require get_template_directory() . '/thememiles/breadcrumbs/breadcrumbs.php';
        }
        $breadcrumb_args = array(
            'container' => 'div',
            'show_browse' => false
        );        
        lili_blog_breadcrumb_trail($breadcrumb_args);
    }
endif;
add_action('lili_blog_breadcrumbs_hook', 'lili_blog_breadcrumbs');