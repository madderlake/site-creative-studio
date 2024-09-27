<?php

	// Register Discipline Custom Post Type
function register_discipline() {

	$labels = array(
		'name'                  => _x( 'Discipline', 'Post Type General Name', 'cs_' ),
		'singular_name'         => _x( 'Discipline', 'Post Type Singular Name', 'cs_' ),
		'menu_name'             => __( 'Disciplines', 'cs_' ),
		'name_admin_bar'        => __( 'Discipline', 'cs_' ),
		'archives'              => __( 'Discipline Archives', 'cs_' ),
		'attributes'            => __( 'Discipline Attributes', 'cs_' ),
		'parent_item_colon'     => __( 'Parent Item:', 'cs_' ),
		'all_items'             => __( 'All Disciplines', 'cs_' ),
		'add_new_item'          => __( 'Add New Discipline', 'cs_' ),
		'add_new'               => __( 'Add Discipline', 'cs_' ),
		'new_item'              => __( 'Discipline', 'cs_' ),
		'edit_item'             => __( 'Edit Discipline', 'cs_' ),
		'update_item'           => __( 'Update Discipline', 'cs_' ),
		'view_item'             => __( 'View Discipline', 'cs_' ),
		'view_items'            => __( 'View Disciplines', 'cs_' ),
		'search_items'          => __( 'Search Discipline', 'cs_' ),
		'not_found'             => __( 'Not found', 'cs_' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'cs_' ),
		'featured_image'        => __( 'Featured Image', 'cs_' ),
		'set_featured_image'    => __( 'Set featured image', 'cs_' ),
		'remove_featured_image' => __( 'Remove featured image', 'cs_' ),
		'use_featured_image'    => __( 'Use as featured image', 'cs_' ),
		'insert_into_item'      => __( 'Insert into Item', 'cs_' ),
		'uploaded_to_this_item' => __( 'Uploaded to this  item', 'cs_' ),
		'items_list'            => __( 'Discipline List', 'cs_' ),
		'items_list_navigation' => __( 'Discipline list navigation', 'cs_' ),
		'filter_items_list'     => __( 'Filter Discipline List', 'cs_' ),
	);
	$args = array(
		'label'                 => __( 'Discipline', 'cs_' ),
		'description'           => __( 'Creative Studio Disciplines', 'cs_' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
		'taxonomies'            => array( 'discipline-category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 4,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'menu_icon'   => 'dashicons-book',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'discipline', $args );

}
add_action( 'init', 'register_discipline', 0 );

// Register Custom Taxonomy
function register_discipline_categories() {

	$labels = array(
		'name'                       => _x( 'Discipline Categories', 'Taxonomy General Name', 'cs_' ),
		'singular_name'              => _x( 'Discipline Category', 'Taxonomy Singular Name', 'cs_' ),
		'menu_name'                  => __( 'Discipline Categories', 'cs_' ),
		'all_items'                  => __( 'All Discipline Categories', 'cs_' ),
		'parent_item'                => __( 'Parent Item', 'cs_' ),
		'parent_item_colon'          => __( 'Parent Item:', 'cs_' ),
		'new_item_name'              => __( 'New Discipline Category', 'cs_' ),
		'add_new_item'               => __( 'Add Discipline Category', 'cs_' ),
		'edit_item'                  => __( 'Edit Discipline Category', 'cs_' ),
		'update_item'                => __( 'Update Discipline Category', 'cs_' ),
		'view_item'                  => __( 'View Discipline Category', 'cs_' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'cs_' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'cs_' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'cs_' ),
		'popular_items'              => __( 'Popular Disciplines', 'cs_' ),
		'search_items'               => __( 'Search Disciplines', 'cs_' ),
		'not_found'                  => __( 'Not Found', 'cs_' ),
		'no_terms'                   => __( 'No Terms', 'cs_' ),
		'items_list'                 => __( 'Items list', 'cs_' ),
		'items_list_navigation'      => __( 'Items list navigation', 'cs_' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'discipline-category', array( 'discipline' ), $args );

}
add_action( 'init', 'register_discipline_categories', 0 );