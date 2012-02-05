<section class="comments-wrapper">

	<h1>Kommentarer</h1>

	<?php if ( have_comments() ) : ?>
		<?php wp_list_comments(array('walker' => new Walker_Comment_HTML5())); ?>

	<?php else : ?>

		<p>Inga kommentarer.</p>

	<?php endif ?>

	<?php pp_comment_form(array('title_reply' => 'Lämna kommentar')) ?>
</section>