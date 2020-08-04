<?php

$post_ID = get_the_ID(); 

if (is_tax() || is_shop() || is_product()) {
	$post_ID = 'archive_settings';
}

if (have_rows('flexible_content', $post_ID)) {
    while (have_rows('flexible_content', $post_ID)) {
        the_row();

        $rowLayout = get_row_layout();
        if (!empty($rowLayout)) {
            get_template_part('template-parts/content-blocks/' . $rowLayout);
        }
    }
}
?>