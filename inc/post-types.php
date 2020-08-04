<?php
// Accreditations
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Partnerzy',
        'menu_title'    => 'Partnerzy',
        'menu_slug'     => 'accreditations',
        'post_id'       => 'accreditations',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'position'      => 30,
        'icon_url'      => 'dashicons-nametag'
    ));
}

// Disable tags
function td_unregister_tags() {
    unregister_taxonomy_for_object_type( 'post_tag', array('post', 'product') );
}
add_action( 'init', 'td_unregister_tags' );


add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
    if ($post_type !== 'post') return false;
    
    return $current_status;
}
