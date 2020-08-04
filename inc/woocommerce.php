<?php 

function td_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 400,
		'single_image_width'    => 800,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 5,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );
}
add_action( 'after_setup_theme', 'td_add_woocommerce_support' );

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = -1;
  return $cols;
}


// disable wc css
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// Remove Marketing Hub menu item
add_filter( 'woocommerce_marketing_menu_items', '__return_empty_array' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
add_action('woocommerce_before_main_content', 'td_wc_banner');

function td_wc_banner() {
    get_template_part('template-parts/banner/banner', 'page'); 
}

add_filter( 'woocommerce_catalog_orderby', 'bbloomer_remove_sorting_option_woocommerce_shop' );

/* Product sorting */
add_filter( 'woocommerce_get_catalog_ordering_args', 'bbloomer_sort_by_name_woocommerce_shop' );
  
function bbloomer_sort_by_name_woocommerce_shop( $args ) { 
   $orderby_value = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
   if ( 'name-desc' == $orderby_value ) {
      $args['orderby'] = 'title';
      $args['order'] = 'DESC';
   } 
   if ( 'name' == $orderby_value ) {
      $args['orderby'] = 'title';
      $args['order'] = 'ASC';
   } 
   return $args;
}
  
// 2. Add new product sorting option to Sorting dropdown
  
add_filter( 'woocommerce_catalog_orderby', 'bbloomer_load_custom_woocommerce_catalog_sorting' );
  
function bbloomer_load_custom_woocommerce_catalog_sorting( $options ) {
   $options['name'] = 'Nazwa a-z';
   $options['name-desc'] = 'Nazwa z-a';
   return $options;
}

function bbloomer_remove_sorting_option_woocommerce_shop( $options ) {
   unset( $options['popularity'] );   
   unset( $options['rating'] );   
   unset( $options['price'] );   
   unset( $options['price-desc'] );   
   return $options;
}
/* end of product sorting */

// Remove add to cart button / Replace with 'Zapytaj o produkt'
add_filter( 'woocommerce_is_purchasable', '__return_false');

// Remove price 
add_filter( 'woocommerce_get_price_html', function( $price ) {
    return '';
} );

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

remove_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title', 10 );
add_action('woocommerce_shop_loop_item_title', 'abChangeProductsTitle', 10 );
function abChangeProductsTitle() {
    echo '<h3 class="woocommerce-loop-product__title">' . get_the_title() . '</h3>';
}


add_filter('wp_list_categories', 'cat_count_span');
function cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span class="count">', $links);
  $links = str_replace(')', '</span>', $links);
  return $links;
}

// Pagination arrows
add_filter( 'woocommerce_pagination_args',   'rocket_woo_pagination' );
function rocket_woo_pagination( $args ) {

  $args['prev_text'] = '<i class="fa fa-caret-left"></i>';
  $args['next_text'] = '<i class="fa fa-caret-right"></i>';

  return $args;
}

// ***************
// Product
// ***************
// remove short description
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
// add_action('woocommerce_single_product_summary', 'woocommerce_template_single_decors_button', 35);

// function woocommerce_template_single_decors_button() {
//   echo '<div class="product-additional-buttons">';
//   echo '<button type="button" class="btn btn--border grey">Zobacz dekory</button>';
//   echo '</div>';
// }

// Remove link from gallery
function e12_remove_product_image_link( $html, $post_id ) {
    return preg_replace( "!<(a|/a).*?>!", '', $html );
}
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'e12_remove_product_image_link', 10, 2 );


// product tabs
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
    $tabs['description']['title'] = 'Dodatkowe informacje';
    // unset( $tabs['description'] );          // Remove the description tab
    unset( $tabs['reviews'] );          // Remove the reviews tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab

    if (get_field('delivery', 'theme_settings')) {
      $tabs['delivery'] = array(
        'title'   => 'Dostawa',
        'priority'  => 50,
        'callback'  => 'td_delivery_wc_tab'
      );
    }

    return $tabs;
}

function td_delivery_wc_tab() {
  echo get_field('delivery', 'theme_settings');
  return;
}



/* -----------------------------------------
 * Put excerpt meta-box before editor
 * ----------------------------------------- */
function my_add_excerpt_meta_box( $post_type ) {
    if ( in_array( $post_type, array( 'post', 'page' ) ) ) {
         add_meta_box(
            'postexcerpt', __( 'Excerpt' ), 'post_excerpt_meta_box', $post_type, 'test', // change to something other then normal, advanced or side
            'high'
        );
    }
}
add_action( 'add_meta_boxes', 'my_add_excerpt_meta_box' );

function my_run_excerpt_meta_box() {
    # Get the globals:
    global $post, $wp_meta_boxes;

    # Output the "advanced" meta boxes:
    do_meta_boxes( get_current_screen(), 'test', $post );

}

add_action( 'edit_form_after_title', 'my_run_excerpt_meta_box' );

function my_remove_normal_excerpt() { /*this added on my own*/
    remove_meta_box( 'postexcerpt' , 'post' , 'normal' ); 
}
add_action( 'admin_menu' , 'my_remove_normal_excerpt' );


add_filter('subcategory_archive_thumbnail_size', 'td_subcategory_archive_thumbnail_size');

function td_subcategory_archive_thumbnail_size($size) {

    return 'block-image';
}

remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
add_action( 'woocommerce_shop_loop_subcategory_title', 'custom_woocommerce_template_loop_category_title', 10 );
function custom_woocommerce_template_loop_category_title( $category ) {
    ?>
        <h2 class="category-block__title woocommerce-loop-category__title">
            <span><?php
                echo $category->name;
            ?></span>
        </h2>
    <?php
}

function cw_woo_attribute(){
    global $product;
    $attributes = $product->get_attributes();
    if ( ! $attributes ) {
        return;
    }
    $display_result = '<ul class="product-attributes">';
    foreach ( $attributes as $attribute ) {
        if ( $attribute->get_variation() ) {
            continue;
        }
        $name = $attribute->get_name();

        $display_result .= '<li class="product-attributes__item">';

        if ( $attribute->is_taxonomy() ) {
            $terms = wp_get_post_terms( $product->get_id(), $name, 'all' );
            $cwtax = $terms[0]->taxonomy;
            $cw_object_taxonomy = get_taxonomy($cwtax);
            if ( isset ($cw_object_taxonomy->labels->singular_name) ) {
                $tax_label = $cw_object_taxonomy->labels->singular_name;
            } elseif ( isset( $cw_object_taxonomy->label ) ) {
                $tax_label = $cw_object_taxonomy->label;
                if ( 0 === strpos( $tax_label, 'Product ' ) ) {
                    $tax_label = substr( $tax_label, 8 );
                }
            }
            $display_result .= '<strong class="product-attributes__label">' . $tax_label . ': </strong>';
            $tax_terms = array();
            foreach ( $terms as $term ) {
                $single_term = esc_html( $term->name );
                array_push( $tax_terms, $single_term );
            }
            $display_result .= '<span class="product-attributes__value">' . implode(', ', $tax_terms) .  '</span>';
        } else {
            $display_result .= '<strong class="product-attributes__label">' . $name . ': </strong>';
            $display_result .= '<span class="product-attributes__value">' . esc_html( implode( ', ', $attribute->get_options() ) ) . '</span>';
        }

        $display_result .= '</li>';
    }

    $display_result .= "</ul>";

    echo $display_result;
}
add_action('woocommerce_single_product_summary', 'cw_woo_attribute', 25);


