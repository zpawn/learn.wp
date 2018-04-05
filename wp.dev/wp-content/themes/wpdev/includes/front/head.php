<?php
/**
 * @link https://github.com/zpawn/
 * @author Ilia Makarov <ilia.makarov@me.com>
 */
 
function wpdev_head () {
?>
	<style type="text/css">
		.navbar.navbar-inverse,
		.card .card-header.bg-primary {
			background-color: <?php echo get_theme_mod( 'header_bg_color', '#4285f4' ) ?>;
		}
	</style>
<?php
}
