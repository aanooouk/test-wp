<?php get_header(); ?>
<div class="container mt-4">
	<div class="row">
		<div class="col-sm-8">
			<?php if ( have_posts() ) { ?>
				<?php while ( have_posts() ) { ?>
					<?php the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php the_content(); ?>
					</article>
					<!-- #post-<?php the_ID(); ?> -->
				<?php } ?>

			<?php } ?>
		</div>
		<div class="col-sm-4">
			<?php require_once('sidebar-projet.php'); ?>
			<?php require_once('sidebar-service.php'); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>