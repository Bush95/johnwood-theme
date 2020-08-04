<?php

add_theme_support( 'post-thumbnails', array( 'product' ) );

// Image Upscale
function binary_thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){
    // upscale
    if ( !$crop ) return null;

    $aspect_ratio = $orig_w / $orig_h;
    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

    $crop_w = round($new_w / $size_ratio);
    $crop_h = round($new_h / $size_ratio);

    $s_x = floor( ($orig_w - $crop_w) / 2 );
    $s_y = floor( ($orig_h - $crop_h) / 2 );

    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}
add_filter( 'image_resize_dimensions', 'binary_thumbnail_upscale', 10, 6 );


/**
 * Smooth Image Loading
 * @param  int $imageID - attachment image ID
 * @param  string $imageSize- image size defined in add_image_size
 * @param  string $alt- image alt
 * @return void
 */
function progressiveImage($imageID, $imageSize = 'thumbnail', $alt = '') {
	if (!$imageID) {
		return;
	}

	$largeImage = wp_get_attachment_image_src($imageID, $imageSize);
	$largeImageSrc = $largeImage[0];
	$ratio = round(($largeImage[2] / $largeImage[1]), 4)*100;

	?>

	<figure class="progressive-image">
		<div class="progressive-image__placeholder" data-large="<?php echo $largeImageSrc; ?>" data-alt="<?php echo $alt; ?>">
			<div class="progressive-image__holder" style="padding-bottom: <?php echo $ratio; ?>%;"></div>
			<noscript>&lt;img src="<?php echo $largeImageSrc; ?>"&gt;</noscript>
		</div>
	</figure>

	<?php
}

add_image_size('article', 600, 400, true);
add_image_size('square', 600, 600, true);
add_image_size('full-hd', 1920, 1050, true);
add_image_size('banner', 1920, 600, true);
add_image_size('block-image', 800, 600, true);
add_image_size('vertical-section-image', 740, 930, true);

?>
