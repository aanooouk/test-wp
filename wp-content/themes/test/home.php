<?php
/*
Template Name: HomePage
*/
?>
<?php get_header(); ?>

<?php if ( have_posts() ) { ?>
	<?php while ( have_posts() ) { ?>
		<?php the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_content(); ?>
		</article>
		<!-- #post-<?php the_ID(); ?> -->
	<?php } ?>
<?php } ?>
<?php wp_reset_postdata(); ?>

<?php test_plugin_template_tag() ?>

<?php get_footer(); ?>