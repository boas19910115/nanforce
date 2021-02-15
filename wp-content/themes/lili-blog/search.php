<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Lili Blog
 */

get_header();
?>
 
<section id="content" class="sec-gap">
    <div class="container">
    	<div class="breadcrumbs-wrap">
			<div class="row">
				<div class="col-md-6"> 
					<h2 class="archive-title no-style"><?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for : %s', 'lili-blog' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h2>
				</div>
				<!-- archive heading -->	

			</div>
		</div> 
		<!--breadcrumb wrap-->

		<div class="row">
			<div id="primary" class="col-md-8 content-area">				
				<?php if ( have_posts() ) : ?>
				<?php
					/* Masonry Start Section */
					do_action('lili_blog_masonry_start_hook'); 

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */

						get_template_part( 'template-parts/content', 'search' );
					endwhile;

					/* Masonry end Section */
					do_action('lili_blog_masonry_end_hook');						
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif;
				?>				
			</div>
			<!-- #primary -->

			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
 
<?php get_footer();

