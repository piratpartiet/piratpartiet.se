<?php global $ettan; ?>

<?php foreach ( $ettan->get_posts() as $post ) : ?>

	<article role="article" id="post-<?php echo $post->ID ?>" <?php echo $post->class ?>>
		<header>
			<h1 class="entry-title">
				<a href="<?php echo $post->permalink; ?>" rel="bookmark"><?php echo $post->title; ?></a>
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

