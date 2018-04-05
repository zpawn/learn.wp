 <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

    <article class="uk-article" data-permalink="<?php the_permalink(); ?>">

        <?php if (has_post_thumbnail()) : ?>
            <?php
            $width = get_option('thumbnail_size_w'); //get the width of the thumbnail setting
            $height = get_option('thumbnail_size_h'); //get the height of the thumbnail setting
            ?>
            <div class="tm-featured-image"><?php the_post_thumbnail(array($width, $height), array('class' => '')); ?></div>
        <?php endif; ?>

        <h1 class="uk-article-title"><?php the_title(); ?></h1>

        <?php the_content(''); ?>

        <?php wp_link_pages(); ?>

        <?php the_tags('<p>'.__('Tags: ', 'warp'), ', ', '</p>'); ?>

        <p class="uk-article-meta">
            <?php
                $date = '<span class="tm-article-date"><time datetime="'.get_the_date('Y-m-d').'" pubdate>'.get_the_date().'</time></span>';
                printf(__('%s %s %s', 'warp'), '<span class="tm-article-author uk-visible-large"><a href="'.get_author_posts_url(get_the_author_meta('ID')).'" title="'.get_the_author().'">'.get_the_author().'</a></span>', $date, '<span class="tm-article-category uk-visible-large">'.get_the_category_list(', ').'</span>');
            ?>
        </p>

        <?php edit_post_link(__('Edit this post.', 'warp'), '<p><i class="uk-icon-pencil"></i> ','</p>'); ?>

        <?php if (pings_open()) : ?>
        <p><?php printf(__('<a href="%s">Trackback</a> from your site.', 'warp'), get_trackback_url()); ?></p>
        <?php endif; ?>

        <?php if (get_the_author_meta('description')) : ?>
        <div class="uk-panel uk-panel-box">

            <div class="uk-align-medium-left">

                <?php echo get_avatar(get_the_author_meta('user_email')); ?>

            </div>

            <h2 class="uk-h3 uk-margin-top-remove"><?php the_author(); ?></h2>

            <div class="uk-margin"><?php the_author_meta('description'); ?></div>

        </div>
        <?php endif; ?>

        <?php comments_template(); ?>

    </article>

    <?php endwhile; ?>
 <?php endif; ?>