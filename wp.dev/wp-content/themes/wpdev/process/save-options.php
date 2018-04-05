<?php

function wpdev_save_options () {
    if ( !current_user_can( 'edit_theme_options' ) && $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        wp_die( __( 'You are not allowed to be on this page.' ) );
    }

    check_admin_referer( 'wpdev_options_verify' );

    $opts = get_option( 'wpdev_opts' );

    $opts['facebook']   = sanitize_text_field( $_REQUEST['wpdev_inputFacebook'] );
    $opts['twitter']    = sanitize_text_field( $_REQUEST['wpdev_inputTwitter'] );
    $opts['youtube']    = sanitize_text_field( $_REQUEST['wpdev_inputYoutube'] );
    $opts['logo_type']  = absint( $_REQUEST['wpdev_inputLogoType'] );
    $opts['footer']     = $_REQUEST['wpdev_inputFooter'];
    $opts['logo_img']   = esc_url_raw($_REQUEST['wpdev_inputLogoImg']);

    update_option( 'wpdev_opts', $opts );

    wp_redirect( admin_url( 'admin.php?page=wpdev_theme_opts&status=1' ) );
}

