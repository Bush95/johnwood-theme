<?php

// Option pages
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Ustawienia strony',
        'menu_title'    => 'Ustawienia strony',
        'menu_slug'     => 'theme_settings',
        'post_id'       => 'theme_settings',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'position'      => 30,
        'icon_url'      => 'dashicons-nametag'
    ));

    acf_add_options_page(array(
        'page_title'    => 'Ustawienia katalogu',
        'menu_title'    => 'Ustawienia katalogu',
        'menu_slug'     => 'archive_settings',
        'post_id'       => 'archive_settings',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'position'      => 31,
        'icon_url'      => 'dashicons-nametag'
    ));
}

function lower_aioseop_priority( $html ) {
    return 'low';
}
add_filter( 'aioseop_post_metabox_priority', 'lower_aioseop_priority' );


// Move Yoast to bottom
function yoasttobottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
