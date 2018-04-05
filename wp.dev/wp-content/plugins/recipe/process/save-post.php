<?php
/**
 * @link https://github.com/zpawn/CrispWP
 * @author Ilia Makarov <ilia.makarov@me.com>
 */

function r_save_post_admin ( $post_id, $post, $update ) {
	if ( !$update ) {
		return;
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$recipe_data = [
			'ingredients'   => sanitize_text_field($_REQUEST['r_inputIngredients']),
			'time'          => sanitize_text_field($_REQUEST['r_inputTime']),
			'utensils'      => sanitize_text_field($_REQUEST['r_inputUtensils']),
			'level'         => sanitize_text_field($_REQUEST['r_inputLevel']),
			'type'          => sanitize_text_field($_REQUEST['r_inputMealType']),
			'rating'        => 0,
			'rating_count'  => 0
		];

		update_post_meta($post_id, 'recipe_data', $recipe_data);
	}
}
