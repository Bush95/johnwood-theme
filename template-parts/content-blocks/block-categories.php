<?php
	$title = get_sub_field('section_title');
	$terms = get_sub_field('terms');
?>

<?php if (count($terms) >= 5): ?>
	<div class="block-categories">
		<div class="container">

			<?php if ($title): ?>
				<h2 class="section-title scroll-trigger fromTop"><span><?php echo $title; ?></span></h2>
			<?php endif; ?>

			<div class="scroll-trigger fade row">
				<div class="col-md-12 col-lg-8">
					<?php
						$thumb_id = get_term_meta( $terms[0]->term_id, 'thumbnail_id', true );
					?>
					<a href="<?php echo get_term_link($terms[0]); ?>" class="category-block category-block--wide">
						<figure class="category-block__image">
							<?php echo wp_get_attachment_image( $thumb_id, 'large' ); ?>
						</figure>
						<div class="category-block__content">
							<h3 class="category-block__title"><?php echo $terms[0]->name; ?></h3>
							<i class="fa fa-long-arrow-alt-right"></i>
						</div>
					</a>
				</div>
				<?php for ($i = 1; $i < 5; $i++): ?>
					<div class="col-md-6 col-lg-4">
						<?php
							$thumb_id = get_term_meta( $terms[$i]->term_id, 'thumbnail_id', true );
						?>
						<a href="<?php echo get_term_link($terms[$i]); ?>" class="category-block">
							<figure class="category-block__image">
								<?php echo wp_get_attachment_image( $thumb_id, 'large' ); ?>
							</figure>
							<div class="category-block__content">
								<h3 class="category-block__title"><?php echo $terms[$i]->name; ?></h3>
								<i class="fa fa-long-arrow-alt-right"></i>
							</div>
						</a>
					</div>
				<?php endfor; ?>
			</div>
		</div>
	</div>
<?php endif; ?>