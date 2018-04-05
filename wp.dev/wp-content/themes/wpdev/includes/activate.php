<?php

function wpdev_activate () {

    if ( version_compare( get_bloginfo( 'version' ), '4.9', '<' ) ) {
        wp_die( __('You must have a minimum version of 4.9 to use this theme') );
    }

    $theme_opts = get_option( 'wpdev_opts' );

    if ( !$theme_opts ) {
        $opts = [
            'facebook'  => '',
            'twitter'   => '',
            'youtube'   => '',
            'logo_type' => 1,   // 1 - text, 2 - image
            'logo_img'  => '',
            'footer'    => ''
        ];

        add_option( 'wpdev_opts', $opts );
    }
}
