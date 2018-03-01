<?php
/**
 * The template for Home Screen Settings page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Port Whoa Lio
 */

?>
<h2>Home Page Settings</h2>
<?php settings_errors(); ?>
<hr>

<form method="post" action="options.php">
	<?php settings_fields('home_page_settings_group'); ?>
	<?php do_settings_sections('home_page_settings'); ?>
	<?php submit_button(); ?>
</form>
	