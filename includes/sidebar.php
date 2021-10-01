<?php

/**
 * Displays the navigational sidebar for use on Course single pages.
 *
 * @since 0.1.0
 * @param int $id
 * @return void
 */
function fan_get_course_sidebar( $courseId ) {
	$units = fan_get_ordered_units( $courseId );

	ob_start();
	?>
		<ul class="list-group font-size-sm sidebar">
			<li class="list-group-item active"><h5 class="mb-0">UNITS</h5></li>
			<?php foreach( $units as $unit ):
				$chapters = fan_get_ordered_chapters( $unit->ID );

				?>
				<li class="list-group-item bg-faded"><a href="<?php echo get_permalink( $unit->ID );?>"><h6 class="mb-0"><?php echo $unit->post_title; ?></h6></a></li>
				<?php foreach( $chapters as $chapter ): ?>
					<li class="list-group-item"><a href="<?php echo get_permalink( $chapter->ID );?>"><?php echo $chapter->post_title; ?></a></li>
				<?php endforeach; ?>

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

	$course = get_field( 'course', $id )[0];

	$units = fan_get_ordered_units( $course->ID );

	ob_start();
	?>
		<ul class="list-group font-size-sm sidebar">
			<li class="list-group-item active"><h5 class="mb-0">UNITS</h5></li>
			<?php foreach( $units as $unit ):
				$chapters = fan_get_ordered_chapters( $unit->ID );

				?>
				<li class="list-group-item <?php echo ($id == $unit->ID) ? 'bg-primary-lighter' : 'bg-faded'; ?>"><a href="<?php echo get_permalink( $unit->ID );?>"><h6 class="mb-0"><?php echo $unit->post_title; ?></h6></a></li>
				<?php foreach( $chapters as $chapter ): ?>
					<li class="list-group-item <?php echo ($id == $unit->ID) ?'bg-primary-lightest' : ''; ?>"><a href="<?php echo get_permalink( $chapter->ID );?>"><?php echo $chapter->post_title; ?></a></li>
				<?php endforeach; ?>

			<? endforeach; ?>
		</ul>
	<?php
	echo ob_get_clean();
}

/**
 * Outputs the sidebar content for the single-chapter page
 *
 * @since 0.2.0
 * @param integer $id	-	chapter ID
 * @return void
 */
function fan_get_chapter_sidebar( $id ) {
	$parentUnit = get_field( 'chapter_unit', $id )[0];
	$course = get_field( 'course', $parentUnit->ID )[0];
	$units = fan_get_ordered_units( $course->ID );

	ob_start();
	?>
		<ul class="list-group font-size-sm sidebar">
			<li class="list-group-item active"><h5 class="mb-0">UNITS</h5></li>
			<?php foreach( $units as $unit ):
				$chapters = fan_get_ordered_chapters( $unit->ID );

				?>
				<li class="list-group-item <?php echo ($parentUnit->ID == $unit->ID) ? 'bg-primary-lighter' : 'bg-faded'; ?>"><a href="<?php echo get_permalink( $unit->ID );?>"><h6 class="mb-0"><?php echo $unit->post_title; ?></h6></a></li>
				<?php foreach( $chapters as $chapter ): ?>
					<li class="list-group-item <?php echo ($parentUnit->ID == $unit->ID) ?'bg-primary-lightest' : ''; ?> <?php if($chapter->ID == $id) echo 'font-weight-bold font-italic'; ?>"><a href="<?php echo get_permalink( $chapter->ID );?>"><?php echo $chapter->post_title; ?></a></li>
				<?php endforeach; ?>

			<? endforeach; ?>
		</ul>
	<?php
	echo ob_get_clean();
}
