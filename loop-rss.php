<?php global $ettan, $paged; ?>

<?php foreach ( $ettan->get_posts( !is_search() , $paged ) as $post ) : ?>

	<?php $site = $ettan->get_site($post->ID); ?>

	<article role="article" id="post-<?php echo $post->ID ?>" class="ettan <?php echo $post->class ?>">
		<header>
			<div class="ettan-site-name">
				<a href="<?php echo $site->url ?>"><?php echo $site->name ?></a>
			</div>
			<h1 class="entry-title">
				<a target="_blank" href="<?php echo $post->permalink; ?>" rel="bookmark"><?php echo $post->title; ?></a>
			</h1>

			<?php get_template_part( 'entry', 'header' ); ?>

		</header>
		<div class="entry-content">
			<?php echo $post->excerpt; ?>
		</div>

		<footer>
			<?php get_template_part( 'entry', 'footer' ) ?>
		</footer>

		<?php get_template_part( 'entry', 'comments' ) ?>

	</article>

<?php endforeach; ?>

<?php get_template_part( 'pager' ) ?>

