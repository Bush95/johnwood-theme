<?php 
	$url = get_the_permalink();
?>
<div class="post-block post-block--page">
	<?php echo get_the_category_list(); ?>
	<a href="<?php echo $url; ?>" class="post-block__image">
		<figure class="post-block__image-wrapper">
			<?php if (get_field('banner__image')): ?>
				<?php echo wp_get_attachment_image(get_field('banner_image')['id'], 'article'); ?>
			<?php else: ?>
				<?php echo '<img src="' . get_template_directory_uri() . '/assets/images/johnwood-placeholder3x2.png" alt=""/>'; ?>
			<?php endif; ?>
		</figure>
	</a>
	
	<div class="post-block__info">
		<h3 class="post-block__title"><a href="<?php echo $url; ?>"><?php the_title(); ?></a></h3>
	</div>
	<div class="post-block__excerpt">
		<?php the_excerpt(); ?>
	</div>
</div>