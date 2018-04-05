<?php

/**
 * Plugin Name: Recipe
 * Description: A simple WordPress plugin that allows users to create recipe and rate those recipe.
 * Version: 1.0
 * Author: Ilia Makarov
 * Author URI: //github.com/zpawn
 * Text Domain: recipe
 */

if ( !function_exists( 'add_action' ) ) {
    echo 'Not allowed!';
    exit;
}

//*** Setups
define( 'RECIPE_PLUGIN_URL', __FILE__ );

//*** Includes
include( 'includes/helpers.php' );
include( 'includes/activate.php' );
include( 'includes/deactivate.php' );
include( 'includes/init.php' );
include( 'includes/admin/init.php' );
include( 'process/save-post.php' );
include( 'process/filter-content.php' );
include( 'includes/front/enqueue.php' );
include( 'process/rate-recipe.php' );
include( dirname(RECIPE_PLUGIN_URL) . '/includes/widgets.php' );
include( dirname(RECIPE_PLUGIN_URL) . '/includes/widgets/daily-recipe.php' );
include( 'includes/crone.php' );
include( 'includes/shortcodes/creator.php' );
include( 'process/submit-user-recipe.php' );
require( 'includes/admin/dashboard-widgets.php' );
require( 'includes/textdomain.php' );

//*** Hooks
register_activation_hook( __FILE__, 'r_activate_plugin' );
register_deactivation_hook( __FILE__, 'r_deactivate_plugin' );
add_action( 'init', 'recipe_init' );
add_action( 'admin_init', 'recipe_admin_init' );
add_action( 'save_post_recipe', 'r_save_post_admin', 10, 3 );
add_filter( 'the_content', 'r_filter_recipe_content' );
add_action( 'wp_enqueue_scripts', 'r_enqueue_scripts', 9999 );

/** @see https://codex.wordpress.org/AJAX_in_Plugins */
add_action( 'wp_ajax_r_rate_recipe', 'r_rate_recipe' );
add_action( 'wp_ajax_nopriv_r_rate_recipe', 'r_rate_recipe' );
add_action( 'wp_ajax_r_submit_user_recipe', 'r_submit_user_recipe' );
add_action( 'wp_ajax_nopriv_r_submit_user_recipe', 'r_submit_user_recipe' );

add_action( 'widgets_init', 'r_widgets_init' );
add_action( 'r_daily_recipe_hook', 'r_generate_daily_recipe' );
add_action( 'wp_dashboard_setup', 'r_add_dashboard_widgets' );
add_action( 'plugins_loaded', 'r_load_textdomain' );

//*** Shortcodes
add_shortcode( 'recipe_creator', 'r_recipe_creator_shortcode' );
