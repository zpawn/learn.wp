<?php
/**
 * @link https://github.com/zpawn/CrispWP
 * @author Ilia Makarov <ilia.makarov@me.com>
 */

function r_filter_recipe_content ( $content ) {

	if ( !is_singular('recipe') ) {
		return $content;
	}

	global $post, $wpdb;
	$recipe_data = get_post_meta( $post->ID, 'recipe_data', true );
//	$recipe_tpl_res = wp_remote_get( plugins_url( 'process/recipe-template.php', RECIPE_PLUGIN_URL ) );
//	$recipe_html = wp_remote_retrieve_body( $recipe_tpl_res );
	$recipe_html = file_get_contents( 'recipe-template.php', true );

	$recipe_html = str_replace( 'INGREDIENTS_PH', $recipe_data['ingredients'], $recipe_html );
	$recipe_html = str_replace( 'COOKING_TIME_PH', $recipe_data['time'], $recipe_html );
	$recipe_html = str_replace( 'UTENSILS_PH', $recipe_data['utensils'], $recipe_html );
	$recipe_html = str_replace( 'LEVEL_PH', $recipe_data['level'], $recipe_html );
	$recipe_html = str_replace( 'TYPE_PH', $recipe_data['type'], $recipe_html );

	$recipe_html = str_replace( 'INGREDIENTS_I18N', __( 'Ingredients', 'recipe' ), $recipe_html );
	$recipe_html = str_replace( 'COOKING_TIME_I18N', __( 'Cooking Time', 'recipe' ), $recipe_html );
	$recipe_html = str_replace( 'UTENSILS_I18N', __( 'Utensils Required', 'recipe' ), $recipe_html );
	$recipe_html = str_replace( 'LEVEL_I18N', __( 'Level', 'recipe' ), $recipe_html );
	$recipe_html = str_replace( 'TYPE_I18N', __( 'Type', 'recipe' ), $recipe_html );
	$recipe_html = str_replace( 'RATE_I18N', __( 'Reting', 'recipe' ), $recipe_html );
	$recipe_html = str_replace( 'RECIPE_ID', $post->ID, $recipe_html );
	$recipe_html = str_replace( 'RECIPE_RATING', $recipe_data['rating'], $recipe_html );

	$user_id = $_SERVER['REMOTE_ADDR'];

	$rating_count = $wpdb->get_var( $wpdb->prepare(
		'SELECT COUNT(*) FROM `'. $wpdb->prefix .'recipe_rating` WHERE recipe_id = %d AND user_ip = %s',
		$post->ID, $user_id
	));

	$recipe_html = str_replace( 'READONLY_PLACEHOLDER', ($rating_count > 0) ? 'data-rateit-readonly="true"' : '', $recipe_html );

	return $recipe_html . $content;
}
