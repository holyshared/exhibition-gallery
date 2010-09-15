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
				<?php the_content(); ?>
			</div>
		</div>
	</div>

</div>

<div class="sidebar">
	
	<div class="vcard">
		<p class="me"><?php echo get_avatar(get_the_author_meta("user_email"), $size = '96') ?></p>
		<h3><a class="fn n" href="<?php get_the_author_meta("user_url"); ?>"><span class="first-name"><?php the_author_meta("first_name"); ?></span>&nbsp;<span class="last-name"><?php the_author_meta("last_name"); ?></span></a></h3>
		<dl>
			<dt><?php _e("nickname:", "exhibition"); ?></dt>
			<?php
				$nickname = get_the_author_meta("nickname");
				if (empty($nickname)) {
					$nickname = get_the_author_meta("user_nicename");
				}
			?>
			<?php if (!empty($nickname)) : ?>
				<dd class="nickname"><?php echo $nickname; ?></dd>
			<?php endif; ?>

			<?php $email = get_the_author_meta("email"); ?>
			<?php if (!empty($email)) : ?>
				<dt><?php _e("email:", "exhibition"); ?></dt>
				<dd><a class="email" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></dd>
			<?php endif; ?>

			<?php $userURL = get_the_author_meta("user_url"); ?>
			<?php if (!empty($userURL)) : ?>
				<dt><?php _e("url:", "exhibition"); ?></dt>
				<dd><a class="url" href="<?php echo $userURL; ?>"><?php echo $userURL; ?></a></dd>
			<?php endif; ?>

			<?php $description = get_the_author_meta("description"); ?>
			<?php if (!empty($description)) : ?>
				<dt><?php _e("description:", "exhibition"); ?></dt>
				<dd><?php echo $description; ?></dd>
			<?php endif; ?>
		</dl>
	</div>

</div>

</div>

<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>