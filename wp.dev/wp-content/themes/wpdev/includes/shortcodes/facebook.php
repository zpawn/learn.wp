<?php
/**
 * @link https://github.com/zpawn
 * @author Ilia Makarov <ilia.makarov@me.com>
 */

/**
 * Use this shortcode on admin like [ufb]...[/ufb]
 *
 * @param $atts
 * @param string $content
 *
 * @return string
 */
function wpdev_facebook_shortcode ( $atts, $content = 'Like us on Facebook' ) {

	$theme_opts = get_option('wpdev_opts');

	$atts = shortcode_atts([
		'page' => $theme_opts['facebook'],
	], $atts);

	return '<a class="btn bg-facebook" href="'. $atts['page'] .'" target="_blank">'. do_shortcode($content) .'</a>';
}

/**
 * Use Awesome Font icons
 *
 * @param $atts
 *
 * @return string
 */
function wpdev_icon_shortcode ( $atts ) {
	return '<i class="fa fa-'. $atts['icon'] .'"></i>';
}
