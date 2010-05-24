<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
		<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<meta name="google-site-verification" content="sAx81E3uAUaQpeaJ7NiSba3jF3bkb3aKpd1XFwUxB2k" />
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?> 
		<?php wp_head(); ?>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/mootools-core.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/mootools-more.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/exhibition.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/exhibition.horizontal.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/previewer.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/menumatic.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/photogallery.js"></script>
		<link rel="alternate" type="application/rss+xml" title="exhibition.sharedhat.com feed" href="http://www.exhibition.sharedhat.com/?feed=rss2" />
		<link rel="alternate" type="application/rss+xml" title="exhibition.sharedhat.com feed" href="http://www.exhibition.sharedhat.com/?feed=rss" />
		<link rel="alternate" type="application/atom+xml" title="exhibition.sharedhat.com feed" href="http://www.exhibition.sharedhat.com/?feed=atom" />
	</head>
	<body <?php body_class(); ?>>
		<div id="warpper">
			<div id="header">
				<div class="content">
					<div class="bloginfo">
						<h1><a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('template_directory'); ?>/images/img_logo.png" alt="<?php bloginfo('name'); ?>" /></a></h1>
						<p class="description"><?php bloginfo('description'); ?></p>
						<p class="period">Oct.10.2010 - Mar.1.2010</p>
						<?php
							$perpage = "&posts_per_page=1";
							if (is_home()) {
								query_posts($perpage);
							} else if (is_tag()) {
								query_posts('tag='.single_tag_title("", false).$perpage);
							} else if (is_category()) {
								query_posts('cat='.exhibition_categories_ids().$perpage);
							} else if (is_archive()) {
								query_posts($perpage);
							} else {
								query_posts('category_name='.get_page_uri($post->ID).$perpage);
							}
							the_post();
						?> 
						<?php if (yapb_is_photoblog_post()): ?>
							<?php
								$title = the_title('', '', false);
								echo yapb_get_thumbnail(
									'<p class="thumbnail"><a rel=\'bookmark\' title=\''.$title.'\' href=\''.get_permalink().'\'>',
										array('alt' => $title, 'title' => $title),
										'</a></p>',
										array('w=90', 'q=90')
									);
							?>
						<?php endif ?>
						<?php wp_reset_query(); ?>
					</div>
					<ul id="nav">
						<li <?php echo (is_home()) ? "class='current_page_item'" : ""; ?>><a href="<?php echo get_option('home'); ?>/">home</a></li>
						<?php wp_list_categories('title_li='); ?>
						<li><a href="<?php echo get_year_link(""); ?>">archives</a><ul><?php wp_get_archives('type=monthly'); ?></ul></li>
					</ul>
				</div>
			</div>
			<div id="main">
