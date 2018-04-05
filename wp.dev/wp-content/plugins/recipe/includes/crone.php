<?php
/**
 * @link https://github.com/zpawn/CrispWP
 * @author Ilia Makarov <ilia.makarov@me.com>
 */

function r_generate_daily_recipe () {
	global $wpdb;

	$recipe_id = $wpdb->get_var("
		SELECT `ID` FROM `'. $wpdb->posts .'` 
		WHERE post_status='publish' AND post_type='recipe'
		ORDER BY rand() LIMIT 1
	");

	set_transient( 'r_daily_recipe', $recipe_id, 60 * 60 * 24 );
}
