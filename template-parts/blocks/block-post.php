<?php 
	$url = get_the_permalink();
?>
<div class="post-block">
	<?php echo get_the_category_list(); ?>
	<a href="<?php echo $url; ?>" class="post-block__image">
		<?php if(has_post_thumbnail()):?>
			<figure class="post-block__image-wrapper">
				<?php the_post_thumbnail('article'); ?>
			</figure>
		<?php else:?>
			<figure class="post-block__image-wrapper">
				<?php echo '<img src="' . get_template_directory_uri() . '/assets/images/placeholder3x2.png" alt=""/>'; ?>
			</figure>
		<?php endif ;?>
	</a>
	
	<div class="post-block__info">
		<h3 class="post-block__title"><a href="<?php echo $url; ?>"><?php the_title(); ?></a></h3>
	</div>
	<div class="post-block__excerpt">
		<?php the_excerpt(); ?>
	</div>
	<span class="post-block__date"><?php echo get_the_date(); ?></span>
</div>