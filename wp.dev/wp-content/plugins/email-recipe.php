<?php
/**
 * Plugin Name: Recipe Email Rating
 * Description: This plugin extends the recipe plugin
 */

add_action( 'recipe_rating', function ( $args ) {
	$post = get_post( $args['id'] );
	$author_email = get_the_author_meta( 'user_email', $post->post_author );
	$subject = 'Your recipe has received a new rating';
	$message = 'Your recipe'. $post->post_title .'has received a new rating of '. $args['rating'];

	wp_mail( $author_email, $subject, $message );
});
