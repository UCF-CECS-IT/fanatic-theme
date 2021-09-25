<?php
/**
 * Displays the Table of Contents tables on the single-course pages
 *
 * @since 0.1.0
 * @param int $id
 * @return void
 */
function fan_course_table_of_contents( $id ) {
	$units = get_field( 'course_units', $id );

	ob_start();
	?>


	<?php
	echo ob_get_clean();
}
