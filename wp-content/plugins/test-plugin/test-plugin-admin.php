<?php

function options_test_plugin() {
	require_once('tpl/settings-page.php');
}

function register_test_plugin_settings() {
	register_setting( 'plugin-settings-group', 'number' );
    add_settings_section('plugin-settings-options', 'Plugin settings options', 'plugin_settings_options', "options-test-plugin");
    add_settings_field('number', 'Nombre d\'éléments', 'number_name', 'options-test-plugin', 'plugin-settings-options');
}

function plugin_settings_options() {
    echo "Gérer les options du plugin";
}

function number_name() {
    $number = esc_attr(get_option('number'));
    echo '<input type="text" name="number" value="'.$number.'" placeholder="Nombre de post" />';
}

function add_menu() {
	add_menu_page('Option Test Plugin', 'Option Test Plugin', 4, 'options-test-plugin', 'options_test_plugin');

	add_action( 'admin_init', 'register_test_plugin_settings' );
}

add_action('admin_menu', 'add_menu');