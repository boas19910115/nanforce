<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lili Blog
 */
get_header();
?> 
	<section id="content" class="sec-gap">
	    <div class="container">
	    	<?php
	    	if (1 == lili_blog_get_options('lili-blog-extra-breadcrumb')) {
	    	?>
	        <div class="row">
				<div class="col-md-12">
					<div class="breadcrumbs-wrap">
						<?php do_action('lili_blog_breadcrumb_options_hook'); ?> <!-- Breadcrumb hook -->
					</div>
				</div>				
			</div>
			<!--breadcrumb wrap-->
      <?php } ?>
			<div class="row">
				<div id="primary" class="col-md-8 content-area">					
					<?php
						while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'single' );
					?>
							
					<?php 
						/**
						* lili_blog_related_posts hook
						* @since Lili Blog 1.0.0
						*
						* @hooked lili_blog_related_posts -  10
						*/
						do_action( 'lili_blog_related_posts' ,get_the_ID() );
					?>  

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
						comments_template();
						endif;						   
						endwhile; // End of the loop.
					?>	
			        <!-- #primary -->							
				</div>
				
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
<?php  get_footer();

