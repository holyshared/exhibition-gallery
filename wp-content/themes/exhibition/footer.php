			</div>

			<div class="footer">
				<div class="inner">
					<p class="feed"><a href="<?php bloginfo('url'); ?>?feed=atom"><img src="<?php bloginfo('template_directory'); ?>/images/feed.png" alt="Feed" /></a></p>
					<?php
						$first_name	= get_the_author_meta("first_name");
						$last_name	= get_the_author_meta("last_name");
					?>
					<?php if ($first_name && $last_name) : ?>
						<?php
							$url = get_the_author_meta("user_url");
							if (empty($url)) :
								$url = get_bloginfo('url');
							endif;
						 ?>
						<p class="copyright">copyright 2010 <a href="<?php echo $url; ?>"><span class="first-name"><?php the_author_meta("first_name"); ?></span>&nbsp;<span class="last-name"><?php the_author_meta("last_name"); ?></span></a> All rights reserved.</p>
					<?php else: ?>
						<p class="copyright">copyright 2010 <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> All rights reserved.</p>
					<?php endif; ?>

					<?php wp_footer(); ?>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/analytics.js"></script>
	</body>
</html>