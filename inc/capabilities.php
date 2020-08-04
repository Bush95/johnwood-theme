<?php

/* Edit editor capabilities */
function td_edit_editor_options() {
    $role_object = get_role( 'editor' );
    $role_object->remove_cap('manage_options');
    $role_object->add_cap('edit_theme_options');
}
add_action('admin_menu', 'td_edit_editor_options');

// Acf capabilities
function td_acf_settings_capability( $path ) {

    return 'administrator';

}
add_filter('acf/settings/capability', 'td_acf_settings_capability');

// More in Adminimize
