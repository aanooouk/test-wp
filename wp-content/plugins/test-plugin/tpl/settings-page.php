<form method="post" action="options.php">
	<h1>Option Test Plugin</h1>
	<?php settings_errors(); ?>
	
	<?php settings_fields('plugin-settings-group'); ?>
	<?php do_settings_sections('options-test-plugin'); ?>

	<?php submit_button(); ?>
</form>