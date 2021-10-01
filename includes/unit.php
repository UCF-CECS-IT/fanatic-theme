<?php

/**
 * Add custom course column to the admin menu for Units
 *
 * @since 0.2.0
 * @param array $columns
 * @return array
 */
function add_unit_acf_columns ( $columns ) {
	return array (
		'title' => 'Title',
		'course' => __ ( 'Course' ),
		'date' => 'Date',
	);
}
add_filter ( 'manage_unit_posts_columns', 'add_unit_acf_columns' );

/**
 * Outputs value for custom course columns
 *
 * @since 0.2.0
 * @param string $column
 * @param integer $post_id
 * @return void
 */
function unit_custom_column ( $column, $post_id ) {
	switch ( $column ) {
		case 'course':
			$courseArray = get_field( 'course', $post_id );
			$link = site_url() . "/wp-admin/post.php?post={$courseArray[0]->ID}&action=edit";
			ob_start();
			?>
				<a href="<?php echo $link; ?>"><?php echo $courseArray[0]->post_title; ?></a>
			<?php
			echo ob_get_clean();
			break;
	}
}
add_action ( 'manage_unit_posts_custom_column', 'unit_custom_column', 10, 2 );

/**
 * Returns an array of units ordered by title for the provided course
 *
 * @since 0.2.0
 * @param integer $courseId
 * @return array
 */
function fan_get_ordered_units( $courseId ) {

	$units = get_field ( 'course_units', $courseId );

	if ( ! is_array( $units ) ) {
		$units = $units ? array( $units ) : [];
	}

	usort( $units, function( $a, $b) {
		$first = $a->post_title;
		$second = $b->post_title;
		return $first <=> $second;
	});

	return $units;
}

/**
 * Register the custom course column as sortable
 *
 * @since 0.2.0
 * @param array $columns
 * @return array
 */
function fan_unit_register_sortable( $columns )
{
	$columns['course'] = 'course';
	return $columns;
}
add_filter("manage_edit-unit_sortable_columns", "fan_unit_register_sortable");

/**
 * Outputs the table of contents for all chapters in the unit, with a
 * difficulty filter
 *
 * @since 0.2.0
 * @param integer $id	-	unit ID
 * @return void
 */
function fan_unit_table_of_contents( $id ) {
	$chapters = fan_get_ordered_chapters( $id );
	$difficulties = get_terms( 'difficulty' );

	ob_start();
	?>
	<h5><span class="font-slab-serif">Filter by difficulty:</span></h5>
	<nav id="difficulty-selector" class="nav nav-pills flex-column flex-sm-row my-3 pl-3">
		<a class="flex-sm-fill text-sm-center nav-link active small" data-target="All" href="#">All</a>
		<?php foreach( $difficulties as $difficulty ): ?>
			<a class="flex-sm-fill text-sm-center nav-link small" data-target="<?php echo $difficulty->name; ?>" href="#"><?php echo $difficulty->name; ?></a>
		<?php endforeach;?>
	</nav>

	<table class="table table-of-contents">
		<tbody>
			<tr class="bg-faded" data-difficulty="Unit">
				<th>
					<i class="far fa-list-alt mr-2"></i> <a href="<?php echo get_permalink( $id ); ?>"><?php echo get_the_title( $id ); ?></a>
				</th>
			</tr>
			<?php foreach( $chapters as $chapter ): ?>
				<tr data-difficulty="<?php echo fan_get_chapter_difficulty( $chapter->ID ); ?>">
					<td class="pl-4" >
						<i class="fas fa-list-ul mr-2"></i> <a href="<?php echo get_permalink( $chapter->ID ); ?>"><?php echo $chapter->post_title; ?></a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tr>
		</tbody>
	</table>

	<?php
	echo ob_get_clean();
}
