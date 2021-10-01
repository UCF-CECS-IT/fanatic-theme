<?php

$bg = get_field('option_course_header_image', 'option');
$title = get_field('option_course_page_title', 'option');
$subtitle = get_field( 'option_course_page_subtitle', 'option' )

?>

<?php if ($bg) : ?>
	<div class="header-media header-media-default mb-0 d-flex flex-column">
		<div class="header-media-background-wrap">
			<div class="header-media-background media-background-container">
				<picture class="media-background-picture">
					<img class="media-background object-fit-cover" src="<?php echo $bg; ?>" alt="" data-object-fit="cover">
				</picture>
			</div>
		</div>

		<?php
			// Display the site nav
			echo ucfwp_get_nav_markup();

			// Display the inner header contents
		?>
		<div class="header-content">
			<div class="header-content-flexfix">
				<div class="header-content-inner align-self-start pt-4 pt-sm-0 align-self-sm-center">
					<div class="container">
						<div class="d-inline-block bg-primary-t-1">
							<h1 class="header-title"><?php echo $title; ?></h1>
						</div>
						<?php if ($subtitle) : ?>
							<div class="clearfix"></div>
							<div class="d-inline-block bg-inverse">
								<span class="header-subtitle"><?php echo $subtitle; ?></span>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<?php
			// Print a spacer div for headers with background videos (to make
			// control buttons accessible), and for headers showing a standard
			// title/subtitle to push them up a bit
			if ($videos || $header_content_type === 'title_subtitle') :
				?>
			<div class="header-media-controlfix"></div>
		<?php endif; ?>
	</div>

<?php else : ?>

	<?php if ($title) : ?>
		<div class="container">
			<h1 class="h1 d-block mt-3 mt-sm-4 mt-md-5 mb-2 mb-md-3">
				<?php echo $title; ?>
			</h1>

			<?php if ($subtitle) : ?>
				<p class="lead mb-2 mb-md-3">
					<?php echo $subtitle; ?>
				</p>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php endif; ?>
