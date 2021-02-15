<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lili Blog
 */

$image_option = absint(lili_blog_get_options('lili-blog-single-page-featured-image'));
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-wrap">  
        <figure class="post-thumb img-animi mb-0">
            <?php if ($image_option == 1) { lili_blog_post_thumbnail(); }?>            
        </figure> 

        <div class="post-content">
            <?php the_title('<h1 class="post-title entry-title">', '</h1>'); ?>
            
            <div class="post-excerpt entry-content">
                <?php
                
                the_content();
                
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'lili-blog'),
                    'after' => '</div>',
                ));
                ?>
            </div>
            <!-- .entry-content end --> 

            <div class="meta-footer">
                <?php if (!empty($read_more) && $show_content_from == 'excerpt'): ?>
                    <div class="more-wrap">
                        <a class="read-more" href="<?php the_permalink(); ?>"><?php echo esc_html($read_more); ?></a>
                    </div>
                <?php endif; ?>
                <!-- read more -->

              
            </div>
        </div>
    </div>
</article><!-- #post-->

