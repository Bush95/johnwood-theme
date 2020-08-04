<?php
	$accreditations = get_field('accreditations', 'accreditations');
?>

<?php if ($accreditations): ?>
	<div class="accreditations">
		<div class="container">
			<div class="accreditations__carousel">
				<?php foreach ($accreditations as $item): ?>
					<?php
						$link = $item['link'];
						$logo = $item['logo'];
					?>
					<div class="accreditations__item">
						<?php if ($link): ?>
							<a href="<?php echo $link; ?>" target="_blank" class="accreditations__item-wrap">
						<?php else: ?>
							<div class="accreditations__item-wrap">
						<?php endif; ?>

							<?php echo wp_get_attachment_image( $logo['id'], 'logo'); ?>

						<?php if ($link): ?>
							</a>
						<?php else: ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif; ?>

