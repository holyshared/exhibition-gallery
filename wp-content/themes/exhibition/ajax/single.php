<?php require_once(TEMPLATEPATH.'/options/exhibition.define.php'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="container">
	<div class="photography">
		<?php
			$title = the_title('', '', false);
			echo yapb_get_thumbnail(
				'<p class=\'photo\'><a rel=\'bookmark\' title=\''.$title.'\' href=\''.get_permalink().'\'>',
				array('alt' => $title, 'title' => $title),
				'</a></p>',
				array(
					'w='.get_option(EXHIBITION_PREVIEWER_WIDTH),
					'h='.get_option(EXHIBITION_PREVIEWER_HEIGHT),
					'q='.get_option(EXHIBITION_PREVIEWER_QUALITY)
				)
			);
		?>
		<div class="about">
			<h3><?php the_title(); ?></h3>
			<?php the_content('<p>' . __('Read the rest of this entry &raquo;', 'exhibition') . '</p>'); ?>
		</div>
	</div>
	<div class="information">
		<h3><img src="<?php bloginfo('template_directory'); ?>/images/img_exif.png" alt="Exif" /></h3>
		<?php
			$exif = yapb_get_exif();
			if (count($exif) >= 1) {
				foreach ($exif as $key => $value) {
		?>
			<dl>
				<dt><?php echo $key ?>:</dt>
				<dd><?php echo $value ?></dd>
			</dl>
		<?php
			}
		}
		?>
		<h3><img src="<?php bloginfo('template_directory'); ?>/images/img_tags.png" alt="Tags" /></h3>
		<?php the_tags('<ul class="tags"><li>','</li><li>','</li></ul>'); ?>
	</div>

</div>
<ul class="actions">
	<li class="view"><a title="<?php the_title(); ?>" href="<?php echo get_permalink(); ?>"><?php _e("Details in the photograph are seen", "exhibition"); ?></a></li>
	<li class="comment"><?php comments_popup_link( __( 'Leave a comment', 'exhibition' ), __( '1 Comment', 'exhibition' ), __( '% Comments', 'exhibition' ) ); ?></li>
</ul>

<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.', 'exhibition'); ?></p>
<?php endif; ?>
