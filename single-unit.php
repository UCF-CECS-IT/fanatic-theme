<?php

get_header();
the_post();

?>

<article class="<?php echo $post->post_status; ?> post-list-item">
	<div class="container-full mt-4 mt-sm-5 mb-2 pb-sm-4">
		<div class="row justify-content-center mx-0">
			<!-- defaults to first/top on mobile -->
			<div class="col-xl-8 col-lg-9 col-md-8 push-md-4 push-lg-3 push-xl-3">
				<h5 class="heading-underline text-transform-none mb-2"><i class="fas fa-book-open "></i> Summary</h5>

				<div class="mb-4">
					<?php echo get_field( 'unit_summary', $post->ID ); ?>
				</div>

				<div class="card bg-inverse-t-3 p-4">
					<h5 class="heading-underline text-transform-none mb-2"><i class="fas fa-tasks"></i> Learning Objectives</h5>
					<?php
						if ( have_rows( 'unit_learning_objectives', $post->ID ) ):

							echo '<ul class="mb-0">';
							// Loop through rows.
							while( have_rows('unit_learning_objectives', $post->ID ) ) : the_row();

								// Load sub field value.
								$objective = get_sub_field('unit_objective');
								echo "<li>{$objective}</li>";

							// End loop.
							endwhile;

							echo '</ul>';

						else:
							echo '<p>No objectives have been specified for this unit.</p>';
						endif;
					?>
				</div>

				<h5 class="mt-4 heading-underline text-transform-none mb-3"><i class="fas fa-map-signs"></i> Table of Contents</h5>
				<?php fan_unit_table_of_contents( $post->ID ); ?>
			</div>

			<!-- defaults to bottom on mobile -->
			<div class="col-xl-3 col-lg-3 col-md-4 pull-md-8 pull-lg-9 pull-xl-8">
				<?php fan_get_unit_sidebar( $post->ID ); ?>
			</div>
		</div>
	</div>
</article>

<?php get_footer(); ?>
