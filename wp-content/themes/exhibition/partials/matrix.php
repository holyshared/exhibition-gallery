<ul class="matrix">
	<?php while (have_posts()) : the_post(); ?>
		<?php if (yapb_is_photoblog_post()): ?>
			<?php
				$title = the_title('', '', false);
				$shortTitle = substr($title, 0, 15)."...";
				echo yapb_get_thumbnail(
					'<li class=\'preview\'><a rel=\'bookmark\' title=\''.$title.'\' href=\''.get_permalink().'\'>',
					array('alt' => $title, 'title' => $title),
					'</a><strong title=\''.$title.'\'>'.$shortTitle.'</strong></li>',
					array(
						'w='.get_option(EX_THUMBNAIL_WIDTH),
						'h='.get_option(EX_THUMBNAIL_HEIGHT),
						'q='.get_option(EX_THUMBNAIL_QUALITY)
					)
				);
			?>
		<?php endif ?>
	<?php endwhile; ?>
</ul>