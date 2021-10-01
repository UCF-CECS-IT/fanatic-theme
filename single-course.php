<?php

get_header();
the_post();

?>

<article class="<?php echo $post->post_status; ?> post-list-item">
	<div class="container-full mt-4 mt-sm-5 mb-2 pb-sm-4">
		<div class="row justify-content-center mx-0">
			<!-- defaults to first/top on mobile -->
			<div class="col-xl-8 col-lg-9 col-md-8 push-md-4 push-lg-3 push-xl-3">
				<h5 class="heading-underline text-transform-none mb-2">About
					<br><small class="text-muted">AUTHOR: <?php echo get_field( 'course_author', $post->ID );?></small>
				</h5>

				<img class="float-right w-25 ml-3 mb-3 rounded" src="<?php echo get_field( 'course_thumbnail', $post->ID ); ?>">

				<?php echo get_field( 'course_about', $post->ID ); ?>

				<h5 class="mt-4 heading-underline text-transform-none mb-2">Overview</h5>

				<?php echo get_field( 'course_overview', $post->ID ); ?>

				<?php fan_course_table_of_contents( $post->ID ); ?>
			</div>

			<!-- defaults to bottom on mobile -->
			<div class="col-xl-3 col-lg-3 col-md-4 pull-md-8 pull-lg-9 pull-xl-8">
				<?php fan_get_course_sidebar( $post->ID ); ?>
			</div>
		</div>
	</div>
</article>

<?php get_footer(); ?>
