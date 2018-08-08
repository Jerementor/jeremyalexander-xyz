<?php
/**
 * Uncomplicated functions and definitions
 *
 *
 * @package WordPress
 * @subpackage Uncomplicated
 * @since 2018
 */

/**
 * Enqueue The Styles & Scripts To Use In The Theme
 */
function jwalx_enqueue_styles(){
    wp_enqueue_script('webflow-js', get_template_directory_uri() . '/assets/js/webflow.js', array('jquery'));
    // wp_enqueue_style("sensei-frontend",  get_template_directory_uri() . "/assets/css/frontend.min.css");
    wp_enqueue_style("normalize",  get_template_directory_uri() . "/assets/css/normalize.css");
    wp_enqueue_style("webflow",  get_template_directory_uri() . "/assets/css/webflow.css");
    wp_enqueue_style("jwalx",  get_template_directory_uri() ."/assets/css/jeremy-alexander-xyz.webflow.css");
    wp_enqueue_style("jwalx-style", get_stylesheet_uri());
    
}
add_action("wp_enqueue_scripts", "jwalx_enqueue_styles");


function jwalx_setup(){
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
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );
    /*
    * Make theme available for translation.
    * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyfifteen
    * If you're building a theme based on uncomplicated, use a find and replace
    * to change 'uncomplicated' to the name of your theme in all the template files
    */
    load_theme_textdomain( 'uncomplicated' );
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );    
    
    
    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
    'Main Menu'     => __("Main Menu", "jwalx-login"),
    //'logged-out'    => __("Logged-Out Menu", "uncomp-logout"),
        
    ));
    
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	
	) );
	
	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
}
add_action( 'after_setup_theme', 'jwalx_setup' );

/**
 * Register widget area.
 *
 * @since 2018
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function jwalx_widgets(){

    register_sidebar(array(
     'name'           => __('Categories- Sidebar', 'jwalx'),
     'id'             => 'article-sidebar',
     'description'    => __('Add widgets here to appear in the sidebar', 'uncomp'),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>'
  ));
  

  
}
add_action('widgets_init', 'jwalx_widgets');

/**
 * Remove Widget Titles
 *
 * @since 2018
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
// add_filter('widget_title','jwalx_widget_title'); 
// function jwalx_widget_title($t)
// {

//     return null;
// }

//Add Excerpts To Pages
add_post_type_support( 'page', 'excerpt' );

//Add class to excerpt if needed
// function jwalx_filter_excerpt ($post_excerpt) { 
//   $post_excerpt = '<p class="jer_post_sub">' . $post_excerpt . '</p>';
//   return $post_excerpt;
// }  
// add_filter ('get_the_excerpt','jwalx_filter_excerpt');

/**
 * Hide Admin Bar From Everyone But Admins
 *
 * @since Uncomplicated 2018
 *
 */
if (!current_user_can('manage_options')){
    add_filter('show_admin_bar', '__return_false');
}
