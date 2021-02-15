<?php

if ( ! function_exists( 'lili_blog_load_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function lili_blog_load_widgets() {

        // Highlight Post.
        register_widget( 'Lili_Blog_Featured_Post' );

        // Author Widget.
        register_widget( 'Lili_Blog_Author_Widget' );
		
		// Social Widget.
        register_widget( 'Lili_Blog_Social_Widget' );
    }
endif;
add_action( 'widgets_init', 'lili_blog_load_widgets' );


