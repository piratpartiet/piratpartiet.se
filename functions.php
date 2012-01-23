<?php


class Piratpartiet {

	private $plugin_name = "piratpartiet";

	function __construct() {

		add_action('init', array( $this, 'init_assets') );
		add_action('init', array( $this, 'init_menus') );
		add_action('init', array( $this, 'init_sidebars') );

		add_theme_support('post-thumbnails');

		$this->custom_header_support();
	}

	function custom_header_support() {

		add_custom_image_header( array($this, 'custom_header_style'), null );

		define('HEADER_TEXTCOLOR', '');
		define('HEADER_IMAGE', '%s/images/default_header.png');
		define('HEADER_IMAGE_WIDTH', 1000);
		define('HEADER_IMAGE_HEIGHT', 180);
		define('NO_HEADER_TEXT', true );
	}

	function custom_header_style() {
		?><style type="text/css">
	        #banner { background-image: url(<?php header_image(); ?>); }
	    </style><?php
	}

	function init_sidebars() {

		$args = array(
			'name'          => 'Sidospalt sektion A',
			'id'            => 'sidebar-section-a',
			'description'   => 'Överst i sidospalten, full bredd',
			'before_widget' => '<section>',
			'after_widget'  => '</section>',
			'before_title'  => '<h1>',
			'after_title'   => '</h1>'
		);

		register_sidebar($args);

		$args['name']        = 'Sidospalt sektion B';
		$args['id']          = 'sidebar-section-b';
		$args['description'] = "Mitten av sidospalten, halv bredd, till vänster";

		register_sidebar($args);

		$args['name']        = "Sidospalt sektion C";
		$args['id']          = 'sidebar-section-c';
		$args['description'] = "Mitten av sidospalten, halv bredd, till höger";

		register_sidebar($args);

		$args['name']        = "Sidospalt sektion D";
		$args['id']          = 'sidebar-section-d';
		$args['description'] = "Underst i sidospalten, full bredd";

		register_sidebar($args);

		$args['name']        = "Sidfoten (vänster)";
		$args['id']          = 'footer-section-a';
		$args['description'] = "Vänstra delen av sidfoten";

		register_sidebar($args);

		$args['name']        = "Sidfoten (mitten)";
		$args['id']          = 'footer-section-b';
		$args['description'] = "Mellersta delen av sidfoten";

		register_sidebar($args);

		$args['name']        = "Sidfoten (höger)";
		$args['id']          = 'footer-section-c';
		$args['description'] = "Högra delen av sidfoten";

		register_sidebar($args);
	}

	function init_menus() {
		register_nav_menu('main', __('PP Huvudmeny'));
	}

	function init_assets() {

		// Only enqueue files on the public part of the page
		if ( !is_admin() ) {

			wp_enqueue_style($this->plugin_name . '-style', get_bloginfo( 'stylesheet_directory') . "/style.css");

			wp_enqueue_script('modernizr',  get_bloginfo("stylesheet_directory") . "/js/libs/modernizr-2.0.6.min.js");
			wp_enqueue_script($this->plugin_name . '-plugins', get_bloginfo("stylesheet_directory") . "/js/plugins.js", array('jquery'), false, true);
			wp_enqueue_script($this->plugin_name . '-script', get_bloginfo("stylesheet_directory") . "/js/script.js", array('jquery', $this->plugin_name . '-plugins'), false, true);
		}
	}
}

new Piratpartiet();

function month_sv($month) {

	$month = intval($month);

	$m = array(null, "Jan", "Feb", "Mar", "Apr", "Maj", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dec");
	return $m[ $month ];
}