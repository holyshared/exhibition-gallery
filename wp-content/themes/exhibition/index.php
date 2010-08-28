<?php get_header(); ?>
	<?php wp_reset_query(); ?>
	<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
	<?php query_posts('posts_per_page=30&paged='.$paged); ?> 
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
						array('w=128', 'q=90')
					);
				?>
			<?php endif ?>
		<?php endwhile; ?>
	</ul>

	<?php include (TEMPLATEPATH."/partials/thumbnails.pager.php"); ?>

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

	<div id="preview" class="previewer"><img src="<?php bloginfo('template_directory'); ?>/images/img_loading.png" /></div>

<?php get_footer(); ?>