<?php
/**
 * @link https://github.com/zpawn/CrispWP
 * @author Ilia Makarov <ilia.makarov@me.com>
 */

function r_rate_recipe () {

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		global $wpdb;

		$response = [ 'status' => 1 ];
		$post_id = absint($_REQUEST['rid']);
		$rating = round($_REQUEST['rating'], 1);
		$user_ip = $_SERVER['REMOTE_ADDR'];

		$rating_count = $wpdb->get_var('
			SELECT COUNT(*) FROM `'. $wpdb->prefix .'recipe_rating`
			WHERE recipe_id = '. $post_id .' AND user_ip = "'. $user_ip . '"'
		);

		if ($rating_count > 0) {
			wp_send_json( $response );
		}

		// Insert Rating
		$wpdb->insert(
			$wpdb->prefix .'recipe_rating',
			[
				'recipe_id' => $post_id,
				'rating' => $rating,
				'user_ip' => $user_ip
			],
			[ '%d', '%f', '%s' ]
		);

		// Update Metadata
		$recipe_data = get_post_meta( $post_id, 'recipe_data', true );
		$recipe_data['rating_count'] += 1;
		$recipe_data['rating'] = round($wpdb->get_var('
			SELECT AVG(`rating`) FROM `'. $wpdb->prefix .'recipe_rating`
			WHERE recipe_id = '. $post_id
		), 1);

		update_post_meta( $post_id, 'recipe_data', $recipe_data );

		do_action( 'recipe_rating', [
			'id' => $post_id,
			'rating' => $rating,
			'ip' => $user_ip
		] );

		$response['status'] = 2;
		wp_send_json( $response );
	}
}
