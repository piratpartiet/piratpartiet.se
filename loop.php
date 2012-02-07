<?php if (have_posts()) :
	while (have_posts()) : the_post() ?>
		
	<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<h1 class="entry-title">
				
				<?php if (!is_single() && !is_page()) : ?>
				<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
				
				<?php else : ?> 
				<?php the_title() ?>
				 
				<?php endif; ?> 
			</h1>
			
			<?php get_template_part( 'entry', 'header' ); ?>

		</header>
		<div class="entry-content">

			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="alignleft">
					<?php the_post_thumbnail('thumbnail') ?>
				</figure>
			<?php endif ?>

			<?php the_content(); ?>
		</div>

		<footer>
			<?php get_template_part( 'entry', 'footer' ) ?>
		</footer>

		<?php get_template_part( 'entry', 'comments' ) ?>

	</article>

	<?php endwhile; ?>

	<?php get_template_part( 'pager' ) ?>

<?php endif; ?>