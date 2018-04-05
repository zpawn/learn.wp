<?php
get_header();

$query = new WP_Query([
	'post_type' => 'recipe',
	'posts_per_page' => 1,
	'orderby' => 'rand'
]);

?>

<section id="blog" class="section">
	<div class="container">
		<div class="row">
			<section id="blog-posts" class="col-sm-8">

				<article class="card">
					<div class="card-content">
						<h1>Recipe</h1>

						<?php if ( $query->have_posts() ) : ?>
							<ul>
								<?php while ( $query->have_posts() ) : $query->the_post(); ?>

									<li>
										<a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a>
									</li>

									<?php wp_reset_postdata(); ?>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div>
				</article>

				<nav class="text-center">
					<ul class="pagination">
						<li><?php previous_posts_link( '<i class="fa fa-chevron-left"></i>' ); ?></li>
						<li><?php next_posts_link( '<i class="fa fa-chevron-right"></i>' ); ?></li>
					</ul>
				</nav>

			</section>

			<aside id="sidebar" class="col-sm-4">
				<?php get_sidebar(); ?>
			</aside>
		</div>
	</div>
</section>

<?php get_footer(); ?>
