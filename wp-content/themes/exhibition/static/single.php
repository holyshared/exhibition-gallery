<?php //previous_post_link('&laquo; %link') ?>
<?php //next_post_link('%link &raquo;') ?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



<div class="container">



<div class="contents">

	<div class="mod about">
		<div class="inner">
			<div class="hd"><h2><?php the_title(); ?></h2></div>
			<div class="bd"><?php the_content('<p>' . __('Read the rest of this entry &raquo;', 'kubrick') . '</p>'); ?></div>
		</div>
	</div>

	<div class="mod photo-frame">
		<div class="inner">
			<div class="photography">
				<?php
					$title = the_title('', '', false);
					echo yapb_get_thumbnail(
						'<p class=\'photo\'><a rel=\'bookmark\' title=\''.$title.'\' href=\''.get_permalink().'\'>',
						array('alt' => $title, 'title' => $title),
						'</a></p>',
						array('w=678', 'q=90')
					);
				?>
			</div>
		</div>
	</div>

	<div class="mod exif">
		<div class="inner">
			<div class="hd"><h3>Exif: </h3><p class="explanation">aaaaaaaaaa</p></div>
			<div class="bd">
				<ul>
				<?php
					$exif = yapb_get_exif();
					if (count($exif) >= 1) {
						foreach ($exif as $key => $value) {
				?>
					<li><strong><?php echo $key ?>: </strong><?php echo $value ?></li>
				<?php
					}
				}
				?>
				</ul>
			</div>
		</div>
	</div>

	<div class="mod tags">
		<div class="inner">
			<div class="hd"><h3>Tags: </h3><p class="explanation">aaaaaaaaaa</p></div>
			<div class="bd"><?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?></div>
		</div>
	</div>

	<?php comments_template(); ?>

</div>

<div class="sidebar">

	<div class="mod categories">
		<div class="inner">
			<div class="hd"><h3>Categories</h3></div>
			<div class="bd">
				<ul>
					<?php wp_list_categories('orderby=name&show_count=1&exclude=10&title_li='); ?>
				</ul>
			</div>
		</div>
	</div>

	<div class="mod monthly">
		<div class="inner">
			<div class="hd"><h3>Monthly Archives</h3></div>
			<div class="bd">
				<ul>
					<?php wp_get_archives('type=monthly&limit=12'); ?>
				</ul>
			</div>
		</div>
	</div>

</div>

</div>

<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.', 'kubrick'); ?></p>
<?php endif; ?>


<?php get_footer(); ?>