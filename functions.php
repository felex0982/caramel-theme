<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

function caramel_custom_post_type(){

	$labels = array(
		'name' => 'Portfolio',
		'singular_name' => 'Portfolio-Item',
		'add_new' => 'Add Portfolio-Item',
		'all_items' => 'All Items',
		'add_new_item' => 'Add Portfolio-Item',
		'edit_item' => 'Edit Portfolio-Item',
		'new_item' => 'New Portfolio-Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Portfolio',
		'not_found' => 'No Items found',
		'not_found_in_trash' => 'No Items found in Trash',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'excerpt',
			'thumbnail',
		),
		/*'taxonomies' => array(
			'category',
			'post_tag'
		),*/
		'menu_position' => 4,
		'exclude_from_search' => false
	);

	register_post_type('portfolio', $args);
}

add_action('init', 'caramel_custom_post_type');

function caramel_custom_taxanomies(){

   $labels = array(
	   'name' => 'Genres',
	   'singular_name' => 'Genre',
	   'search_items' => 'Search Genre',
	   'all_items' => 'All Genres',
	   'parent_item' => 'Parent Genre',
	   'parent_item_colon' => 'Parent Genre:',
	   'edit_item' => 'Edit Genre',
	   'update_item' => 'Update Genre',
	   'add_new_item' => 'Add New Genre',
	   'new_item_name' => 'New Genre Name',
	   'menu_name' => 'Genre'
   );
   $args = array(
	   'labels' => $labels,
	   'hierarchical' => true,
	   'show_ui' => true,
	   'show_admin_column' => true,
	   'query_var' => true,
	   'rewrite' => array('slug' => 'genre')
   );

   register_taxonomy('genre', array('portfolio'), $args);
}

add_action('init', 'caramel_custom_taxanomies');