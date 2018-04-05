<?php
/**
* @package   Venice
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get theme configuration
include($this['path']->path('layouts:theme.config.php'));

?>
<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>"  data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>

<head>
<?php echo $this['template']->render('head'); ?>
</head>

<body class="<?php echo $this['config']->get('body_classes'); ?>">

    <?php if ($this['widgets']->count('toolbar-l + toolbar-r')) : ?>
    <div class="tm-toolbar uk-clearfix uk-hidden-small">
        <div class="uk-container uk-container-center">

            <?php if ($this['widgets']->count('toolbar-l')) : ?>
            <div class="uk-float-left"><?php echo $this['widgets']->render('toolbar-l'); ?></div>
            <?php endif; ?>

            <?php if ($this['widgets']->count('toolbar-r')) : ?>
            <div class="uk-float-right"><?php echo $this['widgets']->render('toolbar-r'); ?></div>
            <?php endif; ?>

        </div>
    </div>
    <?php endif; ?>

    <?php if ($this['widgets']->count('menu + logo')) : ?>
    <nav class="tm-navbar uk-navbar<?php echo $this['widgets']->count('fullscreen') !== 0 ? '' : ' uk-navbar-attached'; echo $this['config']->get('navbar_fullscreen_contrast') ? ' tm-navbar-fullscreen-contrast' : '' ; ?>">
        <div class="uk-container uk-container-center">
            <div class="tm-navbar-wrapper<?php echo $this['config']->get('centered_logo') ? ' tm-logo-center' : '' ; ?>">

                <?php if ($this['widgets']->count('logo')) : ?>
                <div class="uk-text-center tm-nav-logo uk-visible-large">
                    <a class="tm-logo uk-visible-large" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo'); ?></a>
                </div>
                <?php endif; ?>

                <?php if ($this['widgets']->count('menu')) : ?>
                <div class="tm-nav uk-visible-large">
                    <div class="tm-nav-wrapper<?php echo $this['widgets']->count('socialbar') && !$this['config']->get('centered_logo') ? ' tm-nav-wrapper-margin' : '' ; ?>"><?php echo $this['widgets']->render('menu'); ?></div>
                </div>
                <?php endif; ?>

                <?php if ($this['widgets']->count('offcanvas')) : ?>
                <a href="#offcanvas" class="uk-navbar-toggle uk-hidden-large" data-uk-offcanvas></a>
                <?php endif; ?>

                <?php if ($this['widgets']->count('logo-small')) : ?>
                <div class="uk-navbar-content uk-navbar-center uk-hidden-large"><a class="tm-logo-small" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo-small'); ?></a></div>
                <?php endif; ?>

            </div>

            <?php if ($this['widgets']->count('socialbar')) : ?>
            <div class="tm-socialbar uk-text-center">
                <?php echo $this['widgets']->render('socialbar'); ?>
            </div>
            <?php endif; ?>

        </div>
    </nav>
    <?php endif; ?>

    <?php if ($this['widgets']->count('fullscreen')) : ?>
    <div class="tm-fullscreen">
        <?php echo $this['widgets']->render('fullscreen'); ?>
    </div>
    <?php endif; ?>

    <div class="tm-wrapper">

        <?php if ($this['widgets']->count('search')) : ?>
        <div class="tm-block tm-block-search uk-hidden-small uk-text-center">
            <div class="uk-container uk-container-center">
                <?php echo $this['widgets']->render('search'); ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('top-a')) : ?>
            <div class="tm-block tm-block-top-a<?php echo @$block_classes['top-a']; echo $display_classes['top-a']; ?>">
                <div>
                    <div class="uk-container uk-container-center">
                        <section class="<?php echo @$grid_classes['top-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-a', array('layout'=>$this['config']->get('grid.top-a.layout'))); ?></section>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('top-b')) : ?>
        <div class="tm-block tm-block-top-b<?php echo @$block_classes['top-b']; echo $display_classes['top-b']; ?>">
            <div>
                <div class="uk-container uk-container-center">
                    <section class="<?php echo @$grid_classes['top-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('top-b', array('layout'=>$this['config']->get('grid.top-b.layout'))); ?></section>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('main-top + main-bottom + sidebar-a + sidebar-b') || $this['config']->get('system_output', true)) : ?>
            <div class="tm-block tm-block-middle">
                <div>
                    <div class="uk-container uk-container-center">

                        <?php if ($this['config']->get('system_output', true)) : ?>
                            <?php if ($this['widgets']->count('breadcrumbs')) : ?>
                            <?php echo $this['widgets']->render('breadcrumbs'); ?>
                            <?php endif; ?>
                        <?php endif; ?>

                        <div class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

                            <?php if ($this['widgets']->count('main-top + main-bottom') || $this['config']->get('system_output', true)) : ?>
                            <div class="<?php echo $columns['main']['class'] ?>">

                                <?php if ($this['widgets']->count('main-top')) : ?>
                                <section class="<?php echo @$grid_classes['main-top']; echo $display_classes['main-top']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-top', array('layout'=>$this['config']->get('grid.main-top.layout'))); ?></section>
                                <?php endif; ?>

                                <?php if ($this['config']->get('system_output', true)) : ?>
                                <main class="tm-content">

                                    <?php echo $this['template']->render('content'); ?>

                                </main>
                                <?php endif; ?>

                                <?php if ($this['widgets']->count('main-bottom')) : ?>
                                <section class="<?php echo @$grid_classes['main-bottom']; echo $display_classes['main-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('main-bottom', array('layout'=>$this['config']->get('grid.main-bottom.layout'))); ?></section>
                                <?php endif; ?>

                            </div>
                            <?php endif; ?>

                            <?php foreach($columns as $name => &$column) : ?>
                            <?php if ($name != 'main' && $this['widgets']->count($name)) : ?>
                            <aside class="<?php echo $column['class'] ?>"><?php echo $this['widgets']->render($name) ?></aside>
                            <?php endif ?>
                            <?php endforeach ?>

                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

        <?php if ($this['widgets']->count('bottom-a')) : ?>
        <div class="tm-block tm-block-bottom-a<?php echo @$block_classes['bottom-a']; echo $display_classes['bottom-a']; ?>">
            <div>
                <div class="uk-container uk-container-center">
                    <section class="<?php echo @$grid_classes['bottom-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-a', array('layout'=>$this['config']->get('grid.bottom-a.layout'))); ?></section>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('bottom-b')) : ?>
        <div class="tm-block tm-block-bottom-b<?php echo @$block_classes['bottom-b']; echo $display_classes['bottom-b']; ?>">
            <div>
                <div class="uk-container uk-container-center">
                    <section class="<?php echo @$grid_classes['bottom-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-b', array('layout'=>$this['config']->get('grid.bottom-b.layout'))); ?></section>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('bottom-c + footer + debug') || $this['config']->get('warp_branding', true) || $this['config']->get('totop_scroller', true)) : ?>

        <div class="tm-block tm-bottom<?php echo @$block_classes['bottom']; ?>">

            <?php if ($this['widgets']->count('bottom-c')) : ?>
            <div class="tm-bottom-c<?php echo $display_classes['bottom-c']; ?>">
                <div>
                    <div class="uk-container uk-container-center">
                        <section class="<?php echo @$grid_classes['bottom-c']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin><?php echo $this['widgets']->render('bottom-c', array('layout'=>$this['config']->get('grid.bottom-c.layout'))); ?></section>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($this['widgets']->count('footer + debug') || $this['config']->get('warp_branding', true) || $this['config']->get('totop_scroller', true)) : ?>
            <footer class="tm-footer uk-text-center">

                <?php
                    echo $this['widgets']->render('footer');
                    $this->output('warp_branding');
                    echo $this['widgets']->render('debug');
                ?>

                <?php if ($this['config']->get('totop_scroller', true)) : ?>
                    <div>
                        <a class="uk-button uk-button-small tm-totop-scroller" data-uk-smooth-scroll href="#"><i class="uk-icon-chevron-up"></i></a>
                    </div>
                <?php endif; ?>

            </footer>
            <?php endif; ?>

        </div>

        <?php endif ?>

    </div>

    <?php echo $this->render('footer'); ?>

    <?php if ($this['widgets']->count('offcanvas')) : ?>
    <div id="offcanvas" class="uk-offcanvas">
        <div class="uk-offcanvas-bar"><?php echo $this['widgets']->render('offcanvas'); ?></div>
    </div>
    <?php endif; ?>

</body>
</html>
