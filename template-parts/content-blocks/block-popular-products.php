<?php 
	$title = get_sub_field('section_title');
	$image = get_sub_field('section_image');
	$products = get_sub_field('products');

	$wp_query = new WP_Query(array(
		'posts_per_page' 	=> count($products),
		'post_type' 		=> 'product',
		'post__in'			=> $products
	));
?>

<div class="popular-products">
	<div class="container">

		<?php if ($title): ?>
			<h2 class="section-title scroll-trigger fromTop"><span><?php echo $title; ?></span></h2>
		<?php endif; ?>


		<div class="row">
			<div class="col-lg-6">
				<?php if ($image): ?>
					<div class="popular-products__image scroll-trigger fromLeft">
						<?php echo wp_get_attachment_image($image['id'], 'vertical-section-image'); ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-lg-6">
				<ul class="scroll-trigger fromBottom">
					<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
							<?php wc_get_template_part( 'content', 'product' ); ?>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php wp_reset_postdata(); ?>