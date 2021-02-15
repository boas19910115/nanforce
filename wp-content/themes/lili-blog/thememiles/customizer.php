<?php
/**
 * Lili Blog Theme Customizer
 *
 * @package Lili Blog
 */

if ( !function_exists('lili_blog_default_theme_options_values') ) :

    function lili_blog_default_theme_options_values() {

            $default = array();

          /*Logo Options*/
            $default['lili_blog_logo_width_option']        = '600';
            
            /*Top Header*/
            $default['lili_blog_enable_top_header']        = 0;
            
            $default['lili_blog_enable_top_header_social'] = 0;
            
            $default['lili_blog_enable_top_header_menu']   = 0;
            $default['lili_blog_header_image_height']   = 500;
            $default['lili_blog_slider_overlay_transparent']   = 0.1;
            
          
            /*Header Image*/
           
            $default['lili_blog_enable_header_image_overlay'] = 0;
            $default['lili_blog_slider_overlay_color'] =  '#000000';
            $default['lili_blog_slider_overlay_color'] =  '0.1';
            $default['lili_blog_slider_overlay_color'] =  '100';
           
           /*Header Options*/
          
            $default['lili_blog_enable_offcanvas'] = 0;
            $default['lili_blog_enable_search']    = 0;
            
            /*Colors Options*/
            $default['lili_blog_primary_color']    =  '#d42929';
            /*Slider Options*/
            $default['lili_blog_enable_slider']    =  1;
            $default['lili-blog-select-category']  = 0;
            $default['lili-blog-slider-readmore-text'] = esc_html__('Read More','lili-blog');  
                        
            /*Blog Page*/
            $default['lili-blog-sidebar-blog-page']               = 'no-sidebar';
            $default['lili-blog-column-blog-page']                = 'masonry-post';
            $default['lili-blog-blog-image-layout']               = 'full-image';
            $default['lili-blog-content-show-from']               = 'excerpt';
            $default['lili-blog-excerpt-length']                  = 25;
            $default['lili-blog-pagination-options']              = 'ajax';
            $default['lili-blog-blog-exclude-category']           = '';
            $default['lili-blog-read-more-text']                  = '';
            $default['lili-blog-show-hide-share']                 = 1;
            $default['lili-blog-show-hide-category']              = 1;
            $default['lili-blog-show-hide-date']                  = 1;
            $default['lili-blog-show-hide-author']                = 1;
            $default['lili-blog-single-page-featured-image']      = 1;
            $default['lili-blog-single-page-related-posts']       = 1;
            $default['lili-blog-single-page-related-posts-title'] = esc_html__('Related Posts','lili-blog');
            $default['lili-blog-sidebar-single-page']             = 'single-right-sidebar';
            $default['lili-blog-single-social-share']             = 1;
            $default['lili-blog-single-social-share']             = 0;
           
            /*Sticky Sidebar*/
             $default['lili-blog-enable-sticky-sidebar'] = 0;
             
             /*Footer Section*/
            $default['lili-blog-footer-copyright']            = esc_html__('Copyright All Right Reserved 2020','lili-blog');
            $default['lili-blog-footer-newsletter-title']     = wp_kses_post('Stay Connect with us <span>Get our latest update, offer and many more..</span>','lili-blog');
            $default['lili-blog-footer-newsletter-shortcode'] = '';
             
             /*Breadcrumb Options*/
             $default['lili-blog-extra-breadcrumb']      = 1;
           
        // Pass through filter.
        $default  = apply_filters( 'lili_blog_default_theme_options_values', $default );
        return $default;


}
endif;
/**
 *  Lili Blog Theme Options and Settings
 *
 * @since Lili Blog 1.0.0
 *
 * @param null
 * @return array lili_blog_get_options_value
 *
 */
if ( !function_exists('lili_blog_get_options') ) :
    function lili_blog_get_options( $key = '') {
        
         if (empty( $key ) ) {
            return;
        }
        $lili_blog_default_options = lili_blog_default_theme_options_values();

        $default      = (isset($lili_blog_default_options[$key])) ? $lili_blog_default_options[$key] : '';

        $theme_option = get_theme_mod($key, $default);

        return $theme_option;

    }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lili_blog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
    if ( isset( $wp_customize->selective_refresh ) ) {
      $wp_customize->selective_refresh->add_partial( 'blogname', array(
         'selector'        => '.site-title a',
         'render_callback' => 'lili_blog_customize_partial_blogname',
     ) );
      $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
         'selector'        => '.site-description',
         'render_callback' => 'lili_blog_customize_partial_blogdescription',
     ) );
  }
   $default = lili_blog_default_theme_options_values();

  require get_template_directory() . '/thememiles/customizer/theme-settings.php';

}
add_action( 'customize_register', 'lili_blog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function lili_blog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function lili_blog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lili_blog_customize_preview_js() {
	wp_enqueue_script( 'lili-blog-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20200412', true );
}
add_action( 'customize_preview_init', 'lili_blog_customize_preview_js' );

/*
** Customizer Styles
*/
function lili_blog_panels_css() {
     wp_enqueue_style('lili-blog-customizer-css', get_template_directory_uri() . '/assets/css/customizer-style.css', array(), time());
}
add_action( 'customize_controls_enqueue_scripts', 'lili_blog_panels_css' );