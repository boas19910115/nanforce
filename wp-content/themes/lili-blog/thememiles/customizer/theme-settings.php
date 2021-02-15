<?php
/* Theme Options Panel */
	    $wp_customize->add_panel( 'lili_blog_panel', array(
	        'priority' => 30,
	        'capability' => 'edit_theme_options',
	        'title' => __( 'Lili Blog Theme Options', 'lili-blog' ),
) );

/* Customizer Options */
require get_template_directory() . '/thememiles/customizer/logo-options.php';
require get_template_directory() . '/thememiles/customizer/top-header-options.php';
require get_template_directory() . '/thememiles/customizer/header-options.php';
require get_template_directory() . '/thememiles/customizer/color-options.php';
require get_template_directory() . '/thememiles/customizer/slider-options.php';
require get_template_directory() . '/thememiles/customizer/blog-page-options.php';
require get_template_directory() . '/thememiles/customizer/single-page-options.php';
require get_template_directory() . '/thememiles/customizer/sticky-sidebar-options.php';
require get_template_directory() . '/thememiles/customizer/footer-options.php';
require get_template_directory() . '/thememiles/customizer/breadcrumb-options.php';