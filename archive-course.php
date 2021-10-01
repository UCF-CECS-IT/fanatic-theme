<?php

get_header();
global $posts;

usort( $posts, function( $a, $b ) {
	$first = get_field( 'course_order', $a->ID );
	$second = get_field( 'course_order', $b->ID );
	return $first <=> $second;
});

?>

<div class="container mt-4 mb-5 pb-sm-4">
	<?php if ( have_posts() ): ?>

		<div class="row justify-content-center">

			<?php while ( have_posts() ) : the_post(); ?>

				<article class="<?php echo $post->post_status; ?> post-list-item col-xl-3 col-lg-4 col-md-5 d-flex flex-column mb-4">
					<div class="aspect-ratio-box mb-3">
						<img src="<?php echo get_field( 'course_thumbnail', $post->ID ); ?>" class="img-fluid" alt="<?php echo $post->post_title; ?>">
					</div>

					<div class="course-heading-height">
						<h5 class="mb-0"><?php echo $post->post_title; ?></h5>
					</div>

					<div class="font-size-sm"><?php echo get_field( 'course_blurb', $post->ID ); ?></div>

					<div class="mt-4 text-center mt-auto">
						<a class="btn btn-primary rounded" href="<?php echo get_permalink( $post->ID ); ?>">Learn More</a>
					</div>
				</article>

			<?php endwhile; ?>

		</div>

	<?php else: ?>
		<p>No results found.</p>
	<?php endif; ?>

</div>

<?php get_footer(); ?>


