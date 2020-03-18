<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
        <?php wp_head(); ?>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <?php if (function_exists('the_custom_logo')) {
                    if (has_custom_logo()) {
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                        echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" />';
                    }
                } ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php 
                wp_nav_menu([
                    'theme_location'    => 'menu-top',
                    'container'         =>  false,
                    'menu_class'        =>  'navbar-nav mr-auto'
                ]);
            ?>
            </div>
        </nav>


        