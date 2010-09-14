<?php get_header(); ?>

<?php if (have_posts()) : ?>

	<?php include TEMPLATEPATH.'/partials/matrix.php'; ?>
	<?php include TEMPLATEPATH.'/partials/thumbnails.php'; ?>

	<div id="preview" class="previewer"><p class="spinner"><img src="<?php bloginfo('template_directory'); ?>/images/spinner.gif" alt="Now Loading" /></p></div>

	<?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

<?php else: ?>

<div class="mod searchResult">
<div class="inner">

<div class="hd"><h2><?php _e("Retrieval result"); ?></h2></div>
<div class="bd">
	<p><?php _e("Sorry. The corresponding photograph was not found."); ?></p>
	<div class="mod searchForm">
		<div class="inner">
			<div class="hd">
				<h3>Search</h3>
			</div>
			<div class="bd">
				<p>The article matched from in the site to the key word is displayed.</p>
				<form method="get" action="<?php bloginfo('home'); ?>">
					<fieldset>
						<input type="text" name="s" id="s" size="80" />&nbsp;<input type="submit" value="<?php esc_attr_e('Search'); ?>" />
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>

</div>
</div>


<?php endif; ?>

<?php get_footer(); ?>