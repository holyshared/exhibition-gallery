<?php //previous_post_link('&laquo; %link') ?>
<?php //next_post_link('%link &raquo;') ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="container">
	<div class="photography">
		<div class="about">
			<h3><?php the_title(); ?></h3>
			<?php the_content('<p>' . __('Read the rest of this entry &raquo;', 'kubrick') . '</p>'); ?>
		</div>
		<?php
			$title = the_title('', '', false);
			echo yapb_get_thumbnail(
				'<p class=\'photo\'><a rel=\'bookmark\' title=\''.$title.'\' href=\''.get_permalink().'\'>',
				array('alt' => $title, 'title' => $title),
				'</a></p>',
				array('w=500', 'q=90')
			);
		?>
	</div>
	<div class="information">
		<div class="exif">
			<h3><img src="<?php bloginfo('template_directory'); ?>/images/img_exif.png" /></h3>
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
		</div>
		<div class="tags">
			<h3><img src="<?php bloginfo('template_directory'); ?>/images/img_tags.png" /></h3>
			<?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
		</div>
	</div>
</div>

<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.', 'kubrick'); ?></p>
<?php endif; ?>
