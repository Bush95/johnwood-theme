<?php
	$bannerTitle = get_the_title();
	$bannerImage = get_field('banner_image');
	$textColor	 = get_field('text_color');


	if (is_product_category() || is_category()) {
		$object = get_queried_object();
		$bannerImage = get_field('banner_image', $object);
		$textColor	 = get_field('text_color', $object);
		$bannerTitle = single_cat_title('', false);

		if (!$bannerImage) {
			$bannerImage = get_field('banner_image', wc_get_page_id( 'shop' ));
		}
	} elseif (is_shop()) {
		$page = wc_get_page_id( 'shop' );
		$bannerTitle = get_the_title($page);
		$bannerImage = get_field('banner_image', $page);
		$textColor	 = get_field('text_color', $page);
	} elseif (is_home() || (is_search() && (isset($_GET['post_type']) && $_GET['post_type'] == 'post') )) {
		$page = get_option('page_for_posts');
		$bannerTitle = get_the_title($page);
		$bannerImage = get_field('banner_image', $page);
		$textColor	 = get_field('text_color', $page);
	} else {
		$bannerTitle = get_the_title();
		$bannerImage = get_field('banner_image');
		$textColor	 = get_field('text_color');
	}
?>

<?php if ($bannerImage): ?>
	<div class="banner banner--page" data-slidecolor="<?php echo $textColor; ?>">
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
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
<?php endif; ?>