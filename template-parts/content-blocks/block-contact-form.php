<?php
	$title = get_sub_field('title');
	$text = get_sub_field('text');
?>
<div class="contact-form-block scroll-trigger fromTop">
	<div class="container">
		<?php if ($title || $text): ?>
			<div class="title-section">
				<?php if ($title): ?>
					<h2 class="title-section__title"><?php echo $title; ?></h2>
				<?php endif; ?>
				<?php if ($text): ?>
					<p class="title-section__text"><?php echo $text; ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php echo do_shortcode('[ninja_form id=1]'); ?>
	</div>
</div>