<?php 
/**
 * Lili Blog Slider Function
 * @since Lili Blog 1.0.0
 *
 * @param null
 * @return void
 *
 */

$slide_id = absint(lili_blog_get_options('lili-blog-select-category'));
$read_more = esc_html(lili_blog_get_options('lili-blog-slider-readmore-text'));
        $slick_args = array(
            'slidesToShow'      => 1,
            'slidesToScroll'    => 1,
            'dots'              => false,
            'arrows'            => false,
        );
      $args = array(
			'posts_per_page' => 3,
			'paged' => 1,
			'cat' => $slide_id,
			'post_type' => 'post'
		);

   
		$slider_query = new WP_Query($args);
		if ($slider_query->have_posts()): ?>
      <div class="sec-gap">
        <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="banner-slider"'>
              <?php while ($slider_query->have_posts()) : $slider_query->the_post(); 
                if(has_post_thumbnail()){
                $image_id = get_post_thumbnail_id();
                $image_url = wp_get_attachment_image_src($image_id, 'full', true); 
              ?>

              <div class="slider-items">
                <div class="content-wrap"> 
                    <figure style="background-image: url(<?php echo esc_url($image_url[0]);?>)">
                        <div class="fig-content">  
                            <div class="mb-10">  
                                <div class="entry-meta">
                                  <?php lili_blog_posted_on(); ?>

                                  <?php
                                     $categories = get_the_category();
                                     if ( ! empty( $categories ) ) {
                                        echo '<a class="meta-cat" href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'">'.esc_html( $categories[0]->name ).'</a>';
                                    }                                 
                                  ?>
                                </div>
                            </div>

                            <h2 class="entry-post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            
                            <div class="post-excerpt entry-content mb-0"> 
                                <a class="more-btn" href="<?php the_permalink(); ?>"><?php echo $read_more; ?></a>
                            </div>
                      </div> 
                    </figure> 
                </div>
              </div>
              <?php } endwhile;
              wp_reset_postdata(); ?>
          </div>
          </div>
        </div>    
        </div>
      </div>
<?php endif; ?>