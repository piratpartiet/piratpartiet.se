<?php get_header(); ?>
<?php $sent = $pp->handle_404_form() ?>
<div id="main" class="clearfix">
    <div id="content" class="wide-column" role="main">
        <article>
            <h1>Sidan du söker hittades inte</h1>
            <p>Tyvärr kunde vi inte hitta den sida du söker. Vi har just bytt plattform för hemsidan och det kan hända att vissa länkar inte längre fungerar.</p>
            <p> Om du är säker på att innehållet du söker borde finnas här kan du anmäla detta till oss.</p>

            <form action="" method="post">
                <?php if ($sent) : ?>
                    <p>Din anmälan är mottagen, tack för hjälpen!</p>
                <?php else : ?>
                    <?php wp_nonce_field('_404_notice'); ?>

                    <label class="checkbox">
                        <input type="checkbox" checked> Den här sidan har funnits innan flytten till ny plattform
                    </label>

                    <button>Anmäl</button>
                <?php endif ?>
            </form>
        </article>
    </div>
    <aside class="sidebar narrow-column">
        <?php get_sidebar() ?>
    </aside>
</div>
<?php get_footer(); ?>