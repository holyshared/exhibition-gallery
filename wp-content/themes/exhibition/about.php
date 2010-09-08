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
				<?php the_content('<p class="serif"><strong>'.__("Read the whole story...", "exhibition").'</strong></p>'); ?>
			</div>
		</div>
	</div>

</div>

<div class="sidebar">
		<div class="vcard">
			<p class="me"><?php echo get_avatar(get_the_author_meta("user_email"), $size = '96') ?></p>
			<h3><a class="fn n" href=""><span class="first-name"><?php the_author_meta("first_name"); ?></span>&nbsp;<span class="last-name"><?php the_author_meta("last_name"); ?></span></a></h3>
			<dl>
				<dt>nickname:</dt>
				<dd class="nickname"><?php the_author_meta("nickname"); ?></dd>
				<dt>email:</dt>
				<dd><a class="email" href="mailto:<?php the_author_meta("user_email"); ?>"><?php the_author_meta("user_email"); ?></a></dd>
				<dt>url:</dt>
				<dd><a class="url" href="<?php the_author_meta("user_url"); ?>"><?php the_author_meta("user_url"); ?></a></dd>
				<dt>description:</dt>
				<dd><?php the_author_meta("description"); ?></dd>
			</dl>
		</div>
</div>

</div>

<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>