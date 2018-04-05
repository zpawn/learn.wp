<?php

function wpdev_admin_enqueue () {

    if ( !isset($_REQUEST['page']) || $_REQUEST['page'] != 'wpdev_theme_opts' ) {
        return;
    }

    wp_register_style( 'wpdev_bootstrap', get_template_directory_uri() . '/assets/styles/bootstrap.css');
    wp_enqueue_style( 'wpdev_bootstrap' );

    wp_register_script( 'wpdev_options', get_template_directory_uri() . '/assets/scripts/options.js', [], false, true);
    wp_enqueue_media();
    wp_enqueue_script( 'wpdev_options' );
}
