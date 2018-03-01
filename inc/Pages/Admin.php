<?php 
/**
 * @package  Port-Whoa-Lio
 */

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;


class Admin 
{
	public $settings;

	public $callbacks;

	public $pages = array();

	public function register() {
		
		$this->settings = new SettingsApi();
		$this->callbacks = new AdminCallbacks();


		$this->setPages();

		$this->setSettings();
        $this->setSections();
		$this->setFields();

		$this->settings->addPages( $this->pages )->register();

	}

	public function setPages() {
		$this->pages = [
	    	[
	    		'page_title' =>'Home Page Settings',
	    		'menu_title' =>'Home Page Settings',
	    		'capability' =>'manage_options',
	    		'menu_slug'  =>'home_page_settings',
	    		'callback'   => array( $this->callbacks,'adminDashboard' ),
	    		'icon_url'   =>'dashicons-admin-home',
	    		'position'   =>110
	    	]
    	];
	}

	public function setSettings() {
		$args = [
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "headline",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "tagline",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
			[
				"option_group" => "home_page_settings_group",
				"option_name"  => "tagline_image",
				"callback"     => array( $this->callbacks,'homePageSettingsGroup')
			],
		];
		$this->settings->setSettings( $args );
	}

	public function setSections() {
		$args = [
			[
				"id"       => "home_page_content_options",
				"title"    => "Home Page Content",
				"callback" => array( $this->callbacks,'homePageAdminOptions' ) ,
				"page"     => "home_page_settings"
			]
		];
		$this->settings->setSections( $args );
	}

	public function setFields() {
		$args = [
			[
				"id"       => "home_page_headline",
				"title"    => "Headline",
				"callback" => array( $this->callbacks,'addHeadline' ),
				"page"     => "home_page_settings",
				"section"  => "home_page_content_options",
				"args"     => "",
			],
			[
				"id"       => "home_page_tagline",
				"title"    => "Home Page Tagline",
				"callback" => array( $this->callbacks,'addTagline' ),
				"page"     => "home_page_settings",
				"section"  => "home_page_content_options",
				"args"     => "",
			],
		];
		$this->settings->setFields( $args );
	}

}