<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lili Blog
 */

get_header();
?>
 
<section id="content" class="sec-gap">
	<div class="container">
		<div class="breadcrumbs-wrap">
			<div class="row">
				<div class="col-md-12"> 
					<?php the_archive_title( '<h2 class="archive-title">', '</h2>' );?> 
				</div>
				<!-- archive heading -->	
				<div class="col-md-12">
					<?php the_archive_description( '<div class="archive-description">', '</div>' );?> 
				</div>	
			</div>
		</div>

		<div class="row">
			<div id="primary" class="col-md-8 content-area">
				<main>				
					<?php if ( have_posts() ) : ?>
					<?php
						/* Masonry Start Section */
						do_action('lili_blog_masonry_start_hook'); 

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

						/* Masonry end Section */
						do_action('lili_blog_masonry_end_hook');

						/**
			             * lili_blog_action_navigation hook
			             * @since Lili Blog 1.0.0
			             *
			             * @hooked lili_blog_action_navigation -  10
			             */
						do_action( 'lili_blog_action_navigation');

						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
					?>
				</main>
			</div>
			<!-- #primary -->

			<?php get_sidebar(); ?>
		</div>
	</div>
</section> 

<?php get_footer();
