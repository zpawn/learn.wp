<?php

/*
Plugin Name: qTranslate X Custom Switcher
Description: Modify change language links. Using: add to the language links class <code>.js-pug-lang</code> and data attribute <code>data-pug-lang="langCode"</code>.<br> Ex. <code>&lt;a class="js-pug-lang" title="English" href="//" data-pug-lang="en"&gt;En&lt;/a&gt;</code>
Version: 0.1.0
Author: zpawn
Author URI: //github.com/zpawn
*/


add_action( 'wp_enqueue_scripts', 'pug_scripts' );

function pug_scripts () {
    wp_enqueue_script('pug-qtranslate-x-custom-swither', plugin_dir_url(__FILE__) . '/dist/pug.q.js', ['jquery']);
}
