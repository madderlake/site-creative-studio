<?php

	// Register Portfolio Custom Post Type
function portfolio() {

	$labels = array(
		'name'                  => _x( 'Portfolio', 'Post Type General Name', 'cs_' ),
		'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'cs_' ),
		'menu_name'             => __( 'Portfolio', 'cs_' ),
		'name_admin_bar'        => __( 'Portfolio', 'cs_' ),
		'archives'              => __( 'Portfolio Archives', 'cs_' ),
		'attributes'            => __( 'Portfolio Attributes', 'cs_' ),
		'parent_item_colon'     => __( 'Parent Item:', 'cs_' ),
		'all_items'             => __( 'All Items', 'cs_' ),
		'add_new_item'          => __( 'Add New Item', 'cs_' ),
		'add_new'               => __( 'Add Portfolio Item', 'cs_' ),
		'new_item'              => __( 'Portfolio Item', 'cs_' ),
		'edit_item'             => __( 'Edit Portfolio Item', 'cs_' ),
		'update_item'           => __( 'Update Portfolio Item', 'cs_' ),
		'view_item'             => __( 'View Portfolio Item', 'cs_' ),
		'view_items'            => __( 'View Portfolio Item', 'cs_' ),
		'search_items'          => __( 'Search Portfolio', 'cs_' ),
		'not_found'             => __( 'Not found', 'cs_' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'cs_' ),
		'featured_image'        => __( 'Featured Image', 'cs_' ),
		'set_featured_image'    => __( 'Set featured image', 'cs_' ),
		'remove_featured_image' => __( 'Remove featured image', 'cs_' ),
		'use_featured_image'    => __( 'Use as featured image', 'cs_' ),
		'insert_into_item'      => __( 'Insert into Item', 'cs_' ),
		'uploaded_to_this_item' => __( 'Uploaded to this  item', 'cs_' ),
		'items_list'            => __( 'Portfolio Item list', 'cs_' ),
		'items_list_navigation' => __( 'Portfolio Item list navigation', 'cs_' ),
		'filter_items_list'     => __( 'Filter work list', 'cs_' ),
	);
	$args = array(
		'label'                 => __( 'Portfolio', 'cs_' ),
		'description'           => __( 'Creative Studio Portfolio Item', 'cs_' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
		'taxonomies'            => array( 'portfolio-category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 4,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'menu_icon'   => 'dashicons-portfolio',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'portfolio', 0 );

// Register Custom Taxonomy
function register_portfolio_cats() {

	$labels = array(
		'name'                       => _x( 'Portfolio Categories', 'Taxonomy General Name', 'cs_' ),
		'singular_name'              => _x( 'Portfolio Category', 'Taxonomy Singular Name', 'cs_' ),
		'menu_name'                  => __( 'Portfolio Categories', 'cs_' ),
		'all_items'                  => __( 'All Portfolio Categories', 'cs_' ),
		'parent_item'                => __( 'Parent Item', 'cs_' ),
		'parent_item_colon'          => __( 'Parent Item:', 'cs_' ),
		'new_item_name'              => __( 'New Portfolio Category', 'cs_' ),
		'add_new_item'               => __( 'Add Portfolio Category', 'cs_' ),
		'edit_item'                  => __( 'Edit Portfolio Category', 'cs_' ),
		'update_item'                => __( 'Update Portfolio Category', 'cs_' ),
		'view_item'                  => __( 'View Portfolio Category', 'cs_' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'cs_' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'cs_' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'cs_' ),
		'popular_items'              => __( 'Popular Items', 'cs_' ),
		'search_items'               => __( 'Search Items', 'cs_' ),
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
		'show_in_rest'               => true,
	);
	register_taxonomy( 'portfolio-category', array( 'portfolio' ), $args );

}
add_action( 'init', 'register_portfolio_cats', 0 );