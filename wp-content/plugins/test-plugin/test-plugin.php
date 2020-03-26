<?php
/**
 * Plugin Name: Test Plugin
 */

function getPosts() {
    $services = new WP_Query(array(
        'post_type'         => 'service',
        'posts_per_page'    => esc_attr(get_option('number')),
    ));

    $posts = [];

    if ($services->have_posts()) {
        while ($services->have_posts()) {
            $services->the_post();
            $posts[] = array(
                'id'        => get_the_ID(),
                'title'     => get_the_title(),
                'excerpt'   => get_the_excerpt(),
                'permalink' => get_the_permalink(),
                'thumbnail' => get_the_post_thumbnail_url()
            );
        }
    };
    wp_reset_postdata();

    return $posts;
}

function test_plugin_template_tag() {
    $posts = getPosts(); ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="wp-block-uagb-advanced-heading">
                        <h2 class="uagb-heading-text">Nos services</h2>
                        <div class="uagb-separator-wrap">
                            <div class="uagb-separator"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($posts as $post) { ?>
                    <div class="col-sm-4">
                        <div class="card" id="card-<?php echo $post['id']; ?>" style="">
                            <a href=""> 
                                <img src="<?php echo $post['thumbnail']; ?>" class="card-img-top" alt="<?php echo $post['title']; ?>" />    
                            </a>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $post['title']; ?></h5>
                                <p class="card-text"><?php echo $post['excerpt']; ?></p>
                                <a href="<?php echo $post['permalink']; ?>" class="btn btn-primary">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php
}

add_shortcode('testplugin', 'testplugin');

function testplugin(){
    $posts = getPosts();
    return "toto";
}

/*function test_plugin() {
    echo "Test plugin chargé !";
}
add_action( 'wp_loaded', 'test_plugin' );*/


add_action("admin_menu", "addMenu");

function addMenu()
{
    add_menu_page("Exemple Options", "Example Options", 4, 'example-options', 'exampleMenu');
    add_submenu_page("example_options", "Submenu Exemple 1", "Submenu Exemple 1", 0, "example-options-sub1", "option1");

    // Pour gérer les champs
	add_action( 'admin_init', 'register_plugin_settings' );
}

function register_plugin_settings() {
    register_setting( 'plugin-settings-group', 'number' );
    add_settings_section('plugin-settings-options', 'Plugin settings options', 'plugin_settings_options', "example_options");
    add_settings_field('number', 'Nombre d\'éléments', 'number_name', 'example_options', 'plugin-settings-options');
}

function number_name() {
    $number = esc_attr(get_option('number'));
    echo '<input type="text" name="number" value="'.$number.'" placeholder="Nombre de post" />';
}

function plugin_settings_options() {
    echo "Gérer les options du plugin";
}

function exampleMenu() {
    echo "exampleMenu";
}

function option1() {
    require_once 'tpl/settings-page.php';
}

?>