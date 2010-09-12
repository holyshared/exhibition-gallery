<?php

define('EX_HEADER_PREFIX', 'HTTP_');
define('EX_HEADER_X_REQUESTED_WITH', 'X_REQUESTED_WITH');

function exhibition_oldpost() {
	global $wpdb;

	$table = $wpdb->posts;
	$query = 'SELECT min(post_date) as old_date
		FROM '.$table.'
		WHERE post_status = %s';

	$query = $wpdb->prepare($query, 'publish');
	$results = $wpdb->get_results($query, ARRAY_A);
	$results = array_shift($results);

	return $results["old_date"];
}

function exhibition_is_ajax() {
	$header = "";
	if (!empty($_SERVER[EX_HEADER_PREFIX.EX_HEADER_X_REQUESTED_WITH])) {
		$header = $_SERVER[EX_HEADER_PREFIX.EX_HEADER_X_REQUESTED_WITH];
	} else if (function_exists('apache_request_headers')) {
		$headers = apache_request_headers();
        if (!empty($headers[EX_HEADER_X_REQUESTED_WITH])) {
        	$header = $headers[EX_HEADER_X_REQUESTED_WITH];
		}
	}
	return ($header == 'XMLHttpRequest') ? true : false;
}

function exhibition_categories_ids() {
	$catList = array();
	$categories = get_the_category();
	foreach ($categories as $key => $category) {
		$catList[] = $category->term_id;
	}
	return $catList;
}

function exhibition_widgets_init() {

	register_sidebar(array(
		'id'			=> 'widget-primary',
		'name'			=> __('Widget Primary', 'exhibition'),
		'description'	=> __('Widget Primary', 'exhibition'),
		'before_widget'	=> '<div class="mod aside %1$s %2$s"><div class="inner">',
		'after_widget'	=> '</div></div></div>',
		'before_title'	=> '<div class="hd"><h3>',
		'after_title'	=> '</h3></div><div class="bd">',
	));

	register_sidebar(array(
		'id'			=> 'widget-pages',
		'name'			=> __('Widget Pages', 'exhibition'),
		'description'	=> __('Widget Pages', 'exhibition'),
		'before_widget'	=> '<div class="mod aside %1$s %2$s"><div class="inner">',
		'after_widget'	=> '</div></div></div>',
		'before_title'	=> '<div class="hd"><h3>',
		'after_title'	=> '</h3></div><div class="bd">',
	));
	
}
add_action('widgets_init', 'exhibition_widgets_init');

require_once(TEMPLATEPATH.'/options/exhibition.define.php');
require_once(TEMPLATEPATH.'/options/exhibition.php');

?>