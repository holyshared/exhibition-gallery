<div class="thumbnails">
	<ul>
		<?php while (have_posts()) : the_post(); ?>
			<?php if (yapb_is_photoblog_post()): ?>
				<?php
					$title = the_title('', '', false);
					echo yapb_get_thumbnail(
						'<li class=\'preview\'><a rel=\'bookmark\' title=\''.$title.'\' href=\''.get_permalink().'\'>',
						array('alt' => $title, 'title' => $title),
						'</a></li>',
						array('w=60', 'q=90')
					);
				?>
			<?php endif ?>
		<?php endwhile; ?>
	</ul>
</div>