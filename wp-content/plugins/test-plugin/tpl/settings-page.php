<div class="wrap">
    <h1>Your Plugin Page Title</h1>
    <?php settings_errors(); ?>
    <form method="post" action="options.php">
        <?php settings_fields( 'plugin-settings-group' ); ?>
        <?php do_settings_sections( 'example_options' ); ?>

        <?php submit_button(); ?>
    </form>
</div>