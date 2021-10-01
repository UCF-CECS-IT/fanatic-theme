<?php

function fan_register_chapter_post_type() {
	$singular = 'Chapter';
	$plural = 'Chapters';
	$taxonomies = array(
		// 'post_tag',
		'category',
		'difficulty',
	);
	$icon = 'dashicons-list-view';

	$labels = array(
		'name'                  => _x( $plural, 'Post Type General Name', 'fanatic-theme' ),
		'singular_name'         => _x( $singular, 'Post Type Singular Name', 'fanatic-theme' ),
		'menu_name'             => __( $plural, 'fanatic-theme' ),
		'name_admin_bar'        => __( $singular, 'fanatic-theme' ),
		'archives'              => __( $plural . ' Archives', 'fanatic-theme' ),
		'parent_item_colon'     => __( 'Parent ' . $singular . ':', 'fanatic-theme' ),
		'all_items'             => __( 'All ' . $plural, 'fanatic-theme' ),
		'add_new_item'          => __( 'Add New ' . $singular, 'fanatic-theme' ),
		'add_new'               => __( 'Add New', 'fanatic-theme' ),
		'new_item'              => __( 'New ' . $singular, 'fanatic-theme' ),
		'edit_item'             => __( 'Edit ' . $singular, 'fanatic-theme' ),
		'update_item'           => __( 'Update ' . $singular, 'fanatic-theme' ),
		'view_item'             => __( 'View ' . $singular, 'fanatic-theme' ),
		'search_items'          => __( 'Search ' . $plural, 'fanatic-theme' ),
		'not_found'             => __( 'Not found', 'fanatic-theme' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'fanatic-theme' ),
		'featured_image'        => __( 'Featured Image', 'fanatic-theme' ),
		'set_featured_image'    => __( 'Set featured image', 'fanatic-theme' ),
		'remove_featured_image' => __( 'Remove featured image', 'fanatic-theme' ),
		'use_featured_image'    => __( 'Use as featured image', 'fanatic-theme' ),
		'insert_into_item'      => __( 'Insert into ' . $singular, 'fanatic-theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this ' . $singular, 'fanatic-theme' ),
		'items_list'            => __( $plural . ' list', 'fanatic-theme' ),
		'items_list_navigation' => __( $plural . ' list navigation', 'fanatic-theme' ),
		'filter_items_list'     => __( 'Filter ' . $plural . ' list', 'fanatic-theme' ),
	);

	$args = array(
		'label'                 => __( $plural, 'fanatic-theme' ),
		'description'           => __( $plural, 'fanatic-theme' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
		'taxonomies'            => $taxonomies,
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 8,
		'menu_icon'             => $icon,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);

	register_post_type( 'chapter', $args );
}

add_action( 'init', 'fan_register_chapter_post_type', 0 );
