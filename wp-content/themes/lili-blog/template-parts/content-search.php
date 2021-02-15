<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lili Blog
 */

$masonry = esc_attr(lili_blog_get_options('lili-blog-column-blog-page'));
$image_location = esc_attr(lili_blog_get_options('lili-blog-blog-image-layout'));
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($masonry); ?> >
    <div class="post-wrap">
        <?php if(has_post_thumbnail()) { ?>
            <div class="thumb-wrap">
                <figure class="post-thumb img-animi">
                    <?php lili_blog_post_thumbnail(); ?>                
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
                <?php the_excerpt(); ?>
            </div>
            <!-- .entry-content end -->            
            
            <div class="meta-footer">
                <?php if (!empty($read_more) && $show_content_from == 'excerpt'): ?>
                    <div class="more-wrap">
                        <a class="read-more" href="<?php the_permalink(); ?>"><?php echo esc_html($read_more); ?></a>
                    </div>
                <?php endif; ?>
                <!-- read more -->

                <div class="meta-share">
                    <span><i class="fa fa-share-alt"></i> SHARE</span>
                    <?php 
                        if( 1 == $social_share ){
                            do_action( 'lili_blog_social_sharing' ,get_the_ID() );
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</article><!-- #post-->

