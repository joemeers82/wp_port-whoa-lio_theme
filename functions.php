<?php
/**
 * Port Whoa Lio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Port_Whoa_Lio
 */

if( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}
//Initialize Admin Section Classes From Inc
if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}

if ( ! function_exists( 'port_whoa_lio_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function port_whoa_lio_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Port Whoa Lio, use a find and replace
		 * to change 'port-whoa-lio' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'port-whoa-lio', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'footer_menu'  => esc_html__('Footer Menu'),
			'primary' => esc_html__( 'Primary'),
			
		) );


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'port_whoa_lio_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'port_whoa_lio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function port_whoa_lio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'port_whoa_lio_content_width', 640 );
}
add_action( 'after_setup_theme', 'port_whoa_lio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function port_whoa_lio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'port-whoa-lio' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'port-whoa-lio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'port_whoa_lio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function port_whoa_lio_scripts() {
	wp_enqueue_style( 'port-whoa-lio-style', get_stylesheet_uri() );

	wp_enqueue_script( 'port-whoa-lio-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'port-whoa-lio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'port_whoa_lio_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/***************************************************
 * CUSTOM FUNCTIONS FOR THEME
***************************************************/
function load_admin_scripts($hook) {
	if( 'toplevel_page_home_page_settings' != $hook ){
   		return;
   	}
   	wp_register_script('admin', get_template_directory_uri() .'/assets/js/admin.js', array('jquery'),'1.0.0',true);
   	wp_localize_script( 'admin', 'admin_ajax', array('ajaxURL' => admin_url( 'admin-ajax.php' ))); //Localizing AJAX 
   	wp_enqueue_script('admin');

    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'load_admin_scripts' );

// function add_home_page_settings() {
// 	add_menu_page('Home Page Settings','Home Page Settings','manage_options','home_page_settings','home_page_settings','dashicons-admin-home',110);

// 	add_action('admin_init', 'home_page_custom_settings');
// }

// add_action('admin_menu', 'add_home_page_settings');

// function home_page_custom_settings() {
// 	register_setting('home-page-settings-group','headline');

// 	register_setting('home-page-settings-group','tagline');

// 	register_setting('home-page-settings-group','tagline-image');

// 	add_settings_section('home-page-content-options','Home Screen Content','home_page_options','home_page_settings');


	
// 	add_settings_field('home_content_headline','Headline','home_page_headline','home_page_settings','home-page-content-options');

// 	add_settings_field('home_content_tagline','Tagline','home_page_tagline','home_page_settings','home-page-content-options');;
// }

// function image_uploader( $name, $width, $height ) {

//     // Set variables
//     $options = get_option( 'RssFeedIcon_settings' );
//     $default_image = plugins_url('img/no-image.png', __FILE__);

//     if ( !empty( $options[$name] ) ) {
//         $image_attributes = wp_get_attachment_image_src( $options[$name], array( $width, $height ) );
//         $src = $image_attributes[0];
//         $value = $options[$name];
//     } else {
//         $src = $default_image;
//         $value = '';
//     }

//     $text = __( 'Upload', RSSFI_TEXT );

//     // Print HTML field
//     echo '
//         <div class="upload">
//             <img data-src="' . $default_image . '" src="' . $src . '" width="' . $width . 'px" height="' . $height . 'px" />
//             <div>
//                 <input type="hidden" name="RssFeedIcon_settings[' . $name . ']" id="RssFeedIcon_settings[' . $name . ']" value="' . $value . '" />
//                 <button type="submit" class="upload_image_button button">' . $text . '</button>
//                 <button type="submit" class="remove_image_button button">&times;</button>
//             </div>
//         </div>
//     ';
// }

// function home_page_headline() {
// 	$headlineText = wpautop( stripslashes(get_option('headline') ) );
// 	$content      = $headlineText;
// 	$editor_id    ='headline_editor';
// 	$settings = array(
//     	'textarea_rows' => 4,
//     	'media_buttons' =>false,
//     	'textarea_name' => 'headline'
// 	);
// 	wp_editor($content,$editor_id,$settings);
// };

// function home_page_tagline() {
// 	$taglineText  = wpautop( stripslashes(get_option('tagline') ) );
// 	$taglineImage = esc_attr( get_option('tagline-image') );
// 	$content      = $taglineText;
// 	$editor_id    ='tagline_editor';
// 	$settings = array(
//     	'textarea_rows' => 4,
//     	'media_buttons' =>false,
//     	'textarea_name' => 'tagline'
// 	);
// 	echo '<div class="tagline-image"><img src="'.$taglineImage.'"/></div>';
// 	echo '<input type="button" value="Upload Image for Tagline section" id="upload-button"> <input type="hidden" id="tagline-image" name="tagline-image" value="'.$taglineImage.'" />';
// 	wp_editor($content,$editor_id,$settings);
// };

// function home_page_settings() {
// 	if ( !current_user_can( 'manage_options' ) )  {
// 		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
// 	}
// 	require_once(get_template_directory().'/template-parts/home-page-settings.php');
// };



//Adding statc Contact link in footer menu
function my_nav_wrap() {
  // default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
  
  // open the <ul>, set 'menu_class' and 'menu_id' values
  $wrap  = '<ul id="%1$s" class="%2$s">';
  
  // get nav items as configured in /wp-admin/
  $wrap .= '%3$s';
  
  // the static link 
  $wrap .= '<li class="my-static-link"><a data-toggle="modal" data-target="#myModal" href="#">Contact</a></li>';
  
  // close the <ul>
  $wrap .= '</ul>';
  // return the result
  return $wrap;
}


function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  } 
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}






