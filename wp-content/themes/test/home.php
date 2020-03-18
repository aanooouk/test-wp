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

<?php $services = new WP_Query(array(
	'post_type' => 'service'
)); ?>
<?php if ($services->have_posts()) { ?>
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
			<?php while ($services->have_posts()) { ?>
				<?php $services->the_post(); ?>
				<div class="col-sm-4">
					<div class="card" id="card-<?php the_ID(); ?>" style="">
						<a href="">
							<?php the_post_thumbnail('large', ['class' => 'card-img-top']); ?>
						</a>
						<div class="card-body">
							<h5 class="card-title"><?php the_title(); ?></h5>
							<p class="card-text"><?php the_excerpt(); ?></p>
							<a href="<?php the_permalink(); ?>" class="btn btn-primary">En savoir plus</a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
<?php } ?>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>