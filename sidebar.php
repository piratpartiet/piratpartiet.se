<?php if (is_active_sidebar('sidebar-master')) : ?>
	<?php dynamic_sidebar('sidebar-master') ?>
<?php else : ?>
	<?php do_action('pp_remote_sidebar') ?>
<?php endif ?>

<section>
    <div class="textwidget social clearfix">
        <a href="https://twitter.com/piratpartiet" class="icon-social icon-twitter"></a><a href="https://plus.google.com/+piratpartiet/" class="icon-social icon-gplus"></a><a href="https://www.facebook.com/piratpartiet" class="icon-social icon-facebook"></a>
        <div class="social-text">Följ oss på:</div>
    </div>
</section>

<?php dynamic_sidebar('sidebar-section-a') ?>
<div class="two-col">
	<?php dynamic_sidebar('sidebar-section-b') ?>
</div>
<div class="two-col">
	<?php dynamic_sidebar('sidebar-section-c') ?>
</div>
<div class="clearfix"></div>
<?php dynamic_sidebar('sidebar-section-d') ?>