<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php wp_title(); ?></title>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php if (function_exists('the_custom_logo')) {
                    if (has_custom_logo()) {
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                        echo '<div class="col-sm-2 text-center">';
                        echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" />';
                        echo "</div>";
                        echo '<div class="col-sm-10">';
                    } else {
                        echo '<div class="col-sm-12">';
                    }
                } else {
                    echo '<div class="col-sm-12">';
                } ?>
            
            <?php wp_nav_menu('menu-top') ?>
            <?php
                        echo "</div>";
            echo "</div>"; ?>
        </div>