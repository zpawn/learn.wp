<?php
/**
 * @link https://github.com/zpawn/CrispWP
 * @author Ilia Makarov <ilia.makarov@me.com>
 */

function r_create_metaboxes () {
	add_meta_box(
		'r_recipe_options_mb',
		__( 'Recipe Options', 'recipe' ),
		'r_recipe_options_mb',
		'recipe',
		'normal',
		'high'
	);
}
