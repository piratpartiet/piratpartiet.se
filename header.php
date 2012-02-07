<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		<meta name="description" content="">
		<meta name="author" content="Montania System AB">
  		<meta name="viewport" content="width=device-width,initial-scale=1">
		
		<link rel="shortcut icon" href="<?php bloginfo("template_directory") ?>/images/favicon.png" type="image/x-icon">
		<link rel="apple-touch-icon" href="<?php bloginfo("template_directory") ?>/images/apple-touch-icon.png" type="image/png">	
		<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo("template_directory") ?>/images/apple-touch-icon-72x72.png" type="image/png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo("template_directory") ?>/images/apple-touch-icon-114x114.png" type="image/png">
		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
				
		<?php wp_head(); ?>
	</head>
	<!--[if lt IE 7 ]> <body <?php body_class('ie6'); ?>> <![endif]-->
	<!--[if IE 7 ]> <body <?php body_class('ie7'); ?>> <![endif]-->
	<!--[if IE 8 ]> <body <?php body_class('ie8'); ?>> <![endif]-->
	<!--[if IE 9 ]> <body <?php body_class('ie9'); ?>> <![endif]-->
	<!--[if (gt IE 9)|!(IE)]><!--> <body <?php body_class('ie6'); ?>> <!--<![endif]-->
		<div id="fb-root"></div>
		<div id="topmenu">
			<?php do_action('pp-topmenu') ?>
		</div>

		<div id="container">
			<header role="banner" id="header">
				<div id="banner"></div>
				<?php wp_nav_menu(array('theme_location' => 'main', 'container' => 'nav')) ?>
				<div class="header-bottom">
					<hgroup class="wide-column">
						<a href="<?php bloginfo('rss2_url'); ?>" class="rss-icon"></a>
						<h1>
							<a href="<?php bloginfo("url") ?>" rel="home"><?php bloginfo("name") ?></a>
						</h1>
						<h2><?php bloginfo("description") ?></h2>
					</hgroup>
					<div class="narrow-column">
						<?php get_search_form(true) ?>
					</div>
				</div>
			</header>