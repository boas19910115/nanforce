<?php
/**
 * Masonry Start Class and Id functions
 *
 * @since Lili Blog 1.0.0
 *
 */
if (!function_exists('lili_blog_masonry_start')) :
    function lili_blog_masonry_start()
    { ?>
        <div class="masonry-start"><div id="masonry-loop">
        
        <?php
    }
endif;
add_action('lili_blog_masonry_start_hook', 'lili_blog_masonry_start', 10, 1);

/**
 * Masonry end Div
 *
 * @since Lili Blog 1.0.0
 *
 */
if (!function_exists('lili_blog_masonry_end')) :
    function lili_blog_masonry_end()
    { ?>
        </div>
        </div>
        
        <?php
    }
endif;
add_action('lili_blog_masonry_end_hook', 'lili_blog_masonry_end', 10, 1);