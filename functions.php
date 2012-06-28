<?php
/**
 * Piratpartied WordPress Theme
 * @version 1.0
 * @author Rickard Andersson <rickard@0x539.se>
 */

/**
 * Main class for the theme
 * @since 1.0
 */
class Piratpartiet {

	/**
	 * Theme name and directory name
	 * @var string
	 */
	private $plugin_name = "piratpartiet";

	/**
	 * Initializes the theme functionality
	 */
	function __construct() {

		// Initializing functions
		add_action('init', array( $this, 'init_assets') );
		add_action('init', array( $this, 'init_menus') );
		add_action('init', array( $this, 'init_sidebars') );

		// Enable post thumbnails and set the size to 190x190
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size( 190, 190 );

		// This theme has custom header support, this function will enable it
		$this->custom_header_support();

		// Change some excerpt settings
		add_filter('excerpt_more', array($this, 'excerpt_more'));
		add_filter('excerpt_length', array($this, 'excerpt_length'), 999);

		// Filters for adding the featured image to the rss feed, only applies to sub-blogs. The main blog
		// is fetching the content from RSS and the images are already included there.
		if ( !class_exists('PP_Ettan')) {
			add_filter('the_excerpt_rss', array($this, 'featured_image_rss') );
			add_filter('the_content_feed', array($this, 'featured_image_rss') );
		}
	}

	/**
	 * Adds the featured image to the rss feed
	 * @param $content
	 * @return string
	 * @since 1.0
	 */
	function featured_image_rss($content) {

		global $post;

		if ( has_post_thumbnail( $post->ID ) ) {

			$thumbnail = '<figure class="alignleft">';
			$thumbnail .= get_the_post_thumbnail( $post->ID, 'thumbnail' );
			$thumbnail .= '</figure>';

			$content = $thumbnail . $content;
		}

		return $content;
	}

	/**
	 * Attached to the filter excerpt_length
	 * @param $length
	 * @return int
	 * @since 1.0
	 */
	function excerpt_length( $length ) {
		return 85;
	}

	/**
	 * Attached to the filter excerpt_more
	 * @param $more
	 * @return string
	 * @since 1.0
	 */
	function excerpt_more($more) {
		global $post;
		return '... <a href="'. get_permalink($post->ID) .'">Läs mer</a>';
	}

	/**
	 * Adds custom header support for this theme
	 * @since 1.0
	 * @return void
	 */
	function custom_header_support() {

		$args = array(
			'default-image'             => get_template_directory_uri() . '/images/default_header.png',
			'header-text'               => false,
			'default-text-color'        => '',
			'width'                     => 1000,
			'height'                    => 180,
			'random-default'            => false,
			'wp-head-callback'          => array( $this, 'custom_header_style' ),
		);

		add_theme_support('custom-header', $args);
	}

	/**
	 * Needed function for the custom header
	 * @since 1.0
	 * @return void
	 */
	function custom_header_style() {
		?><style type="text/css">
	        #banner { background-image: url(<?php header_image(); ?>); }
	    </style><?php
	}

	/**
	 * Initialize the sidebars
	 * @since 1.0
	 * @return void
	 */
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

	/**
	 * Initialize the menus
	 * @since 1.0
	 * @return void
	 */
	function init_menus() {
		register_nav_menu('main', __('PP Meny'));
	}

	/**
	 * Initialize javascript and stylesheets
	 * @since 1.0
	 * @return void
	 */
	function init_assets() {

		// Only enqueue files on the public part of the page
		if ( !is_admin() ) {

			$protocol = isset($_SERVER['HTTPS']) ? "https" : "http";

			wp_enqueue_style($this->plugin_name . '-style', get_bloginfo( 'stylesheet_directory') . "/style.css", array(), 8);

			wp_enqueue_script('modernizr',  get_bloginfo("stylesheet_directory") . "/js/libs/modernizr-2.5.3.min.js");
//			wp_enqueue_script($this->plugin_name . '-plugins', get_bloginfo("stylesheet_directory") . "/js/plugins.js", array('jquery'), false, true);
			wp_enqueue_script($this->plugin_name . '-script', get_bloginfo("stylesheet_directory") . "/js/script.js", array('jquery'), false, true);

			wp_register_script('flattr', $protocol . '://api.flattr.com/js/0.6/load.js?mode=auto&language=sv_SE&category=text', array(), false, true);
			wp_register_script('facebook', $protocol . '://connect.facebook.net/sv_SE/all.js#xfbml=1', array(), false, true);
			wp_register_script('gplusone', $protocol . '://apis.google.com/js/plusone.js', array(), false, true);
		} else {
			wp_enqueue_script($this->plugin_name . '-admin-script', get_bloginfo("stylesheet_directory") . '/js/admin-script.js', array('jquery') );
		}
	}

	/**
	 * Wrapper function for $wp_query->max_num_pages when using PP ettan
	 * @static
	 * @return int
	 * @since 1.0
	 */
	static function get_max_num_pages() {
		global $wp_query, $ettan;

		$ppp = get_option('posts_per_page');

		if ( class_exists('PP_Ettan') ) {
			return intval( ceil( $ettan->get_max_posts_count() / $ppp ) );
		} else {
			return $wp_query->max_num_pages;
		}
	}
}

// Load the theme
new Piratpartiet();

/**
 * Get the swedish month name
 * @param int $month
 * @return string
 * @since 1.0
 */
function month_sv($month) {

	$month = intval($month);

	$m = array(null, "Jan", "Feb", "Mar", "Apr", "Maj", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dec");
	return $m[ $month ];
}




/**
 * HTML comment list class.
 *
 * @package WordPress
 * @uses Walker
 * @since 2.7.0
 */
class Walker_Comment_HTML5 extends Walker_Comment {

	/**
	 * @see Walker::start_lvl()
	 * @since 2.7.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of comment.
	 * @param array $args Uses 'style' argument for type of HTML list.
	 */
	function start_lvl(&$output, $depth, $args) {
		$GLOBALS['comment_depth'] = $depth + 1;
	}

	/**
	 * @see Walker::end_lvl()
	 * @since 2.7.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of comment.
	 * @param array $args Will only append content if style argument value is 'ol' or 'ul'.
	 */
	function end_lvl(&$output, $depth, $args) {
		$GLOBALS['comment_depth'] = $depth + 1;
	}


	/**
	 * @see Walker::start_el()
	 * @since 2.7.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $comment Comment data object.
	 * @param int $depth Depth of comment in reference to parents.
	 * @param array $args
	 */
	function start_el(&$output, $comment, $depth, $args) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;

		if ( !empty($args['callback']) ) {
			call_user_func($args['callback'], $comment, $args, $depth);
			return;
		}

		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

?>
		<article <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">

			<header>
				<span class="comment-author vcard">
					<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
					<?php printf('<cite class="fn">%s</cite> <span class="says">skrev</span>', get_comment_author_link()) ?>
				</span>

				<span class="comment-meta commentmetadata">
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><time class="published updated" pubdate datetime="<?php echo date("c", strtotime( get_comment_date() . " " . get_comment_time() ) )?>"><?php printf('den %1$s kl. %2$s', get_comment_date("j/n Y"),  get_comment_time()) ?></time></a>:
					<?php edit_comment_link(__('(Edit)'),'&nbsp;&nbsp;','' ); ?>
				</span>

				<?php if ($comment->comment_approved == '0') : ?>
					<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
					<br />
				<?php endif; ?>


			</header>

			<?php comment_text() ?>

			<footer>
			<?php comment_reply_link(array_merge( $args, array('add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</footer>
<?php
	}

	/**
	 * @see Walker::end_el()
	 * @since 2.7.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $comment
	 * @param int $depth Depth of comment.
	 * @param array $args
	 */
	function end_el(&$output, $comment, $depth, $args) {
		if ( !empty($args['end-callback']) ) {
			call_user_func($args['end-callback'], $comment, $args, $depth);
			return;
		}
		echo '</article>';
	}
}

/**
 * Improved comment form
 * @param array $args
 * @param int $post_id
 * @since 1.0
 * @return void
 */
function pp_comment_form( $args = array(), $post_id = null ) {
	global $id;

	if ( null === $post_id )
		$post_id = $id;
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = ! empty( $user->ID ) ? $user->display_name : '';

	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
		'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . ' '. ( $req ? '<span class="required">*</span>' : '' ) .'</label> ' .
		            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
		'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ' ' . ( $req ? '<span class="required">*</span>' : '' ) . '</label> '  .
		            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
		'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label>' .
		            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
	);

	$required_text = sprintf( ' ' . __('Required fields are marked %s'), '<span class="required">*</span>' );
	$defaults = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
		'must_log_in'          => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
		'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => __( 'Leave a Reply' ),
		'title_reply_to'       => __( 'Leave a Reply to %s' ),
		'cancel_reply_link'    => __( 'Cancel reply' ),
		'label_submit'         => __( 'Post Comment' ),
	);

	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	?>
		<?php if ( comments_open() ) : ?>
			<?php do_action( 'comment_form_before' ); ?>
			<div id="respond">
				<h2 id="reply-title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small></h2>
				<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
					<?php echo $args['must_log_in']; ?>
					<?php do_action( 'comment_form_must_log_in_after' ); ?>
				<?php else : ?>
					<form role="form" action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>">
						<?php do_action( 'comment_form_top' ); ?>
						<?php if ( is_user_logged_in() ) : ?>
							<?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
							<?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
						<?php else : ?>
							<?php echo $args['comment_notes_before']; ?>
							<?php
							do_action( 'comment_form_before_fields' );
							foreach ( (array) $args['fields'] as $name => $field ) {
								echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
							}
							do_action( 'comment_form_after_fields' );
							?>
						<?php endif; ?>
						<?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
						<?php echo $args['comment_notes_after']; ?>
						<p class="form-submit">
							<input name="submit" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
							<?php comment_id_fields( $post_id ); ?>
						</p>
						<?php do_action( 'comment_form', $post_id ); ?>
					</form>
				<?php endif; ?>
			</div><!-- #respond -->
			<?php do_action( 'comment_form_after' ); ?>
		<?php else : ?>
			<?php do_action( 'comment_form_comments_closed' ); ?>
		<?php endif; ?>
	<?php
}
