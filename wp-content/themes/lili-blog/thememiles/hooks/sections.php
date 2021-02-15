<?php


/**
 * Custom theme hook for slider
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Lili Blog
 */
if (!function_exists('lili_blog_add_main_slider')) :
    
    /**
     * Add main slider.
     *
     * @since 1.0.0
     */
    function lili_blog_add_main_slider()
    {
        
        get_template_part('template-parts/sections/slider', 'section');
    }
endif;
add_action('lili_blog_action_slider', 'lili_blog_add_main_slider', 10);


//only for blog and archive page
if( !function_exists( 'lili_blog_blog_sidebar_position_array' ) ) :
    /*
     * Function to get blog categories
     */
    function lili_blog_blog_sidebar_position_array() {

        $sidebar_positions = array(
            'right-sidebar'  => get_template_directory_uri() . '/assets/images/right-sidebar.png',
            'left-sidebar' => get_template_directory_uri() . '/assets/images/left-sidebar.png',
            'no-sidebar'  => get_template_directory_uri() . '/assets/images/no-sidebar.png',
            'middle-column'  => get_template_directory_uri() . '/assets/images/middle-content.png',
        );
        
        return $sidebar_positions;

    }
endif;


//only for single page
if( !function_exists( 'lili_blog_sidebar_position_array' ) ) :
    /*
     * Function to get blog categories
     */
    function lili_blog_sidebar_position_array() {

        $sidebar_positions = array(
            'single-right-sidebar'  => get_template_directory_uri() . '/assets/images/right-sidebar.png',
            'single-left-sidebar' => get_template_directory_uri() . '/assets/images/left-sidebar.png',
            'single-no-sidebar'  => get_template_directory_uri() . '/assets/images/no-sidebar.png',
            'single-middle-column'  => get_template_directory_uri() . '/assets/images/middle-content.png',
        );
        
        return $sidebar_positions;

    }
endif;