<?php
/**
 * Displays the Table of Contents tables on the single-course pages
 *
 * @since 0.1.0
 * @param int $id
 * @return void
 */
function fan_course_table_of_contents( $id ) {
	$units = fan_get_ordered_units( $id );

	ob_start();
	?>

	<table class="table table-of-contents">
		<?php foreach( $units as $unit ):
			$chapters = fan_get_ordered_chapters( $unit->ID );
			?>
			<tbody>
				<tr class="bg-primary-lighter">
					<th>
						<i class="far fa-list-alt mr-2"></i> <a href="<?php echo get_permalink( $unit->ID ); ?>"><?php echo $unit->post_title; ?></a>
					</th>
				</tr>
					<?php foreach( $chapters as $chapter ): ?>
						<tr>
							<td class="pl-4">
								<i class="fas fa-list-ul mr-2"></i> <a href="<?php echo get_permalink( $chapter->ID ); ?>"><?php echo $chapter->post_title; ?></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tr>
			</tbody>
		<?php endforeach; ?>
	</table>

	<?php
	echo ob_get_clean();
}

/**
 * Adds a custom units column for Courses
 *
 * @since 0.2.0
 * @param array $columns
 * @return array
 */
function fan_add_course_acf_columns ( $columns ) {
	return array (
		'title' => 'Title',
		'course_units' => __ ( 'Units' ),
		'date' => 'Date',
	);
}
add_filter ( 'manage_course_posts_columns', 'fan_add_course_acf_columns' );

/**
 * Outputs the value for the course units array as a set of edit links
 *
 * @since 0.2.0
 * @param string $column
 * @param integer $post_id
 * @return void
 */
function fan_course_custom_column ( $column, $post_id ) {
	switch ( $column ) {
	  case 'course_units':
		$units = fan_get_ordered_units( $post_id );
		ob_start();
		?>
			<?php foreach( $units as $unit): ?>
				<a href="<?php echo site_url() . "/wp-admin/post.php?post={$unit->id}&action=edit"; ?>"><?php echo $unit->post_title; ?></a>,
			<?php endforeach; ?>
		<?php
		echo ob_get_clean();
		break;
	}
}
add_action ( 'manage_course_posts_custom_column', 'fan_course_custom_column', 10, 2 );

/**
 * Registers the custom unit column as sortable for the admin menu
 *
 * @since 0.2.0
 * @param array $columns
 * @return array
 */
function fan_course_register_sortable( $columns )
{
	$columns['course_units'] = 'course_units';
	return $columns;
}
add_filter("manage_edit-course_sortable_columns", "fan_course_register_sortable");
