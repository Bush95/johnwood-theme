<?php
	$bannerTitle = get_the_title();
	$bannerImage = get_field('banner_image');
	$textColor	 = get_field('text_color');
?>

<?php if ($bannerImage): ?>
	<div class="banner banner--post" data-slidecolor="<?php echo $textColor; ?>">
		<div class="banner__carousel">
			<div class="banner__slide">

				<picture class="banner__image">
					<?php echo wp_get_attachment_image( $bannerImage['id'], 'banner', '', array('class' => 'object-fit')); ?>
				</picture>

				<div class="banner__content">
					<div class="container">
						<div class="row align-items-center justify-content-center">

							<div class="col-lg-6 text-center">
								<h1 class="banner__title"><?php echo $bannerTitle; ?></h1>
                				<p class="banner__date"><?php echo get_the_date(); ?></p>
                				<div class="banner__button"><?php echo $categories_list = preg_replace('/<a /', '<a class="btn"', get_the_category_list( ', ' )); ?></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
<?php endif; ?>