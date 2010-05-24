<?php
	function exhibition_randompost() {
		global $wpdb, $tableposts, $post;

		$query = "SELECT count(ID) as c
			FROM $tableposts
			WHERE post_status = 'publish' AND ID <> ".$post->ID;
		$cnt   = $wpdb->get_results($query);
		$cnt   = rand(0, $cnt[0]->c);

		$query = "SELECT ID, post_title
			FROM $tableposts
			WHERE post_status = 'publish'
			LIMIT $cnt, 1";

		$post = $wpdb->get_results($query);
		return array_pop($post);
	}
?>