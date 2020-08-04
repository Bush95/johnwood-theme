<aside class="blog-sidebar">
	
    <form class="search-form" method="get" id="searchform3" action="/">
        <label class="screen-reader-text" for="s3">Szukaj:</label>
        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s3" placeholder="Wyszukaj na blogu..." />
        <input type="hidden" value="post" name="post_type"/>
        <button class="submit-btn"><i class="fa fa-search"></i></button>
    </form>

	<ul class="resetlist category-list">
		<?php wp_list_categories( 
			array(
				'taxonomy'  => 'category', 
				'title_li'  => '<h2>Kategorie</h2>',
				'depth'		=> 1,
				'show_count' => 1,
				'show_option_all' => 'Wszystkie kategorie'
			) ); 
		?>
	</ul>

	<?php // Popular products ?>
	<?php 
		$query_args = array(
			'posts_per_page' => 3, 
			'post_type'	=> 'post',
			'meta_key' => 'wpb_post_views_count', 
			'orderby' => 'meta_value_num', 
			'order' => 'DESC' 
		);
		$popular_posts = new WP_Query( $query_args ); 
	?>
	
	<h2 class="sidebar-title">Popularne posty</h2>
	<ul class="resetlist">
		<?php while ($popular_posts->have_posts()): $popular_posts->the_post(); ?>
			<li>
                <?php get_template_part('template-parts/blocks/block', 'post-alt'); ?>
			</li>
		<?php endwhile; ?>
	</ul>
    <?php wp_reset_query(); ?>
</aside>