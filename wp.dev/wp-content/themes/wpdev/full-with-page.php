<?php
/*
 * Template Name: Full Width Page
 */
?>

<?php get_header(); ?>

<section id="blog" class="section">
    <div class="container">
        <div class="row">
            <section id="blog-posts" class="col-sm-12">

                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : ?>
                        <?php the_post(); ?>

                        <article class="card">
                            <div class="card-content">
                                <h3>
                                    <span class="date"><?php the_time( 'd M' ); ?></span>
                                    <a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a>
                                </h3>
                            </div>

                            <?php the_content(); ?>
                            <?php comments_template(); ?>
                        </article>

                    <?php endwhile; ?>
                <?php endif; ?>

            </section>
        </div>
    </div>
</section>

<?php get_footer(); ?>
