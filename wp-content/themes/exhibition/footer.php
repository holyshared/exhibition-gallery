			</div>

			<?php $className = (is_single() || is_page()) ? "static" : "relative"; ?>
			<div class="footer <?php echo $className; ?>">
				<div class="inner">
					<p class="copyright">copyright 2010 <a href="http://sharedhat.com">Noritaka Horio</a> All rights reserved.</p>
					<?php wp_footer(); ?>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/analytics.js"></script>
	</body>
</html>