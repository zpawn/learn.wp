<?php
/**
 * @link https://github.com/zpawn/CrispWP
 * @author Ilia Makarov <ilia.makarov@me.com>
 */

function recipe_admin_init () {
	include( 'create-metaboxes.php' );
	include( 'recipe-options.php' );
	include( 'enqueue.php' );
	include( 'columns.php' );

	add_action( 'add_meta_boxes_recipe', 'r_create_metaboxes' );
	add_action( 'admin_enqueue_scripts', 'r_admin_enqueue' );
	add_filter( 'manage_edit-recipe_columns', 'add_new_recipe_columns' );
	add_action( 'manage_recipe_posts_custom_column', 'manage_recipe_columns', 10, 2 );
}
