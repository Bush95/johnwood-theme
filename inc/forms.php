<?php

/**
 * Remove Ninja Forms' 'Add Form' button from TinyMCE
 */
add_action( 'wp_loaded', function() {
    if( ! class_exists( 'Ninja_Forms' ) ) {
        return;
    }
    $inst = \Ninja_Forms::instance()->add_form_modal;
    remove_filter( 'media_buttons_context', [$inst, 'insert_form_tinymce_buttons'] );
    add_filter( 'media_buttons_context', function() {
        wp_dequeue_script( 'nf-combobox' );
    }, 999 );
    remove_action( 'admin_footer', [$inst, 'output_tinymce_button_js'] );
}, 999);