<?php

function td_registerNav() {
	add_theme_support('menus');
	register_nav_menu('header_menu', 'Header');
	register_nav_menu('footer_menu_upper', 'Footer');
	register_nav_menu('footer_menu', 'Footer - dolny pasek');
}

add_action('init', 'td_registerNav');
