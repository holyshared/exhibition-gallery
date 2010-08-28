<?php
	if (exhibition_is_ajax()) {
		include (TEMPLATEPATH."/ajax/category.php");
	} else {
		include (TEMPLATEPATH."/static/category.php");
	}
?>
