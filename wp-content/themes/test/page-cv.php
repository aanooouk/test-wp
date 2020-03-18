<?php
/*
Template Name: CV Page
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

<?php get_footer(); ?>