<?php

function be_gutenberg_scripts() {

	wp_enqueue_script(
		'be-editor', 
		get_template_directory_uri() . '/assets/admin-editor.js', 
		array( 'wp-blocks', 'wp-dom' )
	);
}
add_action( 'enqueue_block_editor_assets', 'be_gutenberg_scripts' );