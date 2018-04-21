<?php

/*
Plugin Name: Fullpage Search
Description: Very beautiful fullpage ajax WooCommerce product search.
Version: 0.1.0
Author: zpawn
Author URI: //github.com/zpawn
*/


add_action( 'wp_enqueue_scripts', 'pug_fps_scripts' );
add_filter('widget_text', 'do_shortcode');
add_shortcode('pug_fullpage_search', 'pug_fullpage_search_shortcode');
add_action('wp_footer', 'pug_fps_modal');

// REST API
add_action( 'rest_api_init', function () {
    register_rest_route( 'pug_fps_api', '/products', array(
        'methods' => 'GET',
        'callback' => 'pug_fps_get_products'
    ) );
} );

function pug_fps_scripts () {
    wp_enqueue_style('pug_fps_style', plugin_dir_url(__FILE__). 'dist/fulltext.search.css');
    wp_enqueue_script('pug_fps_script', plugin_dir_url(__FILE__) . 'dist/fulltext.search.js', ['jquery'], '1.0.1');
}

function pug_fullpage_search_shortcode ($attr, $content = null) {
    return '<a class="btn btn-default js-fps-open" href="javascript:void(0)">'.
                '<?xml version="1.0" ?><!DOCTYPE svg  PUBLIC \'-//W3C//DTD SVG 1.1//EN\'  \'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd\'><svg width="1.5em" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3  c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2  c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2  c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z"/></svg>'.
            '</a>';
}

function pug_fps_modal () {

    $classSuffix = 'pug-fps';
    $searchPlaceholder = __('[:ru]Поиск[:en]Search[:uk]Пошук');
    $emptyResult = __('[:ru]Не найдено[:en]No results[:uk]Не знайдено');

    echo '<div class="'. $classSuffix .'-modal">'.
            '<div class="container ws-page-container">'.
                '<div class="'. $classSuffix .'-modal__header">'.
                    '<a href="javascript:void(0)" class="'. $classSuffix .'-modal__close js-fps-close-modal">'.
                        '<img class="icon__close" alt="close" src=\'data:image/svg+xml;utf8,<svg enable-background="new 0 0 100 100" id="Layer_1" version="1.1" viewBox="0 0 100 100" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon fill="#010101" points="77.6,21.1 49.6,49.2 21.5,21.1 19.6,23 47.6,51.1 19.6,79.2 21.5,81.1 49.6,53 77.6,81.1 79.6,79.2   51.5,51.1 79.6,23 "/></svg>\'>'.
                    '</a>'.
                '</div>'.
                '<div class="ws-journal-container row">'.
                    '<div class="col-xs-12">'.
                        '<form action="/" method="get">'.
                            '<input type="hidden" name="post_type" value="product">'.
                            '<div class="form-group has-feedback">'.
                                '<input class="form-control input-lg '. $classSuffix .'-modal__search-field js-fps-search-field" name="s" type="input" id="pug-fps-search" placeholder="'. $searchPlaceholder .'" autocomplete="off">'.
                                '<span class="form-control-feedback js-fps-search" aria-hidden="true">'.
                                    '<?xml version="1.0" ?><!DOCTYPE svg  PUBLIC \'-//W3C//DTD SVG 1.1//EN\'  \'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd\'><svg style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M448.3,424.7L335,311.3c20.8-26,33.3-59.1,33.3-95.1c0-84.1-68.1-152.2-152-152.2c-84,0-152,68.2-152,152.2  s68.1,152.2,152,152.2c36.2,0,69.4-12.7,95.5-33.8L425,448L448.3,424.7z M120.1,312.6c-25.7-25.7-39.8-59.9-39.8-96.3  s14.2-70.6,39.8-96.3S180,80,216.3,80c36.3,0,70.5,14.2,96.2,39.9s39.8,59.9,39.8,96.3s-14.2,70.6-39.8,96.3  c-25.7,25.7-59.9,39.9-96.2,39.9C180,352.5,145.8,338.3,120.1,312.6z"/></svg>'.
                                '</span>'.
                                '<button type="submit" style="display:none"></button>'.
                            '</div>'.
                        '</form>'.
                    '</div>'.
                    '<div class="col-xs-12">'.
                        '<ul class="products js-fps-search-result">'.
                            '<li class="product product-empty js-fps-search-empty-result"><p class="h2 text-center">'. $emptyResult .'</p></li>'.
                        '</ul>'.
                    '</div>'.
                '</div>'.
            '</div>'.
        '</div>';
}

function pug_fps_get_products(WP_REST_Request $request) {
    $products  = array_reduce(get_posts([
        'post_type' => sanitize_text_field($request->get_param('post_type')),
        's' => sanitize_text_field($request->get_param('s')),
    ]), function ($products, $p) {

        $wc = wc_get_product($p)->get_data();

        $products[] = [
            'id' => $p->ID,
            'href' => $p->guid,
            'title' => __($wc['name']),
            'image' => get_the_post_thumbnail_url($p->ID),
            'price' =>  wc_format_sale_price($wc['regular_price'], $wc['sale_price'])
        ];

        return $products;
    }, []);

    if (empty($products)) {
        return [];
    }

    return $products;
}
