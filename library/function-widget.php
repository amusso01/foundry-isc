<?php
/**
 * Sidebars and widgets
 *
 * @author Andrea Musso
 *
 * 
 * @package foundry
 * 
 * Register widget area.
 *
 */

function foundry_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer left', 'foundry' ),
			'id'            => 'footer-left',
			'description'   => esc_html__( 'Add widgets here.', 'foundry' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
        )
	);
	register_sidebar(
        array(
			'name'          => esc_html__( 'Footer center', 'foundry' ),
			'id'            => 'footer-center',
			'description'   => esc_html__( 'Add widgets here.', 'foundry' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
        )
	);
	register_sidebar(
        array(
			'name'          => esc_html__( 'Footer right', 'foundry' ),
			'id'            => 'footer-right',
			'description'   => esc_html__( 'Add widgets here.', 'foundry' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
        )
	);
	register_sidebar(
        array(
			'name'          => esc_html__( 'Site Ads portrait', 'foundry' ),
			'id'            => 'ads-portrait',
			'description'   => esc_html__( 'Add portrait image here.', 'foundry' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s ads-portrait">',
			'after_widget'  => '</section>'
        )
	);
	register_sidebar(
        array(
			'name'          => esc_html__( 'Site Ads landscape', 'foundry' ),
			'id'            => 'ads-landscape',
			'description'   => esc_html__( 'Add portrait image here.', 'foundry' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s ads-landscape">',
			'after_widget'  => '</section>'
        )
	);
}
add_action( 'widgets_init', 'foundry_widgets_init' );