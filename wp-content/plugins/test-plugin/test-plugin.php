<?php
/**
 * Plugin Name: Test Plugin
 */

function test_plugin_template_tag() {
    echo "test plugin template tag";
}

function test_plugin() {
    echo "test plugin";
}

add_action( 'wp_loaded', 'test_plugin' );

?>