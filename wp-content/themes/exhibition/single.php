<?php
	if (exhibition_is_ajax()) {
		include (TEMPLATEPATH."/ajax/single.php");
	} else {
		include (TEMPLATEPATH."/static/single.php");
	}
?>
