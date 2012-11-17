<?php get_header(); ?>
<div id="main" class="clearfix">
    <div id="content" class="wide-column" role="main">
        <article>
            <h1>Sidan du söker hittades inte</h1>
        </article>
        <p>Tyvärr kunde vi inte hitta den sida du söker. Vi har just bytt plattform för hemsidan och det kan hända att vissa länkar inte längre fungerar.</p>
        <p> Om du är säker på att innehållet du söker borde finnas här kan du anmäla detta till oss.</p>

        <form action="" method="post">
            <label class="checkbox">
                <input type="checkbox" checked> Den här sidan har funnits innan flytten till ny plattform
            </label>

            <button>Anmäl</button>
        </form>
    </div>
    <aside class="sidebar narrow-column">
        <?php get_sidebar() ?>
    </aside>
</div>
<?php get_footer(); ?>