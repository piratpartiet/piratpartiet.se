<?php
global $ettan;

if ( class_exists('PP_Ettan') ) : ?>

    <?php get_header(); ?>
    <div id="main" class="clearfix">
        <div id="content" class="wide-column clearfix" role="main">
            <?php dynamic_sidebar('sticky') ?>

            <section class="media">
                <h1>I media</h1>

                <?php $ettan->query_stream('media-2', 2) ?>
                <?php get_template_part('loop') ?>
            </section>

            <section class="press">
                <h1>Pressmeddelande</h1>

                <?php $ettan->query_stream('pressmeddelande', 1) ?>
                <?php get_template_part('loop') ?>
            </section>

            <section class="central">
                <h1>Centralt</h1>

                <?php $ettan->query_stream('centralt', 5) ?>
                <?php get_template_part('loop', 'condensed') ?>
            </section>

            <section class="local">
                <h1>Lokalt</h1>

                <?php $ettan->query_stream('lokalt', 5) ?>
                <?php get_template_part('loop', 'condensed') ?>
            </section>

            <a href="<?php echo get_permalink(get_option('page_for_posts')) ?>">Till nyhetsarkivet</a>

        </div>
        <aside class="sidebar narrow-column">
            <?php get_sidebar() ?>
        </aside>
    </div>

    <?php get_footer(); ?>

<?php else :

    get_template_part('index');

endif;
