<?php $timestamp = get_the_date('U') ?>
<div class="entry-meta"> [
	<span class="entry-date">
		<time class="published updated" pubdate datetime="<?php echo date("Y-m-d", get_the_date('U')) ?>">
			<?php echo date("j ", $timestamp) ?> <?php echo month_sv( date("m", $timestamp) ) ?> <?php echo date("Y", $timestamp) ?>
		</time>
	</span> |
	<?php comments_number( __('inga kommentarer', 'piratpartiet'), __('en kommentar', 'piratpartiet'), __('% kommentarer', 'piratpartiet') ) ?>
] </div>
