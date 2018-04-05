<?php
/**
* @package   Venice
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/
/**
* @package   Venice
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/
    global $tm_count, $post;
    if (!isset($tm_count)) {
        $tm_count = 1;
    }
    else {
        $tm_count++;
    }
?>

<?php if ($this['config']->get('article_style')=='tm-article-blog') : ?>
<article id="item-<?php the_ID(); ?>" class="uk-article tm-article-blog-featured-image" data-permalink="<?php the_permalink(); ?>">

<div class="uk-grid" data-uk-grid-match>

    <?php if (has_post_thumbnail()) : ?>

        <?php
            $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
        ?>

        <div class="uk-width-medium-1-2 <?php echo (($tm_count) % 2 == 1) ? 'uk-flex-order-first-medium' : 'uk-float-right uk-flex-order-last-medium' ?> tm-article-blog-image">
            <a href="<?php the_permalink() ?>" style="background-image:url(<?php echo $image_url[0] ?>);" title="<?php the_title_attribute(); ?>"></a>
        </div>

        <div class="uk-width-medium-1-2 tm-article-blog-content uk-flex uk-flex-middle">
        <div>

            <h1 class="uk-article-title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

            <?php the_content(''); ?>

            <?php if(strpos($post->post_content, '<!--more-->')): ?>
                <a class="uk-button uk-button-large" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php _e('Continue Reading', 'warp'); ?></a>
            <?php endif; ?>

            <p>
                <?php if(comments_open() || get_comments_number()) : ?>
                    <?php comments_popup_link(__('No Comments', 'warp'), __('1 Comment', 'warp'), __('% Comments', 'warp'), "uk-margin-right", ""); ?>
                <?php endif; ?>
                <?php edit_post_link(__('Edit this post.', 'warp'), '<i class="uk-icon-pencil"></i> ',''); ?>
            </p>

        </div>

        </div>

    <?php endif; ?>

</div>

</article>

<?php else : ?>

<article id="item-<?php the_ID(); ?>" class="uk-article" data-permalink="<?php the_permalink(); ?>">

    <?php if (has_post_thumbnail()) : ?>
        <?php
        $width = get_option('thumbnail_size_w'); //get the width of the thumbnail setting
        $height = get_option('thumbnail_size_h'); //get the height of the thumbnail setting
        ?>
        <a class="tm-featured-image" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(array($width, $height), array('class' => '')); ?></a>
    <?php endif; ?>

    <h1 class="uk-article-title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

    <?php the_content(''); ?>

    <ul class="uk-subnav uk-subnav-line">
        <li><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php _e('Continue Reading', 'warp'); ?></a></li>
        <?php if(comments_open() || get_comments_number()) : ?>
            <li><?php comments_popup_link(__('No Comments', 'warp'), __('1 Comment', 'warp'), __('% Comments', 'warp'), "", ""); ?></li>
        <?php endif; ?>
    </ul>

    <p class="uk-article-meta">
        <?php
            $date = '<span class="tm-article-date"><time datetime="'.get_the_date('Y-m-d').'">'.get_the_date().'</time></span>';
            printf(__('%s %s %s', 'warp'), '<span class="tm-article-author uk-visible-large"><a href="'.get_author_posts_url(get_the_author_meta('ID')).'" title="'.get_the_author().'">'.get_the_author().'</a></span>', $date, '<span class="tm-article-category uk-visible-large">'.get_the_category_list(', ').'</span>');
        ?>
    </p>

    <?php edit_post_link(__('Edit this post.', 'warp'), '<p><i class="uk-icon-pencil"></i> ','</p>'); ?>

</article>

<?php endif; ?>