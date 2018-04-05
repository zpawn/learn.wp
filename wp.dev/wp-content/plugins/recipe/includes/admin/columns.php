<?php
/**
 * @link https://github.com/zpawn/CrispWP
 * @author Ilia Makarov <ilia.makarov@me.com>
 */

/**
 * @see https://codex.wordpress.org/Plugin_API/Filter_Reference/manage_edit-post_type_columns
 * @param $columns
 */
function add_new_recipe_columns ( $columns ) {
	$new_columns = [
		'cb'            => '<input type="checkbox">',
		'title'         => __( 'Title', 'recipe' ),
		'author'        => __( 'Author', 'recipe' ),
		'categories'    => __( 'Categories', 'recipe' ),
		'count'         => __( 'Ratings Count', 'recipe' ),
		'rating'        => __( 'Average Rating', 'recipe' ),
		'date'          => __( 'Date', 'recipe' )
	];

	return $new_columns;
}

function manage_recipe_columns ( $column_name, $id ) {
	switch ($column_name) {
		case 'count':
			$recipe_data = get_post_meta( $id, 'recipe_data', true );
			echo $recipe_data['rating_count'];
			break;
		case 'rating':
			$recipe_data = get_post_meta( $id, 'recipe_data', true );
			echo $recipe_data['rating'];
			break;
		default: break;
	}
}
