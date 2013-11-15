<?php ob_start() ?>
<?php the_tags("", ", ", ""); ?>
<?php $tags = ob_get_contents(); ob_end_clean(); ?>

<?php $timestamp = get_the_date('U') ?>
<div class="entry-meta"> [
	<span class="entry-date">
		<time class="published updated" pubdate datetime="<?php echo date("Y-m-d", get_the_date('U')) ?>">
            <?php echo date("j ", $timestamp) ?> <?php echo month_sv( date("m", $timestamp) ) ?> <?php echo date("Y", $timestamp) ?>
        </time>
	</span> |
    <?php comments_number( __('inga kommentarer', 'piratpartiet'), __('en kommentar', 'piratpartiet'), __('% kommentarer', 'piratpartiet') ) ?>
    ] </div>


<?php if ( is_single() || is_page() ) : ?>
	<div class="social clearfix">
		<a class="FlattrButton"
		    title="<?php the_title() ?>"
		    data-flattr-uid="piratpartiet"
		    data-flattr-tags="<?php echo strip_tags($tags) ?>"
		    data-flattr-category="text"
		    href="<?php the_permalink() ?>">Flattr this</a>

		<div class="fb-like" data-href="<?php the_permalink() ?>" data-send="false" data-layout="box_count" data-width="48" data-show-faces="false"></div>
		<div class="g-plusone" data-size="tall"></div>
		<div class="pusha-button">
			<a href="http://www.pusha.se/posta?url=<?php echo urlencode(get_permalink()) ?>" target="_blank">
				<img alt="Pusha" src="//static.pusha.se/176/i/push_arrow.png" title="Pusha denna nyhet" width=56 height=56 />
			</a>
		</div>
		<div class="tweetmeme_button">
            <a href="https://twitter.com/share" class="twitter-share-button" data-lang="sv" data-size="large">Tweeta</a>
		</div>
	</div>
	<?php
		wp_enqueue_script('flattr');
		wp_enqueue_script('gplusone');
		wp_enqueue_script('twitter');
	?>
<?php endif ?>

