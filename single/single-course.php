<?php

get_header();
the_post();

?>

<article class="<?php echo $post->post_status; ?> post-list-item">
	<div class="container-full mt-4 mt-sm-5 mb-2 pb-sm-4">
		<div class="row justify-content-center mx-0">
			<!-- defaults to first/top on mobile -->
			<div class="col-lg-10 col-md-9 push-md-3 push-lg-2">
				<h5 class="heading-underline text-transform-none">About</h5>

				<?php echo get_field( ); ?>
			</div>

			<!-- defaults to bottom on mobile -->
			<div class="col-lg-2 col-md-3 pull-md-9 pull-lg-2">
				<?php fan_get_course_sidebar( $post->ID ); ?>
			</div>
		</div>
	</div>
</article>

<?php get_footer(); ?>
