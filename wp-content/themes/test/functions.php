<?php

function theme_widgets_init() {
	/*register_sidebar(array(
		'name'          => 'sidebar-1',
		'id'            => "sidebar-1",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n",
	));

	register_sidebar(array(
		'name'          => 'sidebar-2',
		'id'            => "sidebar-2",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n",
	));*/

	register_sidebars(3, array(
		'name'          => 'sidebar-%d',
		'id'            => "sidebar-%d",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n",
	),array(
		'name'          => 'sidebar-%d',
		'id'            => "sidebar-%d",
		'description'   => '',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n",
	));
	
}
add_action( 'widgets_init', 'theme_widgets_init' );

function themename_custom_logo_setup() {
	$defaults = array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

add_theme_support( 'post-thumbnails' );

# set_post_thumbnail_size( 2000, 400, true );
add_image_size( 'products', 800, 600, false );
add_image_size( 'square', 256, 256, false );

add_theme_support( 'customize-selective-refresh-widgets' );