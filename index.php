<?php get_header(); ?>
<div id="main" class="clearfix">
	<div id="content" class="wide-column" role="main">
		<?php dynamic_sidebar('sticky') ?>
		<?php get_template_part('loop') ?>
        <?php get_template_part('pager') ?>
    </div>
	<aside class="sidebar narrow-column">
		<?php get_sidebar() ?>
	</aside>
</div>
			
<?php get_footer(); ?>