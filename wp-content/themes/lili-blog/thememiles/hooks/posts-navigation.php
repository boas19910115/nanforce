<?php
/**
 * Post Navigation Function
 *
 * @since Lili Blog 1.0.0
 *
 * @param null
 * @return void
 *
 */
if (!function_exists('lili_blog_posts_navigation')) :
    function lili_blog_posts_navigation()
    {
        
        $lili_blog_pagination_option = lili_blog_get_options('lili-blog-pagination-options');
        if ('numeric' == $lili_blog_pagination_option) {
            echo "<div class='pagination'>";
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('<i class="fa fa-angle-left"></i>', 'lili-blog'),
                'next_text' => __('<i class="fa fa-angle-right"></i>', 'lili-blog'),
            ));
            echo "<div>";
        } elseif ('ajax' == $lili_blog_pagination_option) {
            $page_number = get_query_var('paged');
            if ($page_number == 0) {
                $output_page = 2;
            } else {
                $output_page = $page_number + 1;
            }
            echo "<div class='ajax-pagination text-center'><div class='show-more' data-number='$output_page'><i class='fa fa-refresh'></i>" . __('View More', 'lili-blog') . "</div><div id='free-temp-post'></div></div>";
        } else {
            return false;
        }
    }
endif;
add_action('lili_blog_action_navigation', 'lili_blog_posts_navigation', 10);