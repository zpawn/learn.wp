<?php

function wpdev_widgets () {
    register_sidebar([
        'name'          => __( 'My first theme sidebar', 'wpdev' ),
        'id'            => 'wpdev_sidebar',
        'description'   => __( 'Sidebar for the theme WpDev', 'wpdev' ),
        'class'         => '',

        'before_widget' => '<div id="%1$s" class="card %2$s">',
        'before_title'  => '<div class="card-header bg-primary"><span class="card-title">',
        'after_title'   => '</span></div><div class="card-content"><div class="widget">',
        'after_widget'  => '</div></div></div>',
    ]);
}
