<?php
	global $post;

	$slideNumber 	= 0;
	$titleTag 		= 'h1';
	$bannerHasVideo = false;
?>

<div class="banner" data-bannercolor="black">
	<div class="banner__carousel">
		<?php while (have_rows('slides', $post)): the_row(); $slideNumber++; ?>
			<?php
				if ($slideNumber > 1) {
					$titleTag = 'h2';
				}
				
				$title 		= '<' . $titleTag . ' class="banner__title">' . get_sub_field('title') . '</' . $titleTag . '>';
				$text 		= get_sub_field('text');
				$ytVideoID 	= get_sub_field('youtube_id');
				$vmVideoID 	= get_sub_field('vimeo_id');
				$videoType 	= get_sub_field('video_type');
				$videoID 	= $videoType == 'youtube' ? $ytVideoID : $vmVideoID;
				$videoUrl 	= get_video_url($videoID, $videoType);
				$textColor	= get_sub_field('text_color');
				$videoLoop 	= get_sub_field('short_video_loop');
				$imageSize  = 'banner';
				$links 		= get_sub_field('links');

				$hasVideo 	= ($ytVideoID || $vmVideoID);

				if (is_front_page()) {
					$imageSize = 'full-hd';
				}

				if ($hasVideo) {
					$bannerHasVideo = true;
				}
			?>
			<div class="banner__slide" data-slidecolor="<?php echo $textColor; ?>">

				<?php if (!$videoLoop): ?>
					<picture class="banner__image">
						<?php echo wp_get_attachment_image( get_sub_field('image')['id'], $imageSize, '', array('class' => 'object-fit')); ?>
					</picture>
				<?php else: ?>
					<div class="banner__image">
						<video src="<?php echo $videoLoop; ?>" <?php /* poster="<?php echo wp_get_attachment_image_src(get_sub_field('image')['id'], $imageSize)[0]; ?>" */ ?> autoplay loop muted playsinline></video>
					</div>
				<?php endif; ?>

				<div class="banner__content">
					<div class="container">
						<div class="row align-items-center">

							<div class="col-lg-6">
								<?php echo $title; ?>
								<?php if ($text): ?>
									<p class="banner__text"><?php echo $text; ?></p>
								<?php endif; ?>
								<?php if ($links): ?>
									<div class="banner__links">
										<?php foreach ($links as $link): ?>
											<?php
												$buttonLink = $link['link'];
												$buttonStyle = $link['link_style'];
											?>
											<?php echo get_acf_link($buttonLink, 'btn' . ' ' . $buttonStyle); ?>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>

							<?php if ($hasVideo && $videoUrl): ?>
								<div class="col-lg-5 col-xl-4 col-fhd-5 offset-fhd-1">
									<a href="<?php echo $videoUrl; ?>" target="_blank" class="banner__video-btn modal-video-trigger">
										<i class="fas fa-play"></i>
									</a>
								</div>
							<?php endif; ?>

						</div>
					</div>
				</div>

			</div>
		<?php endwhile; ?>
	</div>
</div>

<?php if ($bannerHasVideo): ?>
    <div id="modal-banner-video" class="iziModal"></div>
<?php endif; ?>