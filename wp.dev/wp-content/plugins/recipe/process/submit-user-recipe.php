<?php
/**
 * @link https://github.com/zpawn/CrispWP
 * @author Ilia Makarov <ilia.makarov@me.com>
 */

function r_submit_user_recipe () {
	$response = [ 'status' => 1 ];

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if (empty($_REQUEST['ingredients']) || empty($_REQUEST['time']) || empty($_REQUEST['utensils']) || empty($_REQUEST['level']) || empty($_REQUEST['meal_type']) || empty($_REQUEST['title'])) {
			wp_send_json($response);
		}

		$title = sanitize_text_field($_REQUEST['title']);
		$content = wp_kses_post($_REQUEST['content']);
		$recipe_data = [
			'ingredients'   => sanitize_text_field($_REQUEST['ingredients']),
			'time'          => sanitize_text_field($_REQUEST['time']),
			'utensils'      => sanitize_text_field($_REQUEST['utensils']),
			'level'         => sanitize_text_field($_REQUEST['level']),
			'type'     => sanitize_text_field($_REQUEST['meal_type']),
			'rating'        => 0,
			'rating_count'  => 0

		];

		$post_id = wp_insert_post([
			'post_content' => $content,
			'post_name' => $title,
			'post_title' => $title,
			'post_status' => 'pending',
			'post_type' => 'recipe'
		]);

		update_post_meta( $post_id, 'recipe_data', $recipe_data );

		$response = [ 'status' => 2 ];
		wp_send_json($response);
	}
}
