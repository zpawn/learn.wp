<?php

add_action( 'wp_enqueue_scripts', function () {

	wp_register_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_register_style( 'child-style', get_stylesheet_uri() );

	wp_enqueue_style( 'parent-style' );
	wp_enqueue_style( 'child-style' );
} );
