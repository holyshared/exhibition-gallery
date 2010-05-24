<?php
	define("EX_HEADER_PREFIX", "HTTP_");
	define("EX_HEADER_X_REQUESTED_WITH", "X_REQUESTED_WITH");

	function exhibition_randompost() {
		global $wpdb, $tableposts, $post;

		$query = "SELECT count(ID) as c
			FROM $tableposts
			WHERE post_status = %s AND ID <> %d";

		$query = $wpdb->prepare($query, "publish", $post->ID);
		$wpdb->query($query);
		$count = $wpdb->get_results();
		$count = array_shift($count);
		$count = rand(0, $count->c);

		$query = "SELECT ID, post_title
			FROM $tableposts
			WHERE post_status = %s
			LIMIT %d, 1";
		
		$query = $wpdb->prepare($query, "publish", $count);
		$wpdb->query($query);
		$post = $wpdb->get_results();
		return array_pop($post);
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
		return ($header == "XMLHttpRequest") ? true : false;
	}

	function exhibition_categories_ids() {
		$cats[] = array();
		$categories = get_the_category();
		foreach ($categories as $key => $category) {
			$cats[] = $category->term_id;
		}
		return $cats;
	}

	
	
?>