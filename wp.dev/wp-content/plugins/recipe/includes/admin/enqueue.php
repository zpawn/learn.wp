<?php
/**
 * @link https://github.com/zpawn/CrispWP
 * @author Ilia Makarov <ilia.makarov@me.com>
 */
 
function r_admin_enqueue () {
	global $typenow;

	if ( $typenow !== 'recipe' ) {
		return;
	}

	wp_register_style( 'r_bootstrap', plugins_url( '/assets/styles/bootstrap.css', RECIPE_PLUGIN_URL ) );
	wp_enqueue_style( 'r_bootstrap' );
}
