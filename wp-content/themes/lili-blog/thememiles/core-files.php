<?php
/**
 * Load Core Files
 *
 * @since 1.0.0
*/
/**
 * Enqueue CSS and JS
 */
require get_template_directory() . '/thememiles/enqueue.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/thememiles/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/thememiles/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/thememiles/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/thememiles/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/thememiles/jetpack.php';
}

/**
 * Load sanitize functions file
 */
require get_template_directory() . '/thememiles/sanitize-functions.php';

/**
 * Load category dropdown functions
 */
require get_template_directory() . '/thememiles/customizer-category-control.php';

/**
 * Load category dropdown functions
 */
require get_template_directory() . '/thememiles/customizer-radio-image-control.php';

/**
 * Dynamic CSS file load
 */
require get_template_directory() . '/thememiles/dynamic-css.php';

/**
 * Load Hooks
*/
require get_template_directory() . '/thememiles/hooks/related-posts.php';
require get_template_directory() . '/thememiles/hooks/posts-navigation.php';
require get_template_directory() . '/thememiles/hooks/breadcrumb.php';
require get_template_directory() . '/thememiles/hooks/social-sharing.php';
require get_template_directory() . '/thememiles/hooks/sections.php';
require get_template_directory() . '/thememiles/hooks/masonry.php';

/**
 * Load Filters
*/
require get_template_directory() . '/thememiles/filters/excerpt.php';
require get_template_directory() . '/thememiles/filters/jetpack-widget.php';
require get_template_directory() . '/thememiles/filters/body-class.php';

/**
 * load custom widgets
 */
require get_template_directory() . '/thememiles/widgets/widget-init.php';
require get_template_directory() . '/thememiles/widgets/lili-blog-author-widget.php';
require get_template_directory() . '/thememiles/widgets/recent-posts-widget.php';
require get_template_directory() . '/thememiles/widgets/social-widget.php';


/**
 * Upgrade to pro
 */
 require get_template_directory() . '/thememiles/customizer-pro/class-customize.php';

/**
 * Load TGM File
*/
require get_template_directory() . '/thememiles/class-tgm-plugin-activation.php';

/**
 * Plugin recommendation using TGM
*/
require get_template_directory() . '/thememiles/tgm-plugin-activation.php';

