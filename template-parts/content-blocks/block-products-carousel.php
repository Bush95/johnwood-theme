<?php 
	$title = get_sub_field('section_title');
	$products = get_sub_field('products');

	$wp_query = new WP_Query(array(
		'posts_per_page' 	=> count($products),
		'post_type' 		=> 'product',
		'post__in'			=> $products
	));
?>

<div class="products-carousel">
	<div class="container">

		<?php if ($title): ?>
			<h2 class="section-title scroll-trigger fromTop"><span><?php echo $title; ?></span></h2>
		<?php endif; ?>

		<div class="scroll-trigger fade">
			<ul class="products-carousel__inner">
				<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
					<?php wc_get_template_part( 'content', 'product' ); ?>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>