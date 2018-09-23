<?php

/**
 *
 * Set up child theme
 */
function my_theme_enqueue_styles() {

    $parent_style = 'unite-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

/**
 *  Custom POST for films
 *
 */

add_action( 'init', 'prowp_register_my_post_types' );
	function prowp_register_my_post_types() {
		$labels = array(
			'name' => 'Films',
			'singular_name' => 'Film',
			'add_new' => 'Add New Film',
			'add_new_item' => 'Add New Film',
			'edit_item' => 'Edit Film',
			'new_item' => 'New Film',
			'all_items' => 'All Films',
			'view_item' => 'View Film',
			'search_items' => 'Search Films',
			'not_found' => 'No films found',
			'not_found_in_trash' => 'No films found in Trash',
			'parent_item_colon' => '',
			'menu_name' => 'Films'
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => true,
			// 'taxonomies' => array( 'category' ), //We don't the clutter for now
			'rewrite' => array( 'slug' => 'films' ),
			'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ) //adds all these to meta boxes to your post create and edit screens.
		);

		register_post_type( 'films', $args );
	}


/**
 *
 * Taxonomies
 */
// Genre taxonomy
add_action( 'init', 'prowp_define_film_genre_taxonomy' );
function prowp_define_film_genre_taxonomy() {
	$labels = array(
	'name' => 'Genre',
	'singular_name' => 'Genre',
	'search_items' => 'Search Genres',
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
	'query_var' => true,
	'rewrite' => true
	);
	register_taxonomy( 'genre', 'films', $args );
}

//Country taxonomy
add_action( 'init', 'prowp_define_film_country_taxonomy' );
function prowp_define_film_country_taxonomy() {
	$labels = array(
	'name' => 'Country',
	'singular_name' => 'Country',
	'search_items' => 'Search Countries',
	'all_items' => 'All Countries',
	'parent_item' => 'Parent Country',
	'parent_item_colon' => 'Parent Country:',
	'edit_item' => 'Edit Country',
	'update_item' => 'Update Country',
	'add_new_item' => 'Add New Country',
	'new_item_name' => 'New Country Name',
	'menu_name' => 'Country'
	);
	$args = array(
	'labels' => $labels,
	'hierarchical' => true,
	'query_var' => true,
	'rewrite' => true
	);
	register_taxonomy( 'country', 'films', $args );
}

//Actor taxonomy
add_action( 'init', 'prowp_define_film_actor_taxonomy' );
function prowp_define_film_actor_taxonomy() {
	$labels = array(
	'name' => 'Actor',
	'singular_name' => 'Actor',
	'search_items' => 'Search Actors',
	'all_items' => 'All Actors',
	'parent_item' => 'Parent Actor',
	'parent_item_colon' => 'Parent Actor:',
	'edit_item' => 'Edit Actor',
	'update_item' => 'Update Actor',
	'add_new_item' => 'Add New Actor',
	'new_item_name' => 'New Actor Name',
	'menu_name' => 'Actor'
	);
	$args = array(
	'labels' => $labels,
	'hierarchical' => true,
	'query_var' => true,
	'rewrite' => true
	);
	register_taxonomy( 'actor', 'films', $args );
}

//Year taxonomy
add_action( 'init', 'prowp_define_film_year_taxonomy' );
function prowp_define_film_year_taxonomy() {
	$labels = array(
	'name' => 'Year',
	'singular_name' => 'Year',
	'search_items' => 'Search Years',
	'all_items' => 'All Years',
	'parent_item' => 'Parent Year',
	'parent_item_colon' => 'Parent Year:',
	'edit_item' => 'Edit Year',
	'update_item' => 'Update Year',
	'add_new_item' => 'Add New Year',
	'new_item_name' => 'New Year Name',
	'menu_name' => 'Year'
	);
	$args = array(
	'labels' => $labels,
	'hierarchical' => true,
	'query_var' => true,
	'rewrite' => true
	);
	register_taxonomy( 'year', 'films', $args );
}

/**
 * Hooks
 */ 


/**
 * Shortcodes
 */ 
function register_shortcodes(){
   add_shortcode('recent-films', 'recent_films_function');
}

//Hook our shortcodes to WP initialization
add_action( 'init', 'register_shortcodes');

function recent_films_function($atts, $content = null){
   extract(shortcode_atts(array(
      'posts' => 1,
   ), $atts));

   $return_string = '<h3>'.$content.'</h3>';
   $return_string .= '<ul>';

	query_posts(
		array(
			'orderby' => 'date', 
			'order' => 'DESC' ,
			'showposts' => $posts,
			"post_type" => 'films'
		)
	);

   	if (have_posts()) :
    	while (have_posts()) : the_post();
        	$return_string .= '<li style="list-style: none"><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
      	endwhile;
   	endif;
   	$return_string .= '</ul>';

   wp_reset_query();
   return $return_string;
}

