<?php
/**
 * Enqueue scripts and styles.
 */
function lili_blog_scripts() {

	/*google font  */
	global $lili_blog_theme_options;
    /*body  */
    wp_enqueue_style('lili-blog-body', '//fonts.googleapis.com/css?family=Cabin%3A400%2C500%26subset%3Dlatin%2Clatin-ext%7CMontserrat%3A300%2C400%2C500%26subset%3Dlatin%2Clatin-ext&subset=latin%2Clatin-ext', array(), null);
    /*heading  */
    wp_enqueue_style('lili-blog-heading', '//fonts.googleapis.com/css?family=Lustria&display=swap', array(), null);
    /*Author signature google font  */
    wp_enqueue_style('lili-blog-sign', '//fonts.googleapis.com/css?family=Shadows+Into+Light&display=swap', array(), null);
    
	//*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.5.0' );

    wp_enqueue_style( 'grid-css', get_template_directory_uri() . '/assets/css/grid.min.css', array(), '4.5.0' );
    
    /*Slick CSS*/
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '4.5.0' );
	
    /*mmenu CSS*/
    wp_enqueue_style( 'offcanvas-style', get_template_directory_uri() . '/assets/css/canvi.css', array(), '4.5.0' );


   /*Main CSS*/
    wp_enqueue_style( 'lili-blog-style', get_stylesheet_uri() ); 

    /*responsive CSS*/
    wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '4.5.0' );

    $lili_blog_pagination_option =  esc_attr(lili_blog_get_options('lili-blog-pagination-options'));
    
    if( 'ajax' == $lili_blog_pagination_option )  {
    	
    	wp_enqueue_script( 'lili-blog-custom-pagination', get_template_directory_uri() . '/assets/js/custom-infinte-pagination.js', array('jquery'), '4.6.0', true );
    }
    wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.js', array('jquery'), '20200412', true );

    $masonry =  esc_attr(lili_blog_get_options('lili-blog-column-blog-page'));
    if( 'masonry-post' == $masonry || 'one-column' == $masonry)  {
        wp_enqueue_script( 'masonry' );
        wp_enqueue_script( 'lili-blog-custom-masonry', get_template_directory_uri() . '/assets/js/custom-masonry.js', array('jquery'), '4.6.0', true );
   }

	wp_enqueue_script( 'lili-blog-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '20200412', true );

	/*Slick JS*/
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), '4.6.0', true  );
    
    /*mmenu JS*/
    $canvi =  absint(lili_blog_get_options('lili_blog_enable_offcanvas'));
    if( 1  == $canvi )  {
        wp_enqueue_script( 'offcanvas-script', get_template_directory_uri() . '/assets/js/canvi.js', array('jquery'), '4.6.0', true );
        wp_enqueue_script( 'offcanvas-custom', get_template_directory_uri() . '/assets/js/canvi-custom.js', array('jquery'), '4.6.0', true );
    }
    
    /*Custom Script JS*/
	wp_enqueue_script( 'lili-blog-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '20200412', true );
    
	/*Custom Scripts*/
	wp_enqueue_script( 'lili-blog-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '20200412', true );
    
	global $wp_query;
    $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    $max_num_pages = $wp_query->max_num_pages;

    wp_localize_script( 'lili-blog-custom', 'lili_blog_ajax', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'paged'     => $paged,
        'max_num_pages'      => $max_num_pages,
        'next_posts'      => next_posts( $max_num_pages, false ),
        'show_more'      => __( 'View More', 'lili-blog' ),
        'no_more_posts'        => __( 'No More', 'lili-blog' ),
    ));

	wp_enqueue_script( 'lili-blog-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array('jquery'), '20200412', true );

	/*Sticky Sidebar*/
	
	if( 1 == absint(lili_blog_get_options('lili-blog-enable-sticky-sidebar'))) {
		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array(), '20200412', true );
        wp_enqueue_script( 'lili-blog-sticky-sidebar', get_template_directory_uri() . '/assets/js/custom-sticky-sidebar.js', array('jquery'), '20200412', true );
	}
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script('comment-reply');
    }
}
add_action( 'wp_enqueue_scripts', 'lili_blog_scripts' );