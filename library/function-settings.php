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
		


		wp_register_style( 'col-foundry-styles', get_template_directory_uri() . '/dist/styles/' . foundry_asset_path( 'col-main.css' ), array('root-styles'), '1.0', 'all' );
		wp_enqueue_style( 'col-foundry-styles' );

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

/* 2.8 CUSTOM POST TYPE
/–––––––––––––––––––––––––––––––––*/

function cptui_register_my_cpts() {

	/**
	 * Post Type: Leadership Team.
	 */

	$labels = [
		"name" => __( "Team", "custom-post-type-ui" ),
		"singular_name" => __( "Teams", "custom-post-type-ui" ),
		"menu_name" => __( "Team", "custom-post-type-ui" ),
		"all_items" => __( "All Team", "custom-post-type-ui" ),
		"add_new" => __( "Add new", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Teams", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Teams", "custom-post-type-ui" ),
		"new_item" => __( "New Teams", "custom-post-type-ui" ),
		"view_item" => __( "View Teams", "custom-post-type-ui" ),
		"view_items" => __( "View Team", "custom-post-type-ui" ),
		"search_items" => __( "Search Team", "custom-post-type-ui" ),
		"not_found" => __( "No Team found", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "No Team found in trash", "custom-post-type-ui" ),
		"parent" => __( "Parent Teams:", "custom-post-type-ui" ),
		"featured_image" => __( "Featured image for this Teams", "custom-post-type-ui" ),
		"set_featured_image" => __( "Set featured image for this Teams", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remove featured image for this Teams", "custom-post-type-ui" ),
		"use_featured_image" => __( "Use as featured image for this Teams", "custom-post-type-ui" ),
		"archives" => __( "Teams archives", "custom-post-type-ui" ),
		"insert_into_item" => __( "Insert into Teams", "custom-post-type-ui" ),
		"uploaded_to_this_item" => __( "Upload to this Teams", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filter Team list", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Team list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Team list", "custom-post-type-ui" ),
		"attributes" => __( "Team attributes", "custom-post-type-ui" ),
		"name_admin_bar" => __( "Teams", "custom-post-type-ui" ),
		"item_published" => __( "Teams published", "custom-post-type-ui" ),
		"item_published_privately" => __( "Teams published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => __( "Teams reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => __( "Teams scheduled", "custom-post-type-ui" ),
		"item_updated" => __( "Teams updated.", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Teams:", "custom-post-type-ui" ),
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
		"rewrite" => [ "slug" => "team", "with_front" => true ],
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
		"name" => __( "Ranking", "custom-post-type-ui" ),
		"singular_name" => __( "Ranking", "custom-post-type-ui" ),
		"menu_name" => __( "Ranking", "custom-post-type-ui" ),
		"all_items" => __( "All Ranking", "custom-post-type-ui" ),
		"add_new" => __( "Add new", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Ranking", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Ranking", "custom-post-type-ui" ),
		"new_item" => __( "New Ranking", "custom-post-type-ui" ),
		"view_item" => __( "View Ranking", "custom-post-type-ui" ),
		"view_items" => __( "View Ranking", "custom-post-type-ui" ),
		"search_items" => __( "Search Ranking", "custom-post-type-ui" ),
		"not_found" => __( "No Ranking found", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "No Ranking found in bin", "custom-post-type-ui" ),
		"parent" => __( "Parent Ranking:", "custom-post-type-ui" ),
		"featured_image" => __( "Featured image for this Ranking", "custom-post-type-ui" ),
		"set_featured_image" => __( "Set featured image for this Ranking", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remove featured image for this Ranking", "custom-post-type-ui" ),
		"use_featured_image" => __( "Use as featured image for this Ranking", "custom-post-type-ui" ),
		"archives" => __( "Ranking archives", "custom-post-type-ui" ),
		"insert_into_item" => __( "Insert into Ranking", "custom-post-type-ui" ),
		"uploaded_to_this_item" => __( "Upload to this Ranking", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filter Ranking list", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Ranking list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Ranking list", "custom-post-type-ui" ),
		"attributes" => __( "Ranking attributes", "custom-post-type-ui" ),
		"name_admin_bar" => __( "Ranking", "custom-post-type-ui" ),
		"item_published" => __( "Ranking published", "custom-post-type-ui" ),
		"item_published_privately" => __( "Ranking published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => __( "Ranking reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => __( "Ranking scheduled", "custom-post-type-ui" ),
		"item_updated" => __( "Ranking updated.", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Ranking:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Ranking", "custom-post-type-ui" ),
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
		"rewrite" => [ "slug" => "ranking", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-megaphone",
		"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
	];

	register_post_type( "ranking", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );



	/**
	 * Post Type: Marketplace.
	 * Author: jonathan
	 */

add_action( 'init', 'custom_post_marketplace_type', 0 );
function custom_post_marketplace_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Marketplace', 'Post Type General Name' ),
        'singular_name'       => _x( 'Marketplace', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Marketplace' ),
        'parent_item_colon'   => __( 'Parent Marketplace posts' ),
        'all_items'           => __( 'All Marketplace posts' ),
        'view_item'           => __( 'View Marketplace post' ),
        'add_new_item'        => __( 'Add New Marketplace post' ),
        'add_new'             => __( 'Add New' ),
        'edit_item'           => __( 'Edit Post' ),
        'update_item'         => __( 'Update Post' ),
        'search_items'        => __( 'Search Post' ),
        'not_found'           => __( 'Not Found' ),
        'not_found_in_trash'  => __( 'Not found in Trash' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'Marketplace' ),
        'description'         => __( 'Marketplace posts news and reviews' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor',  'author', 'thumbnail',  'custom-fields' ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
    	'taxonomies'          => array( 'categorie_marketplace' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
		"rewrite" => [ "slug" => "marketplace", "with_front" => true ],
		"rest_controller_class" => "WP_REST_Posts_Controller",
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'menu_icon'           => 'dashicons-forms',
        'show_in_rest' => true,
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'marketplaces', $args );
 
}



	/**
	 * Post Type taxonomies: Marketplace.
	 * Author: jonathan
	 */

add_action( 'init', 'create_marketplace_taxonomies', 0 );
function create_marketplace_taxonomies() {

    register_taxonomy(
        'marketplace_categorie',
        'marketplaces',
        array(
            'labels' => array(
                'name' => 'Marketplace Category',
                'add_new_item' => 'Add New Categorie',
                'new_item_name' => "New Categorie"
            ),
            'show_ui' => true,
            'show_tagcloud' => true,
            'public'       => true,
            'hierarchical' => true,
            'show_ui'           => true,
	        'show_admin_column' => true,
	        'query_var'         => true,
	        'show_in_nav_menus' => true,
	        'show_in_rest' => true,
        )
    );
    register_taxonomy(
        'marketplace_tags',
        'marketplaces',
        array(
            'labels' => array(
                'name' => 'Marketplace Tags',
                'add_new_item' => 'Add New tag',
                'new_item_name' => "New Tag"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'public'       => true,
            'hierarchical' => true,
            'show_ui'           => true,
	        'show_admin_column' => true,
	        'query_var'         => true,
	        'show_in_nav_menus' => true,
	        'show_in_rest' => true,
        )
    );
    register_taxonomy(
        'marketplace_location',
        'marketplaces',
        array(
            'labels' => array(
                'name' => 'Marketplace Location',
                'add_new_item' => 'Add New location',
                'new_item_name' => "New Location"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'public'       => true,
            'hierarchical' => true,
            'show_ui'           => true,
	        'show_admin_column' => true,
	        'query_var'         => true,
	        'show_in_nav_menus' => true,
	        'show_in_rest' => true,
        )
    );
}


	/**
	 * Post Type: Events.
	 * Author: jonathan
	 */

add_action( 'init', 'custom_post_events_type', 0 );
function custom_post_events_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Events', 'Post Type General Name' ),
        'singular_name'       => _x( 'Event', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Events' ),
        'parent_item_colon'   => __( 'Parent Events posts' ),
        'all_items'           => __( 'All Events posts' ),
        'view_item'           => __( 'View Events post' ),
        'add_new_item'        => __( 'Add New Events post' ),
        'add_new'             => __( 'Add New' ),
        'edit_item'           => __( 'Edit Post' ),
        'update_item'         => __( 'Update Post' ),
        'search_items'        => __( 'Search Post' ),
        'not_found'           => __( 'Not Found' ),
        'not_found_in_trash'  => __( 'Not found in Trash' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'Events' ),
        'description'         => __( 'Events posts news and reviews' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor',  'author', 'thumbnail',  'custom-fields' ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
    	'taxonomies'          => array( 'categorie_events' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
		"rewrite" => [ "slug" => "event", "with_front" => true ],
		"rest_controller_class" => "WP_REST_Posts_Controller",
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'menu_icon'           => 'dashicons-welcome-write-blog',
        'show_in_rest' => true,
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'event', $args );
 
}



	/**
	 * Post Type taxonomies: Events.
	 * Author: jonathan
	 */

add_action( 'init', 'create_event_taxonomies', 0 );
function create_event_taxonomies() {

    register_taxonomy(
        'event_categorie',
        'event',
        array(
            'labels' => array(
                'name' => 'Event Category',
                'add_new_item' => 'Add New Categorie',
                'new_item_name' => "New Categorie"
            ),
            'show_ui' => true,
            'show_tagcloud' => true,
            'public'       => true,
            'hierarchical' => true
        )
    );
    register_taxonomy(
        'event_location',
        'event',
        array(
            'labels' => array(
                'name' => 'Event Location',
                'add_new_item' => 'Add New location',
                'new_item_name' => "New Location"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'public'       => true,
            'hierarchical' => true
        )
    );
    register_taxonomy(
        'event_tags',
        'event',
        array(
            'labels' => array(
                'name' => 'Event Tags',
                'add_new_item' => 'Add New tag',
                'new_item_name' => "New Tag"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'public'       => true,
            'hierarchical' => true
        )
    );
}




	/**
	 * Post Type taxonomies: Ranking.
	 * Author: jonathan
	 */

add_action( 'init', 'create_ranking_taxonomies', 0 );
function create_ranking_taxonomies() {

    register_taxonomy(
        'ranking_categorie',
        'ranking',
        array(
            'labels' => array(
                'name' => 'Ranking Category',
                'add_new_item' => 'Add New Categorie',
                'new_item_name' => "New Categorie"
            ),
            'show_ui' => true,
            'show_tagcloud' => true,
            'public'       => true,
            'hierarchical' => true,
            'show_ui'           => true,
	        'show_admin_column' => true,
	        'query_var'         => true,
	        'show_in_nav_menus' => true,
	        'show_in_rest' => true,
        
        )
    );
    register_taxonomy(
        'ranking_tags',
        'ranking',
        array(
            'labels' => array(
                'name' => 'Ranking Tags',
                'add_new_item' => 'Add New tag',
                'new_item_name' => "New Tag"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'public'       => true,
            'hierarchical' => true,
            'show_ui'           => true,
	        'show_admin_column' => true,
	        'query_var'         => true,
	        'show_in_nav_menus' => true,
	        'show_in_rest' => true,
        
        )
    );
}





function pagination_bar( $custom_query ) {

    $total_pages = $custom_query->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ($total_pages > 1){
    	$current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages
        ));
    }
}