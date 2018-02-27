<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Port_Whoa_Lio
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<!-- Bootstrap core CSS -->
	<link href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/bootstrap-grid.min.css" rel="stylesheet">
	<link href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/bootstrap-reboot.min.css" rel="stylesheet">
	
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 
	$headline = wpautop( stripslashes(get_option('headline') ) );
?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'port-whoa-lio' ); ?></a>
	
	<!-- HEADER
	================================================== -->
	<header class="site-header container" role="banner">
		<div class="row main-nav navbar-light">
			
			<!-- NAV LOGO CONTAINER
			================================================== -->
			
			<div class="col-md-8">
				<a href="<?php bloginfo('url');?>">
					<div class="row">
						<div class="col-2 top-logo">
							<img src="<?php bloginfo('stylesheet_directory');?>/assets/img/joe_hex.png" alt="Profile Picture">
						</div>
						<div class="col-9 offset-1 d-flex justify-content-center align-items-center">
							<img src="<?php bloginfo('stylesheet_directory');?>/assets/img/jmj_logo.png" alt="Profile Logo">
						</div>
					</div>
				</a>
			</div>
			

			<!-- NAVBAR
			================================================== -->
			<div class="col-md-4 d-flex justify-content-center align-items-center">
				<nav class="navbar navbar-expand-md">
					<button class="navbar-toggler " data-toggle="collapse" data-target=".navbar-collapse">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="mainNav">
						<?php 


							wp_nav_menu( array(
								'theme_location'    => 'primary',
								'container'         => 'nav',
								// 'container_class'   => 'navbar-collapse collapse',
								'menu_class'        => 'navbar-nav mx-auto navbar-collapse collapse'
							) );

						?>
						
					</div>
				</nav> <!-- End of Navbar -->
			</div>
		</div>
		<div class="col-md-12 text-center nav-about mb-20">
			<?php echo $headline; ?>
		</div>

	
	</header> <!-- End of Header -->

	<div id="content" class="site-content">
