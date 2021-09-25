<?php

/**
 * Displays the navigational sidebar for use on Course single pages.
 *
 * @since 0.1.0
 * @param int $id
 * @return void
 */
function fan_get_course_sidebar( $id ) {
	$units = get_field ( 'course_units', $id );

	ob_start();
	?>
		<ul class="list-group">
			<li class="list-group-item active"><h3>UNITS</h3></li>
			<?php foreach( $units as $unit ): ?>
				<li class="list-group-item bg-faded"></li>
			<? endforeach; ?>
		</ul>
	<?php
	echo ob_get_clean();
}

/**
 * Displays the navigational sidebar for use on Unit single pages
 *
 * @since 0.1.0
 * @param int $id
 * @return void
 */
function fan_get_unit_sidebar( $id ) {
	$chapters = get_field ( 'unit_chapters', $id );

	ob_start();
	?>
		<ul class="list-group">
			<li class="list-group-item active"><h3>CHAPTERS</h3></li>
			<?php foreach( $chapters as $unit ): ?>
				<li class="list-group-item bg-faded"></li>
			<? endforeach; ?>
		</ul>
	<?php
	echo ob_get_clean();
}

function fan_get_chapter_sidebar( $id ) {
	$sections = get_field( $id );

}
