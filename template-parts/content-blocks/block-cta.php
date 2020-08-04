<?php 
	$rowId = get_row_index();
	$ctaTitle = get_sub_field('title');
	$ctaText = get_sub_field('text');
	$ctaImage = get_sub_field('image');
	$ctaLink = get_sub_field('link');
?>


<section class="cta" style="background-image:url(<?php echo wp_get_attachment_image_src($ctaImage['ID'], 'testimonials-bg')[0]; ?>)">

	<div class="container">
		<div class="cta__inner scroll-trigger">
			<?php if ($ctaTitle): ?>
				<h2 class="cta__title"><?php echo $ctaTitle;?></h2>
			<?php endif; ?>

			<?php if ($ctaText): ?>
				<p class="cta__text">
					<?php echo $ctaText ;?>
				</p>
			<?php endif; ?>
			
			<?php if ($ctaLink): ?>
				<div class="cta__link-wrapper">
					<a class="btn cta__button" href="<?php echo $ctaLink['url'] ;?>"<?php if ($ctaLink['target']) echo ' target="_blank"'; ?>><?php echo $ctaLink['title'];?></a>
				</div>
			<?php endif; ?>
		</div>

	</div>
</section>
