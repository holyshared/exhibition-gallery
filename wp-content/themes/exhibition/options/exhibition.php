<?php

add_action('admin_menu', 'exhibition_plugin_menu');
add_action('switch_theme', 'exhibition_deactivate');
add_action('load-themes.php', 'exhibition_activate');

//Admin Menus
function exhibition_plugin_menu() {
	add_options_page('Exhibition Options', 'Exhibition', 'manage_options', 'exhibition', 'exhibition_plugin_options');
}

function exhibition_plugin_options() {

	if (!current_user_can('manage_options')) {
		wp_die(__('You do not have sufficient permissions to access this page.'));
	}
	include TEMPLATEPATH.'/options/exhibition.options.php';

}


//Theme Activate/Deactivate
function exhibition_deactivate() {

	delete_option(EX_THUMBNAIL_WIDTH);
	delete_option(EX_THUMBNAIL_HEIGHT);
	delete_option(EX_THUMBNAIL_QUALITY);
	delete_option(EX_PREVIEWER_WIDTH);
	delete_option(EX_PREVIEWER_HEIGHT);
	delete_option(EX_PREVIEWER_QUALITY);

}

function exhibition_activate() {

	update_option(EX_THUMBNAIL_WIDTH, EX_DEFAULT_THUMBNAIL_WIDTH);
	update_option(EX_THUMBNAIL_HEIGHT, EX_DEFAULT_THUMBNAIL_HEIGHT);
	update_option(EX_THUMBNAIL_QUALITY, EX_DEFAULT_THUMBNAIL_QUALITY);
	update_option(EX_PREVIEWER_WIDTH, EX_DEFAULT_PREVIEWER_WIDTH);
	update_option(EX_PREVIEWER_HEIGHT, EX_DEFAULT_PREVIEWER_HEIGHT);
	update_option(EX_PREVIEWER_QUALITY, EX_DEFAULT_PREVIEWER_QUALITY);

}

?>