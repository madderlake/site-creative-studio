<?php
// Register Custom Post Type

function slider() {

	$labels = array(
		'name'                  => _x( 'Sliders', 'Post Type General Name', 'sero' ),
		'singular_name'         => _x( 'Slider', 'Post Type Singular Name', 'sero' ),
		'menu_name'             => __( 'Sliders', 'sero' ),
		'name_admin_bar'        => __( 'Sliders', 'sero' ),
		'archives'              => __( 'Slider Archives', 'sero' ),
		'attributes'            => __( 'Slider Attributes', 'sero' ),
		'parent_item_colon'     => __( 'Parent Item:', 'sero' ),
		'all_items'             => __( 'All Sliders', 'sero' ),
		'add_new_item'          => __( 'Add New Slider', 'sero' ),
		'add_new'               => __( 'Add New Slider', 'sero' ),
		'new_item'              => __( 'New Slider', 'sero' ),
		'edit_item'             => __( 'Edit Slider', 'sero' ),
		'update_item'           => __( 'Update Slider', 'sero' ),
		'view_item'             => __( 'View Slider', 'sero' ),
		'view_items'            => __( 'View Sliders', 'sero' ),
		'search_items'          => __( 'Search Sliders', 'sero' ),
		'not_found'             => __( 'Not found', 'sero' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'sero' ),
		'featured_image'        => __( 'Featured Image', 'sero' ),
		'set_featured_image'    => __( 'Set featured image', 'sero' ),
		'remove_featured_image' => __( 'Remove featured image', 'sero' ),
		'use_featured_image'    => __( 'Use as featured image', 'sero' ),
		'insert_into_item'      => __( 'Insert into item', 'sero' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'sero' ),
		'items_list'            => __( 'Items list', 'sero' ),
		'items_list_navigation' => __( 'Items list navigation', 'sero' ),
		'filter_items_list'     => __( 'Filter items list', 'sero' ),
	);
	$args = array(
		'label'                 => __( 'slider', 'sero' ),
		'description'           => __( 'slider for images and content', 'sero' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'revisions', 'custom-fields', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'slider', $args );

}
add_action( 'init', 'slider', 0 );
?>