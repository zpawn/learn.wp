<?php

//*** Set Up
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-formats', [ 'link', 'quote', 'video' ] );

//*** Includes
include( get_template_directory() . '/includes/front/enqueue.php' );
include( get_template_directory() . '/includes/setup.php' );
include( get_template_directory() . '/includes/widgets.php' );
include( get_template_directory() . '/includes/activate.php' );
include( get_template_directory() . '/includes/admin/menus.php' );
include( get_template_directory() . '/includes/admin/options-page.php' );
include( get_template_directory() . '/includes/admin/init.php' );
include( get_template_directory() . '/process/save-options.php' );
require( get_template_directory() . '/includes/shortcodes/facebook.php' );
require( get_template_directory() . '/includes/theme-customizer.php' );
require( get_template_directory() . '/includes/front/head.php' );
require( get_template_directory() . '/includes/libs/class-tgm-plugin-activation.php' );
require( get_template_directory() . '/includes/register-plugins.php' );

//*** Action & Filter Hooks
add_action( 'wp_enqueue_scripts', 'wpdev_enqueue' );
add_action( 'after_setup_theme', 'wpdev_setup_theme' );
add_action( 'widgets_init', 'wpdev_widgets' );
add_action( 'after_switch_theme', 'wpdev_activate' );
add_action( 'admin_menu', 'wpdev_admin_menu' );
add_action( 'admin_init', 'wpdev_admin_init' );
add_action( 'customize_register', 'wpdev_customize_register' );
add_action( 'wp_head', 'wpdev_head' );
add_action( 'tgmpa_register', 'wpdev_register_required_plugins' );

//*** Shortcodes
add_shortcode( 'ufb', 'wpdev_facebook_shortcode' );
add_shortcode( 'ui', 'wpdev_icon_shortcode' );
