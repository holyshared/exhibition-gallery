<?php
	if (exhibition_is_ajax()) {
		include (TEMPLATEPATH."/ajax/index.php");
	} else {
		include (TEMPLATEPATH."/static/index.php");
	}
?>
