<?php

/**
 * Social Sharing Hook *
 * @since 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
$useragent = $_SERVER['HTTP_USER_AGENT'];
function is_mobile()
{
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
if (!function_exists('lili_blog_social_sharing')) :
    function lili_blog_social_sharing($post_id)
    {
        $lili_blog_url = get_the_permalink($post_id);
        $lili_blog_title = get_the_title($post_id);
        $lili_blog_image = get_the_post_thumbnail_url($post_id);

        //sharing url
        $lili_blog_twitter_sharing_url = esc_url('http://twitter.com/share?text=' . $lili_blog_title . '&url=' . $lili_blog_url);
        $lili_blog_facebook_sharing_url = esc_url('https://www.facebook.com/sharer/sharer.php?u=' . $lili_blog_url);
        $lili_blog_pinterest_sharing_url = esc_url('http://pinterest.com/pin/create/button/?url=' . $lili_blog_url . '&media=' . $lili_blog_image . '&description=' . $lili_blog_title);
        $lili_blog_linkedin_sharing_url = esc_url('http://www.linkedin.com/shareArticle?mini=true&title=' . $lili_blog_title . '&url=' . $lili_blog_url);

        $lili_blog_line_sharing_url = is_mobile() ? esc_url('http://line.me/R/msg/text/?' . $lili_blog_title . '%0D%0A' . $lili_blog_url) : esc_url('https://lineit.line.me/share/ui?url=' . $lili_blog_url);

?>
        <div class="meta_bottom">
            <div class="post-share">
                <a target="_blank" href="<?php echo $lili_blog_facebook_sharing_url; ?>"><i class="fa fa-facebook"></i></a>
                <!-- <a target="_blank" href="<?php echo $lili_blog_twitter_sharing_url; ?>"><i class="fa fa-twitter"></i></a> -->
                <!-- <a target="_blank" href="<?php echo $lili_blog_pinterest_sharing_url; ?>"><i class="fa fa-pinterest"></i></a> -->
                <a target="_blank" href="<?php echo $lili_blog_linkedin_sharing_url; ?>"><i class="fa fa-linkedin"></i></a>
                <a target="_blank" href="<?php echo $lili_blog_line_sharing_url; ?>"><i class="fab fa-line"></i></a>
                <!-- 				<?php echo is_mobile() ? "is mobile" : "is not mobile"; ?> -->
            </div>
        </div>
<?php
    }
endif;
add_action('lili_blog_social_sharing', 'lili_blog_social_sharing', 10);
