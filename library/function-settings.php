<?php
/**
 * Setup
 * @author Andrea Musso
 *
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

 /*==================================================================================
 Table of Contents:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––
  1.0 THEME SETTINGS
    1.1 enqueue scripts/styles
    1.2 theme support

  2.0 GENERAL SETTINGS
    2.1 wphead cleanup
    2.2 hide core-updates for non-admins
    2.3 reset inline image dimensions (for css-scaling of images)
    2.4 disable backend-theme-editor
	2.5 Add Page Slug to Body
	2.6 Login page customization
	2.7 Custom pagination
	2.7 Custom post type
==================================================================================*/


if ( ! function_exists( 'foundry_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

	/*==================================================================================
	1.0 THEME SETTINGS
	==================================================================================*/


	/* 1.1 ENQUEUE SCRIPTS/STYLES
	/––––––––––––––––---––––––––*/
	if ( ! function_exists( 'foundry_asset_path' ) ) :
		function foundry_asset_path( $filename ) {
	
			$manifest_path  = dirname( dirname( __FILE__ ) ) . '/dist/manifest.json';
	
			if ( file_exists( $manifest_path ) ) {
				$manifest = json_decode( file_get_contents( $manifest_path ), true );
			} else {
				$manifest = [];
			}
	
			if ( array_key_exists( $filename, $manifest ) ) {
				return $manifest[ $filename ];
			}
			return $filename;
		}
	endif;
	function foundry_scripts() {
		
		// Deregister guttenberg style
		global $load_default_block_styles;
		if (!$load_default_block_styles) :
		wp_dequeue_style( 'wp-block-library' );
		endif;

		// STYLE

		wp_register_style( 'root-styles', get_template_directory_uri() . '/dist/styles/root.css', array(), '1.0', 'all'  );
	
		wp_register_style( 'foundry-styles', get_template_directory_uri() . '/dist/styles/' . foundry_asset_path( 'main.css' ), array('root-styles'), '1.0', 'all' );
		wp_enqueue_style( 'foundry-styles' );
		
		// SCRIPT
		wp_dequeue_script( 'jquery' );
		wp_deregister_script( 'jquery' );
		wp_register_script( 'foundry-js', get_template_directory_uri() . '/dist/scripts/' . foundry_asset_path( 'main.js' ), array(), '1.0', true );
		wp_enqueue_script( 'foundry-js' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'foundry_scripts' );

	/* 1.2 THEME SUPPORT
	/––––––––––––––––––––––––*/
	function foundry_setup() {
		/*
			* Make theme available for translation.
			* Translations can be filed in the /languages/ directory.
			* If you're building a theme based on foundry, use a find and replace
			* to change 'foundry' to the name of your theme in all the template files.
			*/
		load_theme_textdomain( 'foundry', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
			* Let WordPress manage the document title.
			* By adding theme support, we declare that this theme does not use a
			* hard-coded <title> tag in the document head, and expect WordPress to
			* provide it for us.
			*/
		add_theme_support( 'title-tag' );

		/*
			* Enable support for Post Thumbnails on posts and pages.
			*
			* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			*/
		add_theme_support( 'post-thumbnails' );

		/*
			* Switch default core markup for search form, comment form, and comments
			* to output valid HTML5.
			*/
		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );


		/**
		* Add support for core custom logo.
		*
		* @link https://codex.wordpress.org/Theme_Logo
		*/
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 400,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/* Gutenberg -> enable wide images
		/––––––––––––––––––––––––*/
		add_theme_support( 'align-wide' );
	}
endif;
add_action( 'after_setup_theme', 'foundry_setup' );



/*==================================================================================
  2.0 GENERAL SETTINGS
==================================================================================*/

/* 2.1 WPHEAD CLEANUP
/––––––––––––––––––––––––*/
// remove unused stuff from wp_head()

function wpseed_wphead_cleanup () {
	// remove the generator meta tag
	remove_action('wp_head', 'wp_generator');
	// remove wlwmanifest link
	remove_action('wp_head', 'wlwmanifest_link');
	// remove RSD API connection
	remove_action('wp_head', 'rsd_link');
	// remove wp shortlink support
	remove_action('wp_head', 'wp_shortlink_wp_head');
	// remove next/previous links (this is not affecting blog-posts)
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
	// remove generator name from RSS
	add_filter('the_generator', '__return_false');
	// disable emoji support
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	// disable automatic feeds
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'feed_links', 2);
	// remove rest API link
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10);
	// remove oEmbed link
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10);
	remove_action('wp_head', 'wp_oembed_add_host_js');
  }
  add_action('after_setup_theme', 'wpseed_wphead_cleanup');

  /* 2.2 HIDE CORE-UPDATES FOR NON-ADMINS
/––––––––––––––––––––––––––––––––––––*/
function onlyadmin_update() {
	if (!current_user_can('update_core')) { remove_action( 'admin_notices', 'update_nag', 3 ); }
}
add_action( 'admin_head', 'onlyadmin_update', 1 );

/* 2.3 RESET INLINE IMAGE DIMENSIONS (FOR CSS-SCALING OF IMAGES)
/–––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––*/
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html);
	return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3);


/* 2.4 DISABLE BACKEND-THEME-EDITOR
/–––––––––––––––––––––––––––––––––*/
function remove_editor_menu() {
	remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1);


/* 2.5 ADD PAGE SLUG TO BODY CLASS
/–––––––––––––––––––––––––––––––––*/
// Add Page Slug to Body Class to make router.js work
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
	  $classes[] =  $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' ); 



/* 2.6 LOGIN PAGE
/–––––––––––––––––––––––––––––––––*/
// Customize Logo URL.
add_filter( 'login_headerurl', 'my_custom_login_url' );
function my_custom_login_url() {
    return site_url( '/' );
}

// Style login page
function we_login_logo() { 
	GLOBAL $gFontUrl;
	GLOBAL $fontFamily;
	GLOBAL $customLogo;
	GLOBAL $mainColor;
    ?>
	<style type="text/css">
	<?php if($gFontUrl): ?>
		@import url('<?php echo $gFontUrl ?>');
	<?php endif; ?>

		body{
		<?php if($fontFamily): ?>
			font-family: <?php echo $fontFamily ?>!important;
		<?php endif; ?>
		}
	
        #login h1 a, .login h1 a {
            background-image: url( <?php echo $customLogo ?>);
			background-repeat: no-repeat;
			background-size: 70px;
			<?php if($fontFamily): ?>
			font-family: <?php echo $fontFamily ?>!important;
			<?php endif; ?>
        }
        body.login div#login form#loginform p.submit input#wp-submit {
			background-color: transparent;
			<?php if($fontFamily): ?>
			font-family: <?php echo $fontFamily ?>!important;
			<?php endif; ?>
			color: black;
			text-shadow: none;
			box-shadow: none;
			border: 1px solid black;
			border-radius: 1px;
		}
		body.login div#login .message{
			border: 2px solid <?php echo $mainColor ?>;
		}
		body.login div#login form#loginform p.submit input#wp-submit:hover{
			background-color: #f5f5f5;
		}
        body.login div#login p#nav a:hover {
            color: <?php echo $mainColor ?>;
        }
        body.login div#login p#backtoblog a:hover {
            color: <?php echo $mainColor ?>;
        }
        body.login div#login form#loginform {
			border-radius: 5px;
			<?php if($fontFamily): ?>
			font-family: <?php echo $fontFamily ?>!important;
			<?php endif; ?>
		}
		body.login div#login form#loginform input[type="text"]:focus, body.login div#login form#loginform input[type="password"]:focus {
			border-color: <?php echo $mainColor ?>;
			box-shadow: 0 0 0 1px <?php echo $mainColor ?>;
		}
		body.login div#login form#loginform div.wp-pwd button.button .dashicons{
			color: <?php echo $mainColor ?>;
		}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'we_login_logo' );


/* 2.7 CUSTOM PAGINATION
/–––––––––––––––––––––––––––––––––*/
/**
 * @param WP_Query|null $wp_query
 * @param bool $echo
 *
 * @return string
 * Accepts a WP_Query instance to build pagination (for custom wp_query()), 
 * or nothing to use the current global $wp_query (eg: taxonomy term page)
 * - Tested on WP 4.9.5
 * - Tested with Bootstrap 4.1
 *
 * USAGE:
 *     <?php echo foundry_pagination(); ?> //uses global $wp_query
 * or with custom WP_Query():
 *     <?php 
 *      $query = new \WP_Query($args);
 *       ... while(have_posts()), $query->posts stuff ...
 *       echo foundry_pagination($query);
 *     ?>
 */
function foundry_pagination( \WP_Query $wp_query = null, $echo = true ) {
	if ( null === $wp_query ) {
		global $wp_query;
	}
	$pages = paginate_links( [
			'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			'format'       => '?paged=%#%',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'type'         => 'array',
			'show_all'     => false,
			'end_size'     => 3,
			'mid_size'     => 1,
			'prev_next'    => true,
			'prev_text'    => __( '« Prev' ),
			'next_text'    => __( 'Next »' ),
			'add_args'     => false,
			'add_fragment' => ''
		]
	);
	if ( is_array( $pages ) ) {
		//$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
		$pagination = '<div class="pagination"><ul class="pagination__inner">';
		foreach ($pages as $page) {
                        $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
                }
		$pagination .= '</ul></div>';
		if ( $echo ) {
			echo $pagination;
		} else {
			return $pagination;
		}
	}
	return null;
}

/* 2.7 CUSTOM PAGINATION
/–––––––––––––––––––––––––––––––––*/

function cptui_register_my_cpts() {

	/**
	 * Post Type: Leadership Team.
	 */

	$labels = [
		"name" => __( "Leadership Team", "custom-post-type-ui" ),
		"singular_name" => __( "Leadership Teams", "custom-post-type-ui" ),
		"menu_name" => __( "Leadership Team", "custom-post-type-ui" ),
		"all_items" => __( "All Leadership Team", "custom-post-type-ui" ),
		"add_new" => __( "Add new", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Leadership Teams", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Leadership Teams", "custom-post-type-ui" ),
		"new_item" => __( "New Leadership Teams", "custom-post-type-ui" ),
		"view_item" => __( "View Leadership Teams", "custom-post-type-ui" ),
		"view_items" => __( "View Leadership Team", "custom-post-type-ui" ),
		"search_items" => __( "Search Leadership Team", "custom-post-type-ui" ),
		"not_found" => __( "No Leadership Team found", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "No Leadership Team found in trash", "custom-post-type-ui" ),
		"parent" => __( "Parent Leadership Teams:", "custom-post-type-ui" ),
		"featured_image" => __( "Featured image for this Leadership Teams", "custom-post-type-ui" ),
		"set_featured_image" => __( "Set featured image for this Leadership Teams", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remove featured image for this Leadership Teams", "custom-post-type-ui" ),
		"use_featured_image" => __( "Use as featured image for this Leadership Teams", "custom-post-type-ui" ),
		"archives" => __( "Leadership Teams archives", "custom-post-type-ui" ),
		"insert_into_item" => __( "Insert into Leadership Teams", "custom-post-type-ui" ),
		"uploaded_to_this_item" => __( "Upload to this Leadership Teams", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filter Leadership Team list", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Leadership Team list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Leadership Team list", "custom-post-type-ui" ),
		"attributes" => __( "Leadership Team attributes", "custom-post-type-ui" ),
		"name_admin_bar" => __( "Leadership Teams", "custom-post-type-ui" ),
		"item_published" => __( "Leadership Teams published", "custom-post-type-ui" ),
		"item_published_privately" => __( "Leadership Teams published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => __( "Leadership Teams reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => __( "Leadership Teams scheduled", "custom-post-type-ui" ),
		"item_updated" => __( "Leadership Teams updated.", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Leadership Teams:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Leadership Team", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "leadership_team", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-businesswoman",
		"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
	];

	register_post_type( "leadership_team", $args );

	/**
	 * Post Type: Videos.
	 */

	$labels = [
		"name" => __( "Videos", "custom-post-type-ui" ),
		"singular_name" => __( "Video", "custom-post-type-ui" ),
		"menu_name" => __( "Videos for FAQ", "custom-post-type-ui" ),
		"all_items" => __( "All Videos", "custom-post-type-ui" ),
		"add_new" => __( "Add new", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Video", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Video", "custom-post-type-ui" ),
		"new_item" => __( "New Video", "custom-post-type-ui" ),
		"view_item" => __( "View Video", "custom-post-type-ui" ),
		"view_items" => __( "View Videos", "custom-post-type-ui" ),
		"search_items" => __( "Search Videos", "custom-post-type-ui" ),
		"not_found" => __( "No Videos found", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "No Videos found in bin", "custom-post-type-ui" ),
		"parent" => __( "Parent Video:", "custom-post-type-ui" ),
		"featured_image" => __( "Featured image for this Video", "custom-post-type-ui" ),
		"set_featured_image" => __( "Set featured image for this Video", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remove featured image for this Video", "custom-post-type-ui" ),
		"use_featured_image" => __( "Use as featured image for this Video", "custom-post-type-ui" ),
		"archives" => __( "Video archives", "custom-post-type-ui" ),
		"insert_into_item" => __( "Insert into Video", "custom-post-type-ui" ),
		"uploaded_to_this_item" => __( "Upload to this Video", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filter Videos list", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Videos list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Videos list", "custom-post-type-ui" ),
		"attributes" => __( "Videos attributes", "custom-post-type-ui" ),
		"name_admin_bar" => __( "Video", "custom-post-type-ui" ),
		"item_published" => __( "Video published", "custom-post-type-ui" ),
		"item_published_privately" => __( "Video published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => __( "Video reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => __( "Video scheduled", "custom-post-type-ui" ),
		"item_updated" => __( "Video updated.", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Video:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Videos", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "videos", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-format-video",
		"supports" => [ "title", "editor", "thumbnail" ],
		"taxonomies" => [ "videos" ],
	];

	register_post_type( "videos", $args );

	/**
	 * Post Type: Women in Sport.
	 */

	$labels = [
		"name" => __( "Women in Sport", "custom-post-type-ui" ),
		"singular_name" => __( "Woman in Sport", "custom-post-type-ui" ),
		"menu_name" => __( "Women in Sport", "custom-post-type-ui" ),
		"all_items" => __( "All Women in Sport", "custom-post-type-ui" ),
		"add_new" => __( "Add new", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Woman in Sport", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Woman in Sport", "custom-post-type-ui" ),
		"new_item" => __( "New Woman in Sport", "custom-post-type-ui" ),
		"view_item" => __( "View Woman in Sport", "custom-post-type-ui" ),
		"view_items" => __( "View Women in Sport", "custom-post-type-ui" ),
		"search_items" => __( "Search Women in Sport", "custom-post-type-ui" ),
		"not_found" => __( "No Women in Sport found", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "No Women in Sport found in bin", "custom-post-type-ui" ),
		"parent" => __( "Parent Woman in Sport:", "custom-post-type-ui" ),
		"featured_image" => __( "Featured image for this Woman in Sport", "custom-post-type-ui" ),
		"set_featured_image" => __( "Set featured image for this Woman in Sport", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remove featured image for this Woman in Sport", "custom-post-type-ui" ),
		"use_featured_image" => __( "Use as featured image for this Woman in Sport", "custom-post-type-ui" ),
		"archives" => __( "Woman in Sport archives", "custom-post-type-ui" ),
		"insert_into_item" => __( "Insert into Woman in Sport", "custom-post-type-ui" ),
		"uploaded_to_this_item" => __( "Upload to this Woman in Sport", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filter Women in Sport list", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Women in Sport list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Women in Sport list", "custom-post-type-ui" ),
		"attributes" => __( "Women in Sport attributes", "custom-post-type-ui" ),
		"name_admin_bar" => __( "Woman in Sport", "custom-post-type-ui" ),
		"item_published" => __( "Woman in Sport published", "custom-post-type-ui" ),
		"item_published_privately" => __( "Woman in Sport published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => __( "Woman in Sport reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => __( "Woman in Sport scheduled", "custom-post-type-ui" ),
		"item_updated" => __( "Woman in Sport updated.", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Woman in Sport:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Women in Sport", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "women_sport", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-megaphone",
		"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
	];

	register_post_type( "women_sport", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
