<?php
/**
 * @link https://github.com/zpawn/CrispWP
 * @author Ilia Makarov <ilia.makarov@me.com>
 */
 
function r_deactivate_plugin () {
	wp_clear_scheduled_hook( 'r_daily_recipe_hook' );
}
