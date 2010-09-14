<?php wp_reset_query(); ?>
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
<?php query_posts('posts_per_page=30&paged='.$paged); ?> 

<?php include TEMPLATEPATH.'/partials/matrix.php'; ?>
<?php include TEMPLATEPATH.'/partials/thumbnails.php'; ?>

<div id="preview" class="previewer"><p class="spinner"><img src="<?php bloginfo('template_directory'); ?>/images/spinner.gif" /></p></div>

<?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
