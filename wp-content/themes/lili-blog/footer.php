<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lili Blog
 */

$copyright            = wp_kses_post(lili_blog_get_options('lili-blog-footer-copyright'));
$newsletter_text      = wp_kses_post(lili_blog_get_options('lili-blog-footer-newsletter-title'));
$newsletter_shortcode = wp_kses_post(lili_blog_get_options('lili-blog-footer-newsletter-shortcode'));

if ( is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')  ) {
	$count = 0;
	for ( $i = 1; $i <= 3; $i++ )
	{
		if ( is_active_sidebar( 'footer-' . $i ) )
		{
			$count++;
		}
	}
	

	
    if( $count == 3)
	{
		$footer_col= 3;
	}
	elseif( $count == 2)
	{
		$footer_col= 2;
	}
	elseif( $count == 1)
	{
		$footer_col= 1;
	}
}

?>

</main>
<!-- #main -->

<footer class="site-footer"> 
	<?php
		if(!empty($newsletter_text) || !empty($newsletter_shortcode))
		{

	?>
	<div class="newsletter-wrap">
		<div class="container">
			<div class="newsletter">
				<div class="row">
					<div class="col-md-6">
						<h3>
							<i class="fa fa-paper-plane"></i>
							<?php echo $newsletter_text  ?>
						</h3>
					</div>
					<div class="col-md-6">
						<?php echo do_shortcode($newsletter_shortcode); ?> 
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
	<div class="top-footer">
		<div class="container">
			<div class="row">
				<?php
				for ( $i = 1; $i <= 4 ; $i++ ){
					if ( is_active_sidebar( 'footer-' . $i ) )
					{
						?>
						<div class="col-md-<?php echo $footer_col; ?>">
							<div class="sec-pad">
								<?php dynamic_sidebar( 'footer-' . $i ); ?>
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</div>

	<div class="bottom-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="copyright">
						<?php echo $copyright; ?>
					</div>
				</div>
				<!--left-->
				
				<div class="col-md-6 text-center">	
					<div class="site-info">
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'lili-blog' ) ); ?>">
							<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly powered by %s', 'lili-blog' ), 'WordPress' );
							?>
						</a>
						<span class="sep"> | </span>
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'lili-blog' ), 'Lili Blog', '<a href="https://www.thememiles.com/">ThemeMiles</a>' );
						?>
					</div>
				</div>
				<!--mid-->

				<div class="col-md-3 text-right">
					<?php
					if (has_nav_menu('footer')) {
						wp_nav_menu( array(
							'theme_location' => 'footer',
							'menu_id'        => '',
							'container' => 'ul',
							'menu_class'      => 'footer-menu'
						) );
					} ?>
				</div>
				<!--right-->
			</div>
		</div>
	</div>

  <a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e('Go to Top', 'lili-blog'); ?>">
            <i class="fa fa-angle-double-up"></i>
  </a>
</footer>
<!--footer-->

</div><!-- main container -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>