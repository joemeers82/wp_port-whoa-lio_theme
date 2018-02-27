<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Port_Whoa_Lio
 */

?>
<?php get_header();?>
<article class="container" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<h1 ><?php the_title(); ?></h1>
	
	

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'port-whoa-lio' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()

			) );

		?>
	</div><!-- .entry-content -->
	<?php comments_template();?> 

	<footer class="entry-footer">
		<?php get_footer(); ?>
	</footer><!-- .entry-footer -->
</article>
