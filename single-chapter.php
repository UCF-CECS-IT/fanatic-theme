<?php

get_header();
the_post();

?>

<article class="<?php echo $post->post_status; ?> post-list-item">
	<div class="container-full mt-4 mt-sm-5 mb-2 pb-sm-4">
		<div class="row justify-content-center mx-0">
			<!-- defaults to first/top on mobile -->
			<div class="col-xl-8 col-lg-9 col-md-8 push-md-4 push-lg-3 push-xl-3">
				<div class="row">
					<div class="col-lg-6">
						<!-- Overview -->
						<h5 class="heading-underline text-transform-none mb-2"><i class="fas fa-book-open"></i> Overview</h5>

						<div class="mb-4">
							<?php echo get_field( 'chapter_overview', $post->ID ); ?>
						</div>

						<!-- Objectives, MD or below -->
						<div class="card bg-inverse-t-3 mx-3 p-4 hidden-lg-up">
							<h5 class="heading-underline text-transform-none mb-2"><i class="fas fa-tasks"></i> Learning Objectives</h5>

							<div>
								<?php
									if ( have_rows( 'chapter_learning_objectives', $post->ID ) ):
										echo '<ul class="mb-0">';
										while( have_rows( 'chapter_learning_objectives' ) ) : the_row();

											$objective = get_sub_field( 'chapter_objective' );
											echo "<li>{$objective}</li>";

										endwhile;
										echo '</ul>';
									else:
										echo '<p>No objectives entered.</p>';
									endif;
								?>
							</div>
						</div>

						<!-- Table of Contents -->
						<h5 id="contents" class="mt-4 heading-underline text-transform-none mb-2"><i class="fas fa-cubes"></i> Contents</h5>

						<table class="table table-sm table-of-contents">
							<?php
								if( have_rows( 'chapter_sub_sections', $post->ID ) ):

									$i = 1;
									while( have_rows( 'chapter_sub_sections', $post->ID) ) : the_row();

										$subSection = get_sub_field( 'section_title' );
										$border = ($i == 1) ? 'class="border-top-0"' : '';

										echo '<tr><td ' . $border . '><a href="#' . sanitize_title( $subSection ) . '"><i class="far fa-edit"></i> ' . $subSection . '</a></td></tr>';
									endwhile;
									$i++;

								else :
									echo '<tr><td>No sections entered.</td></tr>';
								endif;
							?>
						</table>
					</div>

					<!-- Objectives, LG or above -->
					<div class="col-lg-6 px-0 hidden-md-down">
						<div class="card bg-inverse-t-3 p-4">
							<h5 class="heading-underline text-transform-none mb-2"><i class="fas fa-tasks"></i> Learning Objectives</h5>

							<div>
								<?php
									if ( have_rows( 'chapter_learning_objectives', $post->ID ) ):
										echo '<ul class="mb-0">';
										while( have_rows( 'chapter_learning_objectives' ) ) : the_row();

											$objective = get_sub_field( 'chapter_objective' );
											echo "<li>{$objective}</li>";

										endwhile;
										echo '</ul>';
									else:
										echo '<p>No objectives entered.</p>';
									endif;
								?>
							</div>
						</div>
					</div>
				</div>

				<?php
					if( have_rows( 'chapter_sub_sections', $post->ID ) ):

						$row = 1;
						$rows = get_field( 'chapter_sub_sections', $post->ID );
						while( have_rows('chapter_sub_sections', $post->ID) ) : the_row();

							$title = get_sub_field( 'section_title' );
							$content = get_sub_field( 'section_content' );
							$sectionId = sanitize_title( $title );
							?>
								<div id="<?php echo $sectionId; ?>" class="mb-5">
									<div class="bg-primary-lighter d-flex flex-row justify-content-between align-items-center p-2">
										<h5 class="d-inline-block mb-0"><span class="font-slab-serif"><?php echo $title; ?></span></h5>
										<a class="small text-secondary" href="#content">Back to Top</a>
									</div>

									<div class="pl-3 pt-3">
										<?php echo $content; ?>
									</div>
								</div>
							<?php
							$row++;

						endwhile;

					else :
						echo '<p>No sections entered.</p>';
					endif;
				?>
			</div>

			<!-- defaults to bottom on mobile -->
			<div class="col-xl-3 col-lg-3 col-md-4 pull-md-8 pull-lg-9 pull-xl-8">
				<?php fan_get_chapter_sidebar( $post->ID ); ?>
			</div>
		</div>
	</div>
</article>

<?php get_footer(); ?>
