<?php
/**
 * Dynamic css
 *
 * @since Lili Blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
if (!function_exists('lili_blog_dynamic_css')) :

    function lili_blog_dynamic_css()
    {
        

        /* Color Options Options */
        $lili_blog_primary_color      = esc_attr(lili_blog_get_options('lili_blog_primary_color'));
        $lili_blog_logo_width         = absint(lili_blog_get_options('lili_blog_logo_width_option'));
        
        $lili_blog_header_overlay     = esc_attr(lili_blog_get_options('lili_blog_slider_overlay_color'));
        $lili_blog_header_transparent = esc_attr(lili_blog_get_options('lili_blog_slider_overlay_transparent'));
        $lili_blog_header_min_height  = absint(lili_blog_get_options('lili_blog_header_image_height'));

        $custom_css = '';

        //Primary  Background 
        if (!empty($lili_blog_primary_color)) {
            $custom_css .= "
            #toTop:hover,
            a.effect:before, 
            a.link-format,
            .tabs-nav li:before,
            .post-slider-section .s-cat, 
            .bottom-caption .slick-current .slider-items span,
            aarticle.format-status .post-content .post-format::after,
            article.format-chat .post-content .post-format::after, 
            article.format-link .post-content .post-format::after,
            article.format-standard .post-content .post-format::after, 
            article.format-image .post-content .post-format::after, 
            article.hentry.sticky .post-content .post-format::after, 
            article.format-video .post-content .post-format::after, 
            article.format-gallery .post-content .post-format::after, 
            article.format-audio .post-content .post-format::after, 
            article.format-quote .post-content .post-format::after,  
            input[type='button']:hover,
            input[type='submit']:hover,
            .slider-items a.meta-cat, a.more-btn:hover, .show-more:hover,
            .slick-dots li.slick-active button,
            .post-slide .entry-title:before,
            a.read-more:before, .sidebar .widget-title:after,
            .widgettitle:after,
            #wp-calendar tbody #today,
            .share-wrap .post-share a:hover, h2.sec-title:before,
            .site-footer input[type='submit'],
            #toTop, .author-profile ul.social-links li a i:hover,
            .sch-btn:hover, .page-numbers:hover, .page-numbers.current,
            .newsletter{ 
                background-color: ". $lili_blog_primary_color."; 
                border-color: ".$lili_blog_primary_color.";
            }";

        }

        //Primary Color
        if (!empty($lili_blog_primary_color)) {
            $custom_css .= " 
            .header-top a:hover,
            .header-top ul.menu > li a:hover, 
            .header-top ul.menu > li.current_page_item a, 
            ul.social-menu li a:hover:before,
            .social-links ul li a:hover, 
            .main-menu ul li.current-menu-item > a,  
            .main-menu ul li:hover > a,
            .post-navigation .nav-links a:hover, 
            .post-navigation .nav-links a:focus,
            .tabs-nav li.tab-active a, 
            .tabs-nav li.tab-active,
            .tabs-nav li.tab-active a, 
            .tabs-nav li.tab-active,
            ul.trail-items li a:hover span,
            .author-socials a:hover,
            .post-date a:focus, 
            .post-date a:hover,
            .post-excerpt a:hover, 
            .post-excerpt a:focus, 
            .content a:hover, 
            .content a:focus,
            .post-footer > span a:hover, 
            .post-footer > span a:focus,
            .widget a:hover, 
            .widget a:focus,
            .footer-menu li a:hover, 
            .footer-menu li a:focus,
            .footer-social-links a:hover,
            .footer-social-links a:focus,
            .site-footer a:hover, 
            .site-footer a:focus, .content-area p a,
            h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, 
            .cat-links a:hover,
            .read-more:hover,
            .post-share a:hover,
            .reply a:hover, .back_home a:hover{ 
                color : ". $lili_blog_primary_color."; 
            }";
        }

        //Logo Width
        if (!empty($lili_blog_logo_width)) {
            $custom_css .= "
            .header-one .logo-wrap{ 
                max-width : ". $lili_blog_logo_width."px; 
            }";
        }

        //Header Overlay
        if (!empty($lili_blog_header_overlay)) {
            $custom_css .= "
            .header-image:before { 
                background-color : ". $lili_blog_header_overlay."; 
            }";
        }

        //Header Tranparent
        if (!empty($lili_blog_header_transparent)) {
            $custom_css .= "
            .header-image:before { 
                opacity : ". $lili_blog_header_transparent."; 
            }";
        }

        //Header Min Height
        if (!empty($lili_blog_header_min_height)) {
            $custom_css .= "
            .header-one .header-image .logo-wrap { 
                min-height : ". $lili_blog_header_min_height."px; 
            }";
        }

        wp_add_inline_style('lili-blog-style', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'lili_blog_dynamic_css', 99);