<?php 
// search query
function searchfilter($query) {
    if ($query->is_search && !is_admin() ) {
        $query->set('posts_per_page', -1);
    }

    return $query;
}

add_filter('pre_get_posts','searchfilter');

function todes_search_template_choser($template) {    
    global $wp_query; 

    if( isset($_GET['s']) && (isset($_GET['post_type']) && $_GET['post_type'] == 'post') ) {
      return locate_template('search-blog.php');
    }

    return $template;   
}
add_filter('template_include', 'todes_search_template_choser'); 