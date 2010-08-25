<?php //previous_post_link('&laquo; %link') ?>
<?php //next_post_link('%link &raquo;') ?>

<?php
	if (exhibition_is_ajax()) {
		include (TEMPLATEPATH."/ajax/single.php");
	} else {
		include (TEMPLATEPATH."/static/single.php");
	}
?>
