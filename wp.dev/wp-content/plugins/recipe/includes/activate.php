<?php

function r_activate_plugin () {
    if ( version_compare( get_bloginfo( 'version' ), '4.9', '<' ) ) {
        wp_die( __('You must update WordPress to use this plugin'), 'recipe' );
    }

    recipe_init();
    flush_rewrite_rules();

    global $wpdb;

	$createSQL = 'CREATE TABLE IF NOT EXISTS `'. $wpdb->prefix .'recipe_rating` (
			`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			`recipe_id` BIGINT(20) UNSIGNED NOT NULL,
			`rating` FLOAT(3, 1) NOT NULL,
			`user_ip` VARCHAR(32) NOT NULL,
			PRIMARY KEY (id)
		)
		ENGINE=InnoDB '. $wpdb->get_charset_collate() .' AUTO_INCREMENT=1;';

	require( ABSPATH . '/wp-admin/includes/upgrade.php');
	dbDelta( $createSQL );

	wp_schedule_event( time(), 'daily', 'r_daily_recipe_hook' );
}
