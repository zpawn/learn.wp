<?php $theme_opts = get_option( 'wpdev_opts' ); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="shortcut icon" href="ico/favicon.png" />

    <title><?php wp_title(); ?></title>

    <?php wp_head(); ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand rippler" href="<?= get_home_url( '/' ); ?>">
                    <?php if ($theme_opts['logo_type'] == 1) : ?>
                        <?php bloginfo( 'name' ); ?>
                    <?php else : ?>
                        <img class="img-responsive" src="<?= $theme_opts['logo_img'] ?>" alt="<?php bloginfo('name')?>">
                    <?php endif; ?>
                </a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">

                <?php
                wp_nav_menu([
                    'theme_location'    => 'primary',
                    'container'         => false,
                    'menu_class'        => 'nav navbar-nav'
                ]);
                ?>

                <ul class="nav navbar-nav navbar-right">
                    <?php if ($theme_opts['twitter']) : ?>
                        <li><a href="<?= $theme_opts['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <?php endif; ?>
                    <?php if ($theme_opts['facebook']) : ?>
                        <li><a href="<?= $theme_opts['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <?php endif; ?>
                    <?php if ($theme_opts['youtube']) : ?>
                        <li><a href="<?= $theme_opts['youtube']; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>