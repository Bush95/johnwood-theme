<?php 

$title = get_sub_field('section_title');
$category = get_sub_field('category');

if (!$title) {
	$title = 'Najnowsze posty';
}

$args = array(
	'post_type' => 'post',
	'posts_per_page' => 3,
	'post-status' => 'publish'
);

if ($category) {
	$args['cat'] = $category;
}

$posts = new WP_Query($args);

?>

<?php if ($posts->have_posts()): ?>
	<div class="recent-news">
		<div class="container">
			<h2 class="section-title scroll-trigger fromTop"><span><?php echo $title; ?></span></h2>

			<div class="row scroll-trigger fade">
				<?php while($posts->have_posts()): $posts->the_post(); ?>
					<div class="col-lg-4">
                        <?php get_template_part('template-parts/blocks/block', 'post'); ?>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
<?php endif; ?>