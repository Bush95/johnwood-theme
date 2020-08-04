<?php
/**
 * Sidebar
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/sidebar.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_sidebar( 'shop' );

?>
	<aside class="wc-sidebar">
		<?php get_product_search_form(); ?>
		<ul class="resetlist category-list">
			<?php wp_list_categories( 
				array(
					'taxonomy'  => 'product_cat', 
					'title_li'  => '<h2>Kategorie</h2>',
					'depth'		=> 1,
					'show_count' => 1,
					'show_option_all' => 'Katalog'
				) ); 
			?>
		</ul>

		<?php // Popular products ?>
		<?php 
			$query_args = array(
				'posts_per_page' => 3, 
				'post_type'	=> 'product',
				'meta_key' => 'wpb_post_views_count', 
				'orderby' => 'meta_value_num', 
				'order' => 'DESC' 
			);
			$popular_posts = new WP_Query( $query_args ); 
		?>
		
		<h2 class="sidebar-title">Popularne produkty</h2>
		<ul class="resetlist">
			<?php while ($popular_posts->have_posts()): $popular_posts->the_post(); ?>
				<li>
					<div class="product-block product-block--sidebar">
						<a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
							<div class="product-block__image">
								<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
							</div>
							<h3 class="woocommerce-loop-product__title"><?php the_title(); ?></h3>
						</a>
					</div>
				</li>
			<?php endwhile; ?>
		</ul>
	    <?php wp_reset_query(); ?>

	</aside>
<?php
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
