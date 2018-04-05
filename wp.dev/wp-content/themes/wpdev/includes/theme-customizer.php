<?php
/**
 * @link https://github.com/zpawn/
 * @author Ilia Makarov <ilia.makarov@me.com>
 */

function wpdev_customize_register ( $wp_customize ) {
	$wp_customize->add_setting( 'header_bg_color', [
		'default' => '#4285f4',
		'transport' => 'refresh'
	] );

	$wp_customize->add_section( 'wpdev_color_theme_section', [
		'title' => __( 'Color', 'wpdev' ),
		'priority' => 30
	] );

	$wp_customize->add_control(
		new  WP_Customize_Color_Control( $wp_customize, 'theme_colors', [
			'label' => __( 'Header Color', 'wpdev' ),
			'section' => 'wpdev_color_theme_section',
			'settings' => 'header_bg_color'
		])
	);
}
