<?php
/**
 * The template for Home Screen Settings page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Port Whoa Lio
 */

?>


<form method="post" action="options.php">
	<?php settings_fields('home-page-settings-group'); ?>
	<?php do_settings_sections('home_page_settings'); ?>
	<?php submit_button(); ?>
</form>
	