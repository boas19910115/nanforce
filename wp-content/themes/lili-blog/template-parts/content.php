<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lili Blog
 */

$show_content_from = esc_attr(lili_blog_get_options('lili-blog-content-show-from'));
$read_more         = esc_html(lili_blog_get_options('lili-blog-read-more-text'));
$masonry           = esc_attr(lili_blog_get_options('lili-blog-column-blog-page'));
$image_location    = esc_attr(lili_blog_get_options('lili-blog-blog-image-layout'));
$social_share      = absint(lili_blog_get_options('lili-blog-show-hide-share'));
$date              = absint(lili_blog_get_options('lili-blog-show-hide-date'));
$category          = absint(lili_blog_get_options('lili-blog-show-hide-category'));
$author            = absint(lili_blog_get_options('lili-blog-show-hide-author'));
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($masonry); ?>>
    <div class="post-wrap">
        <?php if(has_post_thumbnail()) { ?>
            <div class="thumb-wrap">
                <figure class="post-thumb mb-0 img-animi">
                    <?php lili_blog_post_thumbnail('full'); ?>                
                </figure>
            </div>
        <?php } ?>

        <div class="post-content">
            <div class="post_title">
                <?php
                if (is_singular()) :
                    the_title('<h2 class="post-title entry-title">', '</h2>');
                else :
                    the_title('<h3 class="post-title entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
                    ?>
                <?php endif; ?>
            </div>

            <div class="entry-meta mb-20">
                <?php
                if ('post' === get_post_type()) :
                    ?> 
                    <?php
                        if($date == 1 ){
                            lili_blog_posted_on();
                        }
                        if($author == 1 ){
                            lili_blog_posted_by();
                        }
                    ?>                    
                <?php endif; ?> 

                <?php if($category == 1 ){ ?>
                    <span class="post-cats">
                        <?php lili_blog_entry_meta(); ?>
                    </span>
                <?php } ?>             
            </div>

            <div class="post-excerpt entry-content">
                <?php
                if (is_singular()) {
                    the_content();
                } else {
                    if ($show_content_from == 'excerpt') {
                        the_excerpt();
                    } else {
                        the_content();
                    }
                }
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'lili-blog'),
                    'after' => '</div>',
                ));
                ?>
                
            </div>
            <!-- .entry-content end -->            
            
            <div class="meta-footer">
              <?php  if( 1 == $social_share ){ ?>
                <div class="meta-share">
                    <span><i class="fa fa-share-alt"></i> <?php esc_html_e('SHARE','lili-blog'); ?></span>
                    
                    <?php do_action( 'lili_blog_social_sharing' ,get_the_ID() ); ?>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</article><!-- #post- -->