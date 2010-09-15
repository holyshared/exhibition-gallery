<?php if ( post_password_required() ) : ?>
<p><?php _e('Enter your password to view comments.'); ?></p>
<?php return; endif; ?>

<?php if ( pings_open() ) : ?>

<div class="mod trackback">
	<div class="inner">
		<div class="hd">
			<h3><?php echo __("Trackback: ", "exhibition") ?></h3><p class="explanation"><?php echo __("It is a comment that has been gotten before.", "exhibition") ?></p>
		</div>
		<div class="bd">
			<p><?php echo __("Please send the track back to following URL.", "exhibition") ?><br /><a href="<?php trackback_url() ?>" rel="trackback"><?php trackback_url() ?></a></p>
		</div>
	</div>
</div>

<?php endif; ?>


<?php if ( have_comments() ) : ?>
	<div id="respond" class="mod comments">
		<div class="inner">
			<div class="hd">
				<h3><?php echo __("Comment: ", "exhibition") ?></h3><p class="explanation"><?php echo __("It is a comment that has been gotten before.", "exhibition") ?></p>
			</div>
			<div class="bd">
				<ul>
					<?php foreach ($comments as $comment) : ?>
					<?php
						$author		= get_comment_author();
						$authorURL	= get_comment_author_url();
					?>
						<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">

							<p class="photo author"><a title="<?php echo $author ?>" href="<?php echo $authorURL ?>"><?php echo get_avatar( $comment, 60); ?></a></p>
							<div class="commentContent">
								<?php comment_text() ?>
								<ul class="meta">
									<li><strong><?php echo __("author: ", "exhibition") ?></strong><a title="<?php echo $author ?>" href="<?php echo $authorURL ?>"><?php echo $author ?></a></li>
									<li class="url"><strong><?php echo __("url: ", "exhibition") ?></strong><a href="<?php echo $authorURL ?>"><?php echo $authorURL ?></a></li>
								</ul>
							</div>

						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
<?php else : // If there are no comments yet ?>
		
<?php endif; ?>



<?php if ( comments_open() ) : ?>
	
<div id="postcomment" class="mod commentForm">
	<div class="inner">
		<div class="hd">
			<h3><?php echo __("Comment Form: ", "exhibition") ?></h3><p class="explanation"><?php echo __("Please give the comment to this photograph.", "exhibition") ?></p>
		</div>

		<div class="bd">

			<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
				<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url( get_permalink() ) );?></p>
			<?php else : ?>
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
					<?php if ( is_user_logged_in() ) : ?>
						<p><?php printf(__('Logged in as %s.'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account') ?>"><?php _e('Log out &raquo;'); ?></a></p>
					<?php else : ?>
						<fieldset>
							<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
							<ul>
								<li>
									<label for="author"><strong><?php echo __("name", "exhibition") ?><?php if ($req) '(required)' ?></strong></label><br />
									<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="33" tabindex="1" />
								</li>
								<li>
									<label for="email"><strong><?php echo __("email", "exhibition") ?><?php if ($req) '(required)'; ?></strong></label><br />
									<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="33" tabindex="2" />
								</li>
								<li>
									<label for="url"><strong><?php echo __("url", "exhibition") ?></strong></label><br />
									<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="33" tabindex="3" />
								</li>
							</ul>
							<p>
								<label for="comment"><strong><?php echo __("comment", "exhibition") ?></strong></label><br />
								<textarea id="comment" name="comment" cols="60" rows="7"></textarea>
							</p>
						</fieldset>
		
					<?php endif; ?>
					<p class="controls"><input type="submit" name="post" value="<?php echo __("comment", "exhibition") ?>" /></p>
				</form>

			<?php endif; // If registration required and not logged in ?>
		</div>
	</div>
</div>

<?php else : // Comments are closed ?>
	<p><?php _e('Sorry, the comment form is closed at this time.'); ?></p>
<?php endif; ?>
