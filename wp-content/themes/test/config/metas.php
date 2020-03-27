<?php

add_action('admin_init', 'init_meta');
add_action('save_post', 'save_meta');




add_action('admin_enqueue_scripts', function(){
    wp_register_script('uploaderjs', get_template_directory_uri().'/js/uploader.js');
    wp_enqueue_script('uploaderjs');
});

function init_meta () {
    if(function_exists('add_meta_box')) {
        add_meta_box('info', 'Information', 'render_meta_box', 'service');
    }
}

function render_meta_box() {
    global $post;

    $value = get_post_meta($post->ID, 'background', true);
    $nonce = wp_create_nonce('background');
    ?>
    <input type="text" name="background" id="background" value="<?php echo $value; ?>" />
    <a href="#" class="button js-uploader" data-id="background">
        Uploader
    </a>
    <input type="hidden" name="background_nonce" value="<?php echo $nonce; ?>" />
    <?php
}

function save_meta($post_id) {
    $value = $_POST['background'];

    if (!isset($_POST['background'])) {
        return false;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return false;
    }

    if (!wp_verify_nonce($_POST['background_nonce'], 'background')) {
        return false;
    }

    if (get_post_meta($post_id, 'background')) {
        update_post_meta($post_id, 'background', $value);
    } else if ($value === '') {
        delete_post_meta($post_id, 'background');
    } else {
        add_post_meta($post_id, 'background', $value);
    }
}