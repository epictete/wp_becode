<?php
// for posts
add_filter('use_block_editor_for_post', '__return_false', 10);
// for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);

function my_wpadmin_sidebar_menu()
{
    remove_menu_page( 'index.php' );  // 'Dashboard'
    remove_menu_page( 'upload.php' );   // 'Media'
    remove_menu_page( 'edit-comments.php' );
    remove_submenu_page('upload.php','media-new.php'); 
    remove_submenu_page('plugins.php','plugin-install.php'); //plugins
    remove_submenu_page('plugins.php','plugin-editor.php');
}

add_action('admin_menu','my_wpadmin_sidebar_menu', 999);

if( function_exists('acf_add_options_page') )
{	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Navigation Settings',
		'menu_title'	=> 'Navigation',
		'parent_slug'	=> 'theme-general-settings',
	));
}