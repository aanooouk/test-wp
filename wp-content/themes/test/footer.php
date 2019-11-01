	<div id="footer">
		<div class="container">
			<div class="row footer-1">
				<div class="col-sm-12">
					<?php dynamic_sidebar("sidebar-2"); ?>
				</div>
			</div>
			<div class="row footer-2">
				<div class="col-sm-12">
					<?php dynamic_sidebar("sidebar-3"); ?>
				</div>
			</div>
		</div>
	</div>
		<?php wp_footer(); ?>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-3.3.1.slim.min.js"></script>
	    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/popper.min.js"></script>
	    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
	</body>
</html>