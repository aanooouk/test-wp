<?php

require_once('config/metas.php');

//-------------------------------------
// Gestion du thème et activation des supports
function theme_supports()
{
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('post-thumbnails'); // Image à la une
    add_theme_support('title-tag'); // Affichage titre dans les pages via wp_head()
    add_theme_support('menus'); // Ajout du spport des menus
    add_theme_support('custom-logo'); // Pour pouvoir modifier le logo

    register_nav_menu('menu-top', 'Menu en haut de la page');
}
add_action('after_setup_theme', 'theme_supports');

//-------------------------------------
// Gestion des sidebars
function theme_widgets_init() {
    $sidebar1 = array(
        'before_widget' => '<div id="%1$s" class="widget %2$s col-6">',
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
/*function themename_custom_logo_setup() {
	$defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
	);
	add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'themename_custom_logo_setup');*/

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
 
    register_post_type('service', $args);
}
add_action('init', 'wpdocs_codex_service_init');

//-------------------------------------
// Pour ajouter bootstrap
function montheme_register_assets()
{
    wp_register_style('bootstrap', get_stylesheet_directory_uri().'/css/bootstrap.min.css', []);
    wp_register_script('bootstrap', get_stylesheet_directory_uri().'/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper', get_stylesheet_directory_uri().'/js/popper.min.js', [], false, true);
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_stylesheet_directory_uri().'/js/jquery-3.2.1.slim.min.js', [], false, true);
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts', 'montheme_register_assets');

//-------------------------------------
// Pour theme bootstrap
function theme_menu_class()
{
    $classes[] = 'nav-item';
    return $classes;
}
add_filter('nav_menu_css_class', 'theme_menu_class');

function theme_menu_link_class($attrs)
{
    $attrs['class'] = 'nav-link';
    return $attrs;
}
add_filter('nav_menu_link_attributes', 'theme_menu_link_class');

//-------------------------------------
// Display notice message
function general_admin_notice(){
    global $pagenow;
    if ( $pagenow == 'index.php' ) {
         echo '<div class="notice notice-warning is-dismissible">
             <p>This notice appears on the settings page.</p>
         </div>';
    }
}
add_action('admin_notices', 'general_admin_notice');