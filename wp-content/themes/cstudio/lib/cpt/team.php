<?php

// Register Custom Post Type
function team() {

	$labels = array(
		'name'                  => _x( 'Team', 'Post Type General Name', 'cs_' ),
		'singular_name'         => _x( 'Team', 'Post Type Singular Name', 'cs_' ),
		'menu_name'             => __( 'Team', 'cs_' ),
		'name_admin_bar'        => __( 'Team', 'cs_' ),
		'archives'              => __( 'Team Archives', 'cs_' ),
		'attributes'            => __( 'Team Attributes', 'cs_' ),
		'parent_item_colon'     => __( 'Parent :', 'cs_' ),
		'all_items'             => __( 'All Team Members', 'cs_' ),
		'add_new_item'          => __( 'Add New Team Member', 'cs_' ),
		'add_new'               => __( 'Add Team Member', 'cs_' ),
		'new_item'              => __( 'New Team Member ', 'cs_' ),
		'edit_item'             => __( 'Edit Team Member ', 'cs_' ),
		'update_item'           => __( 'Update Team Member', 'cs_' ),
		'view_item'             => __( 'View Team Member', 'cs_' ),
		'view_items'            => __( 'View Team Member', 'cs_' ),
		'search_items'          => __( 'Search Team', 'cs_' ),
		'not_found'             => __( 'Not found', 'cs_' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'cs_' ),
		'featured_image'        => __( 'Featured Image', 'cs_' ),
		'set_featured_image'    => __( 'Set featured image', 'cs_' ),
		'remove_featured_image' => __( 'Remove featured image', 'cs_' ),
		'use_featured_image'    => __( 'Use as featured image', 'cs_' ),
		'insert_into_item'      => __( 'Insert into team', 'cs_' ),
		'uploaded_to_this_item' => __( 'Uploaded to this piece', 'cs_' ),
		'items_list'            => __( 'Team Member list', 'cs_' ),
		'items_list_navigation' => __( 'Team Member list navigation', 'cs_' ),
		'filter_items_list'     => __( 'Filter team list', 'cs_' ),
	);
	$args = array(
		'label'                 => __( 'Team', 'cs_' ),
		'description'           => __( 'Creative Studio Team Member', 'cs_' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest' => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'menu_icon'				=> 'dashicons-groups',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'team', $args );

}
add_action( 'init', 'team', 0 );