<?php

function fan_register_difficulty() {
	$singular = 'Difficulty';
	$plural = 'Difficulties';

	$labels = array(
		'name'                       => _x( $plural, 'Taxonomy General Name', 'fanatic-theme' ),
		'singular_name'              => _x( $singular, 'Taxonomy Singular Name', 'fanatic-theme' ),
		'menu_name'                  => __( $plural, 'fanatic-theme' ),
		'all_items'                  => __( 'All ' . $plural, 'fanatic-theme' ),
		'parent_item'                => __( 'Parent ' . $singular, 'fanatic-theme' ),
		'parent_item_colon'          => __( 'Parent :' . $singular, 'fanatic-theme' ),
		'new_item_name'              => __( 'New ' . $singular . ' Name', 'fanatic-theme' ),
		'add_new_item'               => __( 'Add New ' . $singular, 'fanatic-theme' ),
		'edit_item'                  => __( 'Edit ' . $singular, 'fanatic-theme' ),
		'update_item'                => __( 'Update ' . $singular, 'fanatic-theme' ),
		'view_item'                  => __( 'View ' . $singular, 'fanatic-theme' ),
		'separate_items_with_commas' => __( 'Separate ' . strtolower( $plural ) . ' with commas', 'fanatic-theme' ),
		'add_or_remove_items'        => __( 'Add or remove ' . strtolower( $plural ), 'fanatic-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'fanatic-theme' ),
		'popular_items'              => __( 'Popular ' . strtolower( $plural ), 'fanatic-theme' ),
		'search_items'               => __( 'Search ' . $plural, 'fanatic-theme' ),
		'not_found'                  => __( 'Not Found', 'fanatic-theme' ),
		'no_terms'                   => __( 'No items', 'fanatic-theme' ),
		'items_list'                 => __( $plural . ' list', 'fanatic-theme' ),
		'items_list_navigation'      => __( $plural . ' list navigation', 'fanatic-theme' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_in_rest'				 => true,
		'show_tagcloud'              => true,
		'rewrite'                    => array(
			'slug'         => strtolower( $singular ),
			'hierarchical' => true,
			'ep_mask'      => EP_PERMALINK | EP_PAGES
		)
	);

	return $args;
}

register_taxonomy( 'difficulty', array( 'chapter' ), 'fan_register_difficulty' );
