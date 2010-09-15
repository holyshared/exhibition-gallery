<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="container">

<div class="contents">

	<div class="mod about">
		<div class="inner">
			<div class="hd">
				<h2><?php the_title(); ?></h2>
			</div>
			<div class="bd"><?php the_content('<p>' . __('Read the rest of this entry &raquo;', 'exhibition') . '</p>'); ?></div>
		</div>
	</div>

	<?php include TEMPLATEPATH."/partials/back_and_forth.php"; ?>
</div>

<div class="sidebar">
	<?php dynamic_sidebar("widget-page"); ?>
</div>

</div>

<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.', 'exhibition'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>