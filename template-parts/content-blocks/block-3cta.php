<?php 
	$rowId = get_row_index();
?>


<section class="cta3 scroll-trigger">

	<div class="container">
		<div class="d-lg-flex justify-content-between flex-wrap">
			<?php while (have_rows('cta')): the_row(); ?>
				<?php
					$ctaTitle = get_sub_field('title');
					$ctaText = get_sub_field('text');
					$ctaIcon = get_sub_field('icon');
					$ctaLink = get_sub_field('link');
				?>

				<?php if ($ctaLink): ?>
					<a href="<?php echo $ctaLink['url']; ?>" <?php if($ctaLink['target']) echo 'target="_blank"'; ?> class="cta3__item">
				<?php else: ?>
					<div class="cta3__item">
				<?php endif; ?>
						<div class="cta3__item-icon"><?php echo $ctaIcon; ?></div>
						<div class="cta3__item-content">
							<strong class="cta3__item-title"><?php echo $ctaTitle; ?></strong>
							<p class="cta3__item-text"><?php echo $ctaText; ?></p>
						</div>
				<?php if ($ctaLink): ?>
					</a>
				<?php else: ?>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
	</div>
</section>
