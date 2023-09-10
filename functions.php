<?php

/**
 * UniVersoMe Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package UniVersoMe_Theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

function wpb_date_today($atts, $content = null)
{
	$date_time = '';
	extract(shortcode_atts(array(
		'format' => ''
	), $atts));

	if ($atts['format'] == '') {
		$date_format = get_option('date_format');
		$date_time .= date_i18n($date_format,  strtotime(current_time($date_format)));
	} else {
		$date_time .= date_i18n($atts['format'],  strtotime(current_time($atts['format'])));
	}
	return $date_time;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function universome_theme_setup()
{
	/*	* ------------------------------ 
		*  LANGUAGES
	 	* ------------------------------
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on UniVersoMe Theme, use a find and replace
		* to change 'universome-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('universome-theme', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/* ------------------------------ 
	 *  POST FORMATS
	 * ------------------------------
	 * @link https://developer.wordpress.org/themes/functionality/post-formats/ 
	 * 1. Aside: 
	 * 2. Gallery:
	 * 3. Quote:
	 * 4. Image:
	 * 5. Audio: An audio file. Could be used for Podcasting.
	 * 6. Video: 
	 */
	add_theme_support('post-formats',  array('aside', 'gallery', 'quote', 'image', 'audio', 'video'));

	/* ------------------------------ 
	 *  IMAGES
	 * ------------------------------
	 */

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		* Resources 
		* @link https://developer.wordpress.org/reference/functions/add_theme_support/ 
		*/
	if (function_exists('add_theme_support')) {
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(450, 450, true); // default Featured Image dimensions (cropped)


		// additional image sizes
		add_image_size('post-standard-thumbnail', 800, 450, array('center', 'center'));
		add_image_size('poster-thumbail', 180, 300, true);
		//set_post_thumbnail_size(150, 250); // 50 pixels wide by 50 pixels tall, resize mode

		// removing unused image size
		remove_image_size('1536x1536');
		remove_image_size('2048x2048');
	}

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary Menu', 'universome-theme'),
			'menu-mobile' => esc_html('Mobile Menu', 'universome-theme,'),
			'menu-footer-1' => esc_html('First Footer Menu', 'universome-theme,'),
			'menu-footer-2' => esc_html('Second Footer Menu', 'universome-theme,'),
			'menu-legal' => esc_html('Legal Menu', 'universome-theme,')
		)
	);
	/* ------------------------------ 
	 *  RESPONSIVE EMBEDS - BLOCK THEMES
	 * ------------------------------
	 */
	add_theme_support('responsive-embeds');

	/* ------------------------------ 
	 * EDITOR STYLES - BLOCK THEMES
	 * ------------------------------
	 */
	add_theme_support('editor-styles');

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'universome_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support to show current date in header
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	if (function_exists('wpb_date_today')) {
		add_shortcode('date-today', 'wpb_date_today');
	}


	/**
	 * ------------------------------ 
	 * CUSTOM LOGO
	 * ------------------------------
	 * 
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array('site-title', 'site-description'),
			'unlink-homepage-logo' => true,
		)
	);
}
add_action('after_setup_theme', 'universome_theme_setup');

/* @link: https://codex.wordpress.org/Theme_Logo */
function universome_the_custom_logo($custom_wrapper = false)
{
	if (function_exists('the_custom_logo')) {
		if ($custom_wrapper) {
			$custom_logo_id = get_theme_mod('custom_logo');
			$custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
			echo '<img src="' . esc_url($custom_logo_url) . '" alt="UniVersoMe">';
		} else {
			the_custom_logo();
		}
	}
}

/* ------------------------------ 
 *  POST FORMATS SUPPORT
 * ------------------------------
 */
/*
function universome_custom_post_formats_setup()
{
	$args = array(
		'supports' => array('title', 'editor', 'author', 'post-formats'),
	);
	register_post_type('podcast', $args);

	// add post-formats to post_type 'page'
	add_post_type_support('page', 'post-formats');
	// add post-formats to post_type 'my_custom_post_type'
	add_post_type_support('podcast', 'post-formats');
}
add_action('init', 'universome_custom_post_formats_setup');
*/

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function universome_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('universome_theme_content_width', 640);
}
add_action('after_setup_theme', 'universome_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function universome_theme_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'universome-theme'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'universome-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Menu Sidebar', 'universome-theme'),
			'id'            => 'sidebar-2',
			'description'   => esc_html__('Sidebar for smartphone navigation', 'universome-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'universome_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function universome_theme_scripts()
{
	wp_enqueue_style('universome-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_style('output', get_template_directory_uri() . '/dist/output.css', array());
	wp_style_add_data('universome-theme-style', 'rtl', 'replace');

	wp_enqueue_script('universome-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'universome_theme_scripts');


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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}
