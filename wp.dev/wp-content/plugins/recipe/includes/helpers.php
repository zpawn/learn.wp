<?php
/**
 * @link https://github.com/zpawn/CrispWP
 * @author Ilia Makarov <ilia.makarov@me.com>
 */

function debug () {
	static $count = 0;
	$args = func_get_args();
	$prefix = '<ol style="font-family: Courier; font-size: 12px; border: 1px solid #dedede; background-color: #efefef; float: left; padding-right: 20px;">';
	$suffix = '</ol><div style="clear:left;"></div>';
	if (!empty($args)) {
		echo $prefix;
		foreach ($args as $k => $v) {
			echo '<li><pre>' . htmlspecialchars(print_r($v, true)) . "\n" . '</pre></li>';
		}
		echo $suffix;
	}
	$count++;
}
