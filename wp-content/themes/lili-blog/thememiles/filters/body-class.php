<?php
/**
 * Add sidebar class in body
 *
 * @since Lili Blog 1.0.0
 *
 */

add_filter('body_class', 'lili_blog_body_class');
function lili_blog_body_class($classes)
{
    $classes[] = 'at-sticky-sidebar';
       
    if (is_singular()) {
        $sidebar = lili_blog_get_options('lili-blog-sidebar-single-page');
        if ($sidebar == 'single-no-sidebar') {
            $classes[] = 'no-sidebar';
        } elseif ($sidebar == 'single-left-sidebar') {
            $classes[] = 'left-sidebar';
        } elseif ($sidebar == 'single-middle-column') {
            $classes[] = 'middle-column';
        } else {
            $classes[] = 'single-right-sidebar';
        }
    }
    
    $sidebar = lili_blog_get_options('lili-blog-sidebar-blog-page');

     if (!is_singular()) {

        if ($sidebar == 'no-sidebar') {
            $classes[] = 'no-sidebar';
        } elseif ($sidebar == 'left-sidebar') {
            $classes[] = 'left-sidebar';
        } elseif ($sidebar == 'middle-column') {
            $classes[] = 'middle-column';
        } else {
            $classes[] = 'right-sidebar';
        }
     }   
    return $classes;
}

/**
 * Add layout class in body
 *
 * @since Lili Blog 1.0.0
 *
 */

add_filter('body_class', 'lili_blog_layout_body_class');
function lili_blog_layout_body_class($classes)
{
    $layout = lili_blog_get_options('lili-blog-column-blog-page');
    if ($layout == 'masonry-post') {
        $classes[] = 'masonry-post';
    } else {
        $classes[] = 'one-column';
    }    
    return $classes;
}


