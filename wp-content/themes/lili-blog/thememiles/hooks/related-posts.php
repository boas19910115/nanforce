<?php
/**
 * Display related posts from same category
 *
 * @since Lili Blog 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if (!function_exists('lili_blog_related_post')) :
    
    function lili_blog_related_post($post_id)
    {
        
       
        $title = esc_html(lili_blog_get_options('lili-blog-single-page-related-posts-title'));
        if (0 == lili_blog_get_options('lili-blog-single-page-related-posts')) {
            return;
        }
        $categories = get_the_category($post_id);
        if ($categories) {
            $category_ids = array();
            $category = get_category($category_ids);
            $categories = get_the_category($post_id);
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
            $count = $category->category_count;
            if ($count > 1) {
                ?>   
                <section class="rel-post">
                    <h2 class="sec-title">
                        <?php echo $title; ?>
                    </h2> 

                    <div class="row">
                        <?php
                        $lili_blog_cat_post_args = array(
                            'category__in' => $category_ids,
                            'post__not_in' => array($post_id),
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => true
                        );
                        $lili_blog_featured_query = new WP_Query($lili_blog_cat_post_args);
                        
                        while ($lili_blog_featured_query->have_posts()) : $lili_blog_featured_query->the_post();
                            ?>
                            <div class="col-md-4">
                                <div class="post-wrap">
                                    <?php
                                    if (has_post_thumbnail() ):
                                        ?>
                                        <div class="thumb-wrap">
                                            <figure class="post-thumb img-animi mb-20">
                                                <a href="<?php the_permalink() ?>">
                                                    <?php the_post_thumbnail('lili-blog-related-post-thumbnails'); ?>
                                                </a>
                                            </figure>
                                        </div>
                                        <?php
                                    endif;
                                    ?>
                                    <div class="post-content">
                                        <h5 class="post-title entry-title">
                                            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                        </h5>
                                        <div class="entry-meta"> 
                                            <?php echo get_the_date(); ?> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div> 
                </section> 
                <?php
            }
        }
    }
endif;
add_action('lili_blog_related_posts', 'lili_blog_related_post', 10, 1);