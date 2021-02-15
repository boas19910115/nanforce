<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
  <?php  } ?>
		<div class="row"> 
			<div id="primary" class="col-md-8 content-area">
				<main>
					<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
					?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer();
