<?php
/*
Template Name: HomePage
*/
?>
<?php get_header(); ?>

<div class="container" id="homepage">
	<div class="row">
		<div class="col-sm-12">
			<?php if ( have_posts() ) { ?>
				<?php while ( have_posts() ) { ?>
					<?php the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<p><?php the_content(); ?></p>
					</article>
					<!-- #post-<?php the_ID(); ?> -->
				<?php } ?>

			<?php } ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>