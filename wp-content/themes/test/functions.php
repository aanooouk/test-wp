<?php

//-------------------------------------
// Gestion des sidebars
function theme_widgets_init() {
    $sidebar1 = array(
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => "</h2>\n",        
        'name'          => 'sidebar-1',  
        'id'            => 'sidebar-1',
    );
    register_sidebar($sidebar1);

    $sidebar2 = array(
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => "</h2>\n",        
        'name'          => 'sidebar-2',
        'id'            => 'sidebar-2',
    );
    register_sidebar($sidebar2);

    $sidebar3 = array(
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => "</h2>\n",        
        'name'          => 'sidebar-3',
        'id'            => 'sidebar-3',
    );
    register_sidebar($sidebar3);
}
add_action( 'widgets_init', 'theme_widgets_init' );

//-------------------------------------
// Gestion du logo dynamique
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

//-------------------------------------
// Gestion des thumbnails
add_theme_support( 'post-thumbnails' );
add_image_size( 'products', 800, 600, false );
add_image_size( 'square', 256, 256, false );
add_theme_support( 'customize-selective-refresh-widgets' );

//-------------------------------------
// Gestion des custom Type
function wpdocs_codex_service_init() {
    $labels = array(
        'name'                  => _x( 'Service', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Service', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Services', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Service', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Service', 'textdomain' ),
        'new_item'              => __( 'New Service', 'textdomain' ),
        'edit_item'             => __( 'Edit Service', 'textdomain' ),
        'view_item'             => __( 'View Service', 'textdomain' ),
        'all_items'             => __( 'All Services', 'textdomain' ),
        'search_items'          => __( 'Search Services', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Services:', 'textdomain' ),
        'not_found'             => __( 'No services found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No services found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Service Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Service archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into service', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this service', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter services list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Services list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Services list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'rewrite'            => array( 'slug' => 'services' ),
        'has_archive'        => true,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt'/*, 'comments'*/ ),
    );
 
    register_post_type( 'service', $args );
}
 
add_action( 'init', 'wpdocs_codex_service_init' );