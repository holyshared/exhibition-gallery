<?php
/*
Template Name: about
*/
?>
<?php get_header(); ?>

<div class="container">

<?php wp_reset_query(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="container">

<div class="contents">

	<div class="mod about">
		<div class="inner">
			<div class="hd">
				<h2><?php the_title(); ?></h2>
			</div>
			<div class="bd">
				<?php the_content('<p class="serif"><strong>'.__("Read the whole story...", "grain").'</strong></p>'); ?>
			</div>
		</div>
	</div>

</div>

<div class="sidebar">
		<div class="vcard">
			<p class="me"><img class="photo" src="<?php bloginfo('template_directory'); ?>/images/noritaka_horio.jpg" /></p>
			<h3><a class="fn n" href=""><span class="first-name">Noritaka</span>&nbsp;<span class="last-name">Horio</span></a></h3>
			<dl>
				<dt>nickname:</dt>
				<dd class="nickname">horry</dd>
				<dt>organization:</dt>
				<dd><a class="org" title="concrete5 japan" href="http://concrete5-japan.org/">concrete5 japan</a></dd>
				<dt>title:</dt>
				<dd class="title">member</dd>
				<dt>email:</dt>
				<dd><a class="email" href="mailto:holy.shared.design@gmail.com">holy.shared.design@gmail.com</a></dd>
				<dt>url:</dt>
				<dd><a class="url" href="http://sharedhat.com">http://sharedhat.com</a></dd>
			</dl>
		</div>
</div>

</div>

<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>