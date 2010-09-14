<?php
	if (exhibition_is_ajax()) {
		include (TEMPLATEPATH."/ajax/archive.php");
	} else {
		include (TEMPLATEPATH."/static/archive.php");
	}
?>
