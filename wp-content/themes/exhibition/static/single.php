<?php //previous_post_link('&laquo; %link') ?>
<?php //next_post_link('%link &raquo;') ?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php $cat = get_the_category(); $cat = array_pop($cat); ?>


<div class="container">



<div class="contents">

	<div class="mod about">
		<div class="inner">
			<div class="hd">
				<h2><?php the_title(); ?></h2>
				<ul class="meta">
					<li class="cat"><strong>Category: </strong><a title="<?php echo $cat->cat_name ?>の記事を見る" href="<?php echo get_category_link( $cat->cat_ID ); ?>" class="internal"><?php echo $cat->cat_name ?></a></li>
					<li class="date"><strong>Date: </strong><?php the_time(__('F jS, Y', 'kubrick')) ?></li>
					<li class="tags"><strong>Tags: </strong><?php the_tags(__('', 'kubrick') . ' ', ', ', '<br />'); ?></li>
				</ul>
			</div>
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
						array('w=618', 'q=90')
					);
				?>
			</div>
		</div>
	</div>

	<div class="mod exif">
		<div class="inner">
			<div class="hd"><h3>Exif: </h3><p class="explanation">Meta data recorded in photograph</p></div>
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
			<div class="hd"><h3>Tags: </h3><p class="explanation">Tag list in photograph</p></div>
			<div class="bd"><?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?></div>
		</div>
	</div>

	<?php comments_template(); ?>

</div>

<div class="sidebar">
	<?php dynamic_sidebar("primary-widget-area"); ?>
</div>

</div>

<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.', 'kubrick'); ?></p>
<?php endif; ?>


<?php get_footer(); ?>