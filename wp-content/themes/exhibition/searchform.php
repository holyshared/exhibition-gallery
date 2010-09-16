<!--<div class="mod searchForm">
	<div class="inner">
		<div class="hd"><h3>Search: </h3></div>
		<div class="bd">
		</div>
	</div>
</div>
  -->

<form method="get" action="<?php bloginfo('home'); ?>">
	<fieldset>
		<input type="text" name="s" id="s" size="19" />&nbsp;<input type="submit" value="<?php esc_attr_e('Search'); ?>" />
	</fieldset>
</form>
