<?php
function alpha_bootstripping() {
	load_theme_textdomain( "alpha" );
	add_theme_support( "post-thumbnails" );
	add_theme_support( "title-tag" );
	register_nav_menu( "topmenu", __( "Top Menu", "alpha" ) );
	register_nav_menu( "footermenu", __( "Footer Menu", "alpha" ) );
}

add_action( "after_setup_theme", "alpha_bootstripping" );

function alpha_assets() {
	wp_enqueue_style( "aplha", get_stylesheet_uri() );
	wp_enqueue_style( "bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" );
	wp_enqueue_style( "featherlight-css", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css" );

    wp_enqueue_script( "featherlight-js", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js", array("jquery"), "0.0.1", "true" );
}

add_action( "wp_enqueue_scripts", "alpha_assets" );

function alpha_sidebar() {
	register_sidebar(
		array(
			'name'          => __( 'Single Post Sidebar', 'alpha' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Right Sidebar', 'alpha' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Left', 'alpha' ),
			'id'            => 'footer-left',
			'description'   => __( 'Widgetized area on the left side', 'alpha' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Right', 'alpha' ),
			'id'            => 'footer-right',
			'description'   => __( 'Widgetized area on the right side', 'alpha' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
}

add_action( "widgets_init", "alpha_sidebar" );

function alpha_menu_item_class( $classes, $item ) {
	$classes[] = "list-inline-item";
	$classes[] = "test-menu";

	return $classes;
}

add_filter( "nav_menu_css_class", "alpha_menu_item_class", 10, 2 );