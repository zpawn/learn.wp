<?php get_header(); ?>

<section id="blog" class="section">
    <div class="container">
        <div class="row">
            <section id="blog-posts" class="col-sm-8">

                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : ?>
                        <?php the_post(); ?>

                        <article class="card">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="card-image">
                                    <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] ); ?>
                                </div>
                            <?php endif; ?>
                            <div class="card-content">
                                <h3>
                                    <span class="date"><?php the_time( 'd M' ); ?></span>
                                    <a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a>
                                </h3>
                                <div class="card-info">
                                    <span class="time">Posted at <?php the_time( 'g:i a' ); ?></span>
                                    <span class="tag"><?php the_category( ',' ); ?></span>
                                    <span class="post-author">
                                        by <a href="<?php the_author_link(); ?>"><?php the_author(); ?></a>
                                    </span>
                                </div>

	                            <?php if (has_post_format('quote')) : ?>
                                    <p><strong>This is a Quote Format</strong></p>
	                            <?php endif; ?>

                                <?php the_content(); ?>
                                <?php the_tags(); ?>
                            </div>

                            <nav class="text-center">
                                <ul class="pagination">
                                    <li><?php previous_post_link( '%link', '<i class="fa fa-chevron-left"></i> %title' ); ?></li>
                                    <li><?php next_post_link( '%link', '%title <i class="fa fa-chevron-right"></i>' ); ?></li>
                                </ul>
                            </nav>

                            <?php comments_template(); ?>
                        </article>

                    <?php endwhile; ?>
                <?php endif; ?>

            </section>

            <aside id="sidebar" class="col-sm-4">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</section>

<?php get_footer(); ?>
