		<footer id="footer" class="clearfix">
			<?php dynamic_sidebar('footer-section-a') ?>
			<?php dynamic_sidebar('footer-section-b') ?>
			<?php dynamic_sidebar('footer-section-c') ?>
			<div class="clearfix"></div>
		</footer>
		</div> <!-- #container -->
		<?php wp_enqueue_script('facebook'); ?>
		<?php wp_footer(); ?>
		<!--[if lt IE 7 ]>
			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->  
	</body>
</html>	