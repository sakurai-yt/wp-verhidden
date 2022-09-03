<?php
/*
Plugin Name: WP Ver Hidden
Description: Wordpressのバージョンを秘匿化するプラグイン。
Author: Yuta SAKURAI
Version: 0.1
Author URI: https://www.skri.gr.jp/
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit;

remove_action('wp_head','wp_generator');

function remove_cssjs_ver2( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver2', 9999 );
add_filter( 'script_loader_src', 'remove_cssjs_ver2', 9999 );
