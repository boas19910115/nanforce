<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Lili Blog
 */

$image = absint(lili_blog_get_options('lili-blog-single-page-featured-image'));
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-wrap">
        <?php if($image == 1 ){ ?>
            <figure class="post-thumb mb-0">
                <?php lili_blog_post_thumbnail(); ?>                
            </figure>
        <?php } ?>


        <div class="post-content">
            <div class="post_title">
                <?php
                    if (is_singular()) :
                        the_title('<h1 class="post-title entry-title">', '</h1>');
                    else :
                        the_title('<h2 class="post-title entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                    ?>
                <?php endif; ?>
            </div>
            <!--title-->

            <div class="entry-meta mb-20">
                <?php
                if ('post' === get_post_type()) :
                    ?> 
                    <?php
                        lili_blog_posted_on();
                        lili_blog_posted_by();
                    ?> 
                <?php endif; ?>

                <?php lili_blog_entry_meta(); ?>
            </div>
            <!--entry meta--> 

            <div class="content post-excerpt entry-content clearfix">
                <?php
                the_content(sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'lili-blog'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                
                ));
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'lili-blog'),
                    'after' => '</div>',
                
                ));
                ?>
            </div>
            <!-- .entry-content -->
 
           
        </div>
        <div class="singe_navigation">
           <?php the_post_navigation(); ?>
        </div>   
    </div>
</article><!-- #post-<?php the_ID(); ?> -->