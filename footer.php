<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Port_Whoa_Lio
 */

?>

	</div><!-- #content -->

		<!-- FOOTER
	================================================== -->
	<footer class="bg-dark p-3">
		<div class="container">
			<div class="mx-auto text-center social-links">
				<a href="https://www.linkedin.com/in/joe-meers-jankowski-5a9b6521/"  target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/linkedin.png"></a>
				<a href="https://github.com/joemeers82"  target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/github.png"></a>
				<a href="https://plus.google.com/102062549564706585194" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/googleplus.png"></a>
			</div>
			<div>
				<nav class="mx-auto">
					<?php 
						
						wp_nav_menu( array(
							'theme_location'    => 'footer_menu',
							'container'         => 'nav',
							'menu_class'        => 'text-center p-0 mx-auto footer_menu',
							'items_wrap'        => my_nav_wrap()
						) );

						?>
					
				</nav>
			</div>
			<div class="footer-notes text-center">
				<p>&copy; 2018 Joe Meers Jankowski &middot; San Francisco based Web Developer</p>
			</div>
		</div><!-- End of Container -->
	</footer>

	<!-- MODAL
	================================================== -->
	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h2 class="text-center w-100">Say Hi</h2>
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				</div><!-- modal-header -->
				<div class="text-center">
					<?php echo do_shortcode('[contact-form-7 id="91" title="JoeMeers.com Contact Form"]'); ?>
				</div>
				
			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/jquery-3.2.1.slim.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/js/bootstrap.min.js"></script>

<script src="<?php bloginfo('template_directory'); ?>/assets/js/main.js"></script>

<!-- <script type="text/javascript" src="//use.typekit.net/gla7wnd.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script> -->
  
</body>
</html>