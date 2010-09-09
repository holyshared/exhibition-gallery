<?php get_header(); ?>

	<?php include TEMPLATEPATH.'/partials/matrix.php'; ?>
	<?php include TEMPLATEPATH.'/partials/thumbnails.php'; ?>

	<div id="preview" class="previewer"><p class="spinner"><img src="<?php bloginfo('template_directory'); ?>/images/spinner.gif" /></p></div>

<?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

<?php get_footer(); ?>