<?php

/**
 * Returns an array of chapter posts ordered by the chapter_order field.
 *
 * @since 0.2.0
 * @param integer $unitId
 * @return array
 */
function fan_get_ordered_chapters( $unitId ) {

	$chapters = get_field ( 'chapters', $unitId );

	if ( ! is_array( $chapters ) ) {
		$chapters = $chapters ? array( $chapters ) : [];
	}

	usort( $chapters, function( $a, $b) {
		$first = get_field( 'chapter_order', $a->ID );
		$second = get_field( 'chapter_order', $b->ID );
		return $first <=> $second;
	});

	return $chapters;
}

/**
 * Overrides the default admin columns and adds chapter-specific columns
 *
 * @since 0.2.0
 * @param array $columns
 * @return array
 */
function fan_add_chapter_acf_columns ( $columns ) {
	return array (
		'title' => 'Title',
		'unit' => __ ( 'Unit' ),
		'difficulty' => 'Difficulty',
		'date' => 'Date',
	);
}
add_filter ( 'manage_chapter_posts_columns', 'fan_add_chapter_acf_columns' );

/**
 * Outputs the custom column values
 *
 * @since 0.2.0
 * @param string $column
 * @param integer $post_id
 * @return void
 */
function fan_chapter_custom_column ( $column, $post_id ) {
	switch ( $column ) {
		case 'unit':
			$unit = get_field( 'chapter_unit', $post_id );
			$unitId = $unit[0]->ID;
			$link =  site_url() . "/wp-admin/post.php?post=$unitId&action=edit";
			ob_start();
			?>
				<a href="<?php echo $link; ?>"><?php echo $unit[0]->post_title; ?></a>
			<?php
			echo ob_get_clean();
			break;

		case 'difficulty':
			echo fan_get_chapter_difficulty( $post_id );
			break;
	}
}
add_action ( 'manage_chapter_posts_custom_column', 'fan_chapter_custom_column', 10, 2 );

/**
 * Registers the custom columns as sortable
 *
 * @since 0.2.0
 * @param array $columns
 * @return array
 */
function fan_chapter_register_sortable( $columns )
{
	$columns['unit'] = 'unit';
	return $columns;
}
add_filter("manage_edit-chapter_sortable_columns", "fan_chapter_register_sortable");

/**
 * Returns the chapter's difficulty taxonomy value. If the user has selected
 * more than one difficulty, it will return the first
 *
 * @since 0.2.0
 * @param integer $id	-	Chapter post ID
 * @return void
 */
function fan_get_chapter_difficulty( $id ) {
	$diff = get_the_terms( $id, 'difficulty' );

	return ( is_array( $diff ) ) ? $diff[0]->name : '';
}
