<?php
global $wp_query, $paged;

$last_page = Piratpartiet::get_max_num_pages();

if ( $paged < 5 ) {
	$page_start = 1;
	$page_end   = $page_start + ( $last_page > 9 ? 9 : $last_page );
} else if ( $paged > ( $last_page - 5 ) ) {
	$page_start = $last_page - 8;
	$page_end   = $last_page + 1;
} else {
	$page_start = $paged - 4;
	$page_end   = $paged + 5;
}

if ( $last_page > 1 ) :
?>
<div class="pager">
	<?php if ( $page_start > 1 ) : ?>
		<span class="nav-first">
			<a href="<?php echo get_pagenum_link(1) ?>">&larr; Första sidan</a>
		</span>
	<?php endif ?>

	<span class="nav-next"><?php previous_posts_link( 'Föregående sida' ); ?></span>

	<?php for ($x = $page_start; $x < $page_end; $x++) : ?>

		<?php
		$classes = array('nav-num', 'nav-num-' . $x);

		if ( $paged > 0 && $paged == $x || $paged == 0 && $x == 1 )
			$classes[] = 'nav-num-current';
		?>

		<span class="<?php echo implode(" ", $classes) ?>">
			<a href="<?php echo get_pagenum_link($x) ?>" title="Gå till sida <?php echo $x ?>"><?php echo $x ?></a>
		</span>

	<?php endfor ?>

	<span class="nav-previous"><?php next_posts_link( 'Nästa sida' ); ?></span>

	<?php if ( $page_end <= $last_page ) : ?>
		<span class="nav-last">
			<a href="<?php echo get_pagenum_link($last_page) ?>">Sista sidan &rarr;</a>
		</span>
	<?php endif ?>
</div>
<?php endif;