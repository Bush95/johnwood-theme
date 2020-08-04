<?php

require_once( get_parent_theme_file_path( '/inc/navigation.php' ) );
require_once( get_parent_theme_file_path( '/inc/assets.php' ) );
require_once( get_parent_theme_file_path( '/inc/images.php' ) );
require_once( get_parent_theme_file_path( '/inc/theme-settings.php' ) );
require_once( get_parent_theme_file_path( '/inc/post-types.php' ) );
require_once( get_parent_theme_file_path( '/inc/capabilities.php' ) );
require_once( get_parent_theme_file_path( '/inc/forms.php' ) );
require_once( get_parent_theme_file_path( '/inc/embed.php' ) );
require_once( get_parent_theme_file_path( '/inc/api.php' ) );
require_once( get_parent_theme_file_path( '/inc/comments.php' ) );
require_once( get_parent_theme_file_path( '/inc/editor.php' ) );
require_once( get_parent_theme_file_path( '/inc/woocommerce.php' ) );
require_once( get_parent_theme_file_path( '/inc/post-view-count.php' ) );
require_once( get_parent_theme_file_path( '/inc/gutenberg.php' ) );
require_once( get_parent_theme_file_path( '/inc/search.php' ) );

function get_video_url($videoID, $videoType = 'youtube') {
	$link = null;
	
	if ($videoType == 'youtube') {
		$link 		= 'https://www.youtube.com/embed/' . $videoID . '?rel=0&iv_load_policy=3&cc_load_policy=0';
	} elseif ($videoType == 'vimeo') {
		$link = 'https://player.vimeo.com/video/' . $videoID . '?autoplay=1';
	}

	return $link;
}

function removeAllCookies() {
	if (isset($_SERVER['HTTP_COOKIE'])) {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        
        foreach($cookies as $cookie) {
            $parts = explode('=', $cookie);
            $name = trim($parts[0]);
            setcookie($name, '', time()-1000);
            setcookie($name, '', time()-1000, '/');
        }
    }
}

add_theme_support( 'post-thumbnails', array('page','post') );

function custom_excerpt_length( $length ) {
	return 17;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 60 );

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


function get_logo_src() {
	return get_template_directory_uri() . '/assets/images/johnwood-logo-basic.svg';
}

function get_acf_link($link, $class = '', $arrow = false) {
	if (!$link) {
		return;
	}

	$html = '<a href="' . $link['url'] . '" ';

	if ($link['target']) {
		$html .= ' target="_blank"';
	}

	if ($class) {
		$html .= ' class="' . $class . '"';
	}

	$html .= '>';
	$html .= '<span>' . $link['title'] . '</span>';

	if ($arrow) {
		$html .= '<i class="far fa-long-arrow-alt-right"></i>';
	}

	$html .= '</a>';

	return $html;
}

?>
