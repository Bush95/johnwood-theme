<?php 
	$title = get_sub_field('section_title');
?>

<div class="testimonials">
	<div class="container">
		<?php if ($title): ?>
			<h2 class="section-title scroll-trigger fromTop"><span><?php echo $title; ?></span></h2>
		<?php endif; ?>
		
		<div class="scroll-trigger fade">
			<div class="testimonials__wrap">
				<div class="testimonials__carousel">
					<?php while (have_rows('testimonials')): the_row(); ?>
						<?php
							$quote 	= get_sub_field('text');
							$sign	= get_sub_field('sign');
							$sign2	= get_sub_field('sign_below')
						?>
						<div class="testimonials__item">
							<blockquote>
								<p class="quote-text">
									<?php echo $quote; ?>
								</p>
								
								<?php if ($sign): ?>
									<footer>
										<cite><?php echo $sign; ?></cite>
										<?php if ($sign2): ?>
											<p><?php echo $sign2; ?></p>
										<?php endif; ?>
									</footer>
								<?php endif; ?>
							</blockquote>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</div>