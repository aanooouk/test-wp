<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<h1>Les services</h1>

			<div class="row">
				<?php
				$args = [
				    'post_type'      => 'service',
				    'posts_per_page' => 3,
				];
				$loop = new WP_Query($args);
				while ($loop->have_posts()) {
				    $loop->the_post();
				    ?>
				    <div class="col-sm-4">
					    <div class="entry-content text-center">
					        <?php the_post_thumbnail('square', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
					    </div>
					</div>
				<?php } ?>
			</div>

			<br />

			<?php if ( have_posts() ) { ?>
				<?php while ( have_posts() ) { ?>
					<?php the_post(); ?>
					<div class="row">
						<div class="col-sm-5">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('square', ['class' => 'img-fluid img-thumbnail']); ?></a>
						</div>
						<div class="col-sm-7">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<h2><?php the_title(); ?></h2>
								<p><?php the_excerpt(); ?></p>
								<p align="right"><a href="<?php the_permalink(); ?>">Lire la suite</a></p>
							</article>
						</div>
					</div>
					<!-- #post-<?php the_ID(); ?> -->
				<?php } ?>

			<?php } ?>
		</div>
		<div class="col-sm-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>