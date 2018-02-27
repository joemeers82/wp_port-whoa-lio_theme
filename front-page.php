<?php get_header();?>
<!-- ABOUT SECTION
	================================================== -->
	<?php 
		$tagline = wpautop( stripslashes(get_option('tagline') ) );
		$taglineImage  = esc_attr(get_option('tagline-image') );
	?>
	<section class="container mb-20">
		<div class="bg-grey p-3">
			<div class="row">
				<div class="col-md-7">
					<img src="<?php echo $taglineImage; ?>">
				</div>
				<div class="col-md-5 d-flex justify-content-center align-items-center flex-column">
					<?php echo $tagline; ?>
					<p>
					<button class="read_more btn"><a href="<?php bloginfo('url')?>/about">More About Me</a></button>
				</div>
			</div>
		</div>
	</section> <!-- End of About Section -->

	<!-- BLOG POST SECTION
	================================================== -->
	
	<section class="container">
		<div class="row">
			<?php 
				$args = array (
					'post_type'      => 'post',
					'cat'            => 4,
					'posts_per_page' => 3,
				);
				$the_query = new WP_Query( $args );
				if( $the_query->have_posts() ): while( $the_query->have_posts() ) : $the_query->the_post(); 
			?>
			
			<div class="col-md-4 mb-20">
				<div class="wrapper bg-grey text-center p-3">
					<div class="post-img">
						<?php the_post_thumbnail('thumbnail'); ?>
					</div>
					<p>
					<h4><?php the_title(); ?></h4>
					<p>
						<?php echo excerpt(25); ?>
					</p>
					<button class="read_more btn"><a href="<?php the_permalink(); ?>">Read More</a></button>	
				</div>
			</div>
			<?php endwhile; endif; ?>
			
		</div>
	</section> <!-- End of Blog Post Section -->
	<?php get_footer();?>