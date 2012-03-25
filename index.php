<?php $name = ( class_exists('PP_ettan') && (is_home() || is_front_page() || is_search()) ) ? 'rss' : null; ?>
<?php get_header(); ?>
<div id="main" class="clearfix">
	<div id="content" class="wide-column" role="main">
		<?php get_template_part('loop', $name) ?>
	</div>
	<aside class="sidebar narrow-column">
		<?php get_sidebar() ?>
	</aside>
</div>
			
<?php get_footer(); ?>