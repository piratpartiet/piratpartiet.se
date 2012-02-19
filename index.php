<?php $name = ( class_exists('PP_ettan') && (is_home() || is_front_page()) ) ? 'rss' : null; ?>
<?php get_header(); ?>
<div id="main">
	<div id="content" class="wide-column" role="main">
		<?php get_template_part('loop', $name) ?>
	</div>
	<aside class="sidebar narrow-column">
		<?php get_sidebar() ?>
	</aside>
	<div class="clearfix"></div>	
</div>
			
<?php get_footer(); ?>