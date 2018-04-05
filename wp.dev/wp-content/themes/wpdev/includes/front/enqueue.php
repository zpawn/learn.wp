<?php

function wpdev_enqueue () {
    wp_register_style( 'wpdev_bootstrap', get_template_directory_uri() . '/assets/styles/bootstrap.css');
    wp_register_style( 'wpdev_main', get_template_directory_uri() . '/assets/styles/main.css' );
    wp_register_style( 'wpdev_roboto', '//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' );
    wp_register_style( 'wpdev_roboto_mono', '//fonts.googleapis.com/css?family=Roboto+Mono:400,300,700' );
    wp_register_style( 'wpdev_fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );

    wp_enqueue_style( 'wpdev_bootstrap' );
    wp_enqueue_style( 'wpdev_main' );
    wp_enqueue_style( 'wpdev_roboto' );
    wp_enqueue_style( 'wpdev_roboto_mono' );
    wp_enqueue_style( 'wpdev_fontawesome' );

    ////

    wp_register_script( 'wpdev_fastclick', get_template_directory_uri() . '/assets/vendor/fastclick/fastclick.js' );
    wp_register_script( 'wpdev_modernizr', get_template_directory_uri() . '/assets/vendor/modernizr/modernizr.js' );
    wp_register_script( 'wpdev_bootstrap', get_template_directory_uri() . '/assets/scripts/bootstrap.min.js', [], false, true );
    wp_register_script( 'wpdev_rippler', get_template_directory_uri() . '/assets/vendor/rippler/rippler.min.js', [], false, true );
    wp_register_script( 'wpdev_slimscroll', get_template_directory_uri() . '/assets/vendor/slimscroll/slimscroll.min.js', [], false, true );
    wp_register_script( 'wpdev_swipebox', get_template_directory_uri() . '/assets/vendor/swipebox/swipebox.min.js', [], false, true );
    wp_register_script( 'wpdev_dotdotdot', get_template_directory_uri() . '/assets/vendor/dotdotdot/dotdotdot.min.js', [], false, true );
    wp_register_script( 'wpdev_app', get_template_directory_uri() . '/assets/scripts/app.js', [], false, true );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'wpdev_fastclick' );
    wp_enqueue_script( 'wpdev_modernizr' );
    wp_enqueue_script( 'wpdev_bootstrap' );
    wp_enqueue_script( 'wpdev_rippler' );
    wp_enqueue_script( 'wpdev_slimscroll' );
    wp_enqueue_script( 'wpdev_swipebox' );
    wp_enqueue_script( 'wpdev_dotdotdot' );
    wp_enqueue_script( 'wpdev_app' );
}
