<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Port_Whoa_Lio
 */

get_header(); ?>

	<div id="primary" class="container">
		<div class="row">
	
		<?php
		if ( have_posts() ) : ?>

			

			<?php
			/* Start the Loop */

			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
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
			<?php 
			endwhile;

			// the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div>		
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
