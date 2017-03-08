<?php
// controls custom post types
function create_new_post($post) {
	$labels = array(
		'name'               => _x( ucfirst($post).'s', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( ucfirst($post), 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( ucfirst($post).'s', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( ucfirst($post), 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New ', ucfirst($post), 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New '. ucfirst($post), 'your-plugin-textdomain' ),
		'new_item'           => __( 'New'. $post, 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit'. $post, 'your-plugin-textdomain' ),
		'view_item'          => __( 'View'. $post, 'your-plugin-textdomain' ),
		'all_items'          => __( 'All '. ucfirst($post).'s', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search'. $post.'s', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent'. $post.'s:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No'. $post.'s found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No'. $post.'s found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => $post ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( $post, $args );
}

function registering(){
	$post_types = array('product','journal','adventure');
	$post_types_length = sizeof($post_types);
	foreach ($post_types as $post){
		create_new_post($post);
	}
}
add_action('init', 'registering');


// makes and defines taxonomies
function create_product_taxonomies($tax) {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( ucfirst($tax).'s', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( ucfirst($tax), 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search '. $tax.'s', 'textdomain' ),
		'all_items'         => __( 'All '. $tax.'s', 'textdomain' ),
		'parent_item'       => __( 'Parent '. $tax, 'textdomain' ),
		'parent_item_colon' => __( 'Parent '. $tax.':', 'textdomain' ),
		'edit_item'         => __( 'Edit '. $tax, 'textdomain' ),
		'update_item'       => __( 'Update '. $tax, 'textdomain' ),
		'add_new_item'      => __( 'Add New '. ucfirst($tax), 'textdomain' ),
		'new_item_name'     => __( 'New '.$tax.' Name', 'textdomain' ),
		'menu_name'         => __( ucfirst($tax), 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => $tax ),
	);
	return $args;
}

function create_product_tax() {
	$tax_array = array("type" => "product", "color" => "product");

	foreach ($tax_array as $tax_key => $tax_val){
		
		$args_product_tax_loop = create_product_taxonomies($tax_key);
		register_taxonomy( $tax_key, array( $tax_val), $args_product_tax_loop );
		};

}
add_action( 'init', 'create_product_tax' );

?>