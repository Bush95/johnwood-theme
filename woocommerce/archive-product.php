<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
?>

<div class="container">

		
	<?php
		/**
		 * Hook: woocommerce_archive_description.
		 *
		 * @hooked woocommerce_taxonomy_archive_description - 10
		 * @hooked woocommerce_product_archive_description - 10
		 */
		do_action( 'woocommerce_archive_description' );
	?>

	<?php if ( woocommerce_product_loop() ) { ?>


		<?php /* Custom loops for subcategory products display */ ?>
		<?php if (woocommerce_get_loop_display_mode() == 'both'): ?>
			<?php
				$currentTerm = get_queried_object();
				$categories = get_term_children( $currentTerm->term_id, $currentTerm->taxonomy );
			?>
			<ul class="loop-both">
				<?php foreach ($categories as $category): ?>
					<li>
						<div><strong class="loop-both__cat-title"><?php echo get_term( $category )->name;; ?></strong></div>

						<ul class="loop-both__products products columns-4">
							<?php
								$query_args = array(
								    'post_type'             => 'product',
								    'post_status'           => 'publish',
								    'ignore_sticky_posts'   => 1,
									'posts_per_page' => -1,
									'tax_query' => array(
										array(
											'taxonomy' => 'product_cat',
											'field' => 'term_id',
											'terms' => $category,
											'operator'      => 'IN' 
										)
									)
								);

								$products = new WP_Query( $query_args ); 
							?>

							<?php while ($products->have_posts()): $products->the_post(); ?>
								<?php wc_get_template_part( 'content', 'product' ); ?>
							<?php endwhile; ?>

						</ul>
					</li>
				<?php endforeach; ?>
			</ul>

		<?php else: ?>
			<?php 
			/**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked woocommerce_output_all_notices - 10
			 * @hooked woocommerce_result_count - 20
			 * @hooked woocommerce_catalog_ordering - 30
			 */
			?>
			<div class="before-loop-wrapper">
				<?php do_action( 'woocommerce_before_shop_loop' ); ?>
			</div>

			<?php if (get_search_query()): ?>
				<h2 class="search-query-label">Wynik wyszukiwania - "<?php echo get_search_query(); ?>"</h2>
			<?php endif; ?>

			<?php woocommerce_product_loop_start();

			if ( wc_get_loop_prop( 'total' ) ) {
				while ( have_posts() ) {
					the_post();

					/**
					 * Hook: woocommerce_shop_loop.
					 */
					do_action( 'woocommerce_shop_loop' );

					wc_get_template_part( 'content', 'product' );
				}
			}

			woocommerce_product_loop_end();

			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php endif; ?>

		<?php
	} else {
		/**
		 * Hook: woocommerce_no_products_found.
		 *
		 * @hooked wc_no_products_found - 10
		 */
		do_action( 'woocommerce_no_products_found' );
	}
	?>


<?php

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action( 'woocommerce_sidebar' );
?>
</div>

<?php 
			/**
			 * Hook: woocommerce_after_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );

?>

<?php echo get_template_part('template-parts/render-content-blocks'); ?>

<?php
get_footer( 'shop' );

