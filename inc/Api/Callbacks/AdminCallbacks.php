<?php 
/**
 * @param  Port-Whoa-Lio
 */

namespace Inc\Api\Callbacks;

class AdminCallBacks
{
	public function adminDashBoard() {
     		return require_once( get_template_directory() ."/template-parts/home-page-settings.php" );
   	}

	public function homePageSettingsGroup($input) {
		return $input;
	}

	public function homePageAdminOptions() {

	}

	public function addHeadline() {
		$headlineText = wpautop( stripslashes(get_option('headline') ) );
		$content      = $headlineText;
		$editor_id    ='headline_editor';
		
		$settings = array(
	    	'textarea_rows' => 4,
	    	'media_buttons' =>false,
	    	'textarea_name' => 'headline'
		);
		wp_editor($content,$editor_id,$settings);
	}

	public function addTagline() {
		$taglineText  = wpautop( stripslashes(get_option('tagline') ) );
		$taglineImage = esc_attr( get_option('tagline_image') );
		$content      = $taglineText;
		$editor_id    ='tagline_editor';
		
		$settings = array(
	    	'textarea_rows' => 4,
	    	'media_buttons' =>false,
	    	'textarea_name' => 'tagline'
		);
		echo '<div class="tagline-image"><img src="'.$taglineImage.'"/></div>';
		echo '<input type="button" value="Upload Image for Tagline section" id="upload-button"> 
				<input type="text" id="tagline-image" name="tagline_image" value="'.$taglineImage.'" />';
		wp_editor($content,$editor_id,$settings);
	}
}