<?php $first = true; if (have_posts()) :
	while (have_posts()) : the_post() ?>
		
	<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if ( has_post_thumbnail() ) : ?>
            <figure class="alignleft">
                <?php the_post_thumbnail('thumbnail') ?>
            </figure>
        <?php endif ?>

		<header>

			<?php if ( get_post_meta( get_the_ID(), 'pp-ettan-site-name', true ) ) : ?>
            <div class="ettan-site-name">
                <a href="<?php echo esc_attr( get_post_meta( get_the_ID(), 'pp-ettan-site-url', true ) ) ?>">
					<?php echo esc_html( get_post_meta( get_the_ID(), 'pp-ettan-site-name', true ) ) ?>
                </a>
            </div>
			<?php endif ?>

			<h1 class="entry-title">

				<?php if (!is_single() && !is_page()) : ?>
				<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
				
				<?php else : ?> 
				<?php the_title() ?>
				 
				<?php endif; ?> 
			</h1>
			
			<?php get_template_part( 'entry', 'header' ); ?>

		</header>
        <?php if ($first) : $first = false ?>
		<div class="entry-content">
			<?php if ( is_single() || is_page() ) : ?>
				<?php the_content(); ?>
			<?php else : ?>
				<?php the_excerpt(); ?>
			<?php endif ?>
		</div>
        <?php endif ?>

		<footer>
			<?php get_template_part( 'entry', 'footer' ) ?>
		</footer>

		<?php get_template_part( 'entry', 'comments' ) ?>

	</article>

	<?php endwhile; ?>

<?php elseif (is_search()) : ?>

    <article>
        <h1>Din sökning gav inget resultat</h1>
        <p>Din sökning på <em><?php echo filter_var($_GET['s'], FILTER_SANITIZE_STRING) ?></em> gav tyvärr inget resultat.</p>
    </article>

<?php endif; ?>