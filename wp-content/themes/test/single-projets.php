<?php get_header(); ?>
<?php if ( have_posts() ) { ?>
	<?php while ( have_posts() ) { ?>
		<?php the_post(); ?>

		<div class="container mt-4">
			<div class="row">
				<div class="col-sm-8">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<h1><?php the_title(); ?></h1>
								<p><?php the_content(); ?></p>
							</article>
							<!-- #post-<?php the_ID(); ?> -->
				</div>
				<div class="col-sm-4">
					<?php require_once('sidebar-projet.php'); ?>
				</div>
			</div>
		</div>

	<?php } ?>
<?php } ?>

<?php get_footer(); ?>