<?php
/**
 * Recommended plugins
 *
 * @package lili-blog
 * @version 1.0.0
 */
if ( ! function_exists( 'blog_web_recommended_plugins' ) ) :
	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.0
	 */
	function blog_web_recommended_plugins() {
		
		$plugins = array(

			array(
				'name'     => esc_html__( 'Lili Blog Demo Import', 'lili-blog' ),
				'slug'     => 'thememiles-toolset',
				'required' => false,
			),

		);
		tgmpa( $plugins );
	}
endif;
add_action( 'tgmpa_register', 'blog_web_recommended_plugins' );
