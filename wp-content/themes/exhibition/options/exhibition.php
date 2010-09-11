<?php

add_action('admin_menu', 'exhibition_plugin_menu');

function exhibition_plugin_menu() {
	add_options_page('Exhibition Options', 'Exhibition', 'manage_options', 'exhibition', 'exhibition_plugin_options');
}

function exhibition_plugin_options() {

	if (!current_user_can('manage_options')) {
		wp_die(__('You do not have sufficient permissions to access this page.'));
	}

	include TEMPLATEPATH.'/options/exhibition.options.php';

}

?>