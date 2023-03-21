<?php
/*
Plugin Name: WP Version Remover
Description: Wordpressのバージョンを秘匿化するプラグインです。
Author: Yuta SAKURAI
Version: 1.0.1
Author URI: https://www.skri.gr.jp/
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

if (!defined('ABSPATH')) exit;

remove_action('wp_head', 'wp_generator');

/* バージョン情報を削除 */
function remove_cssjs_ver2($src)
{
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}
add_filter('style_loader_src', 'remove_cssjs_ver2', 9999);
add_filter('script_loader_src', 'remove_cssjs_ver2', 9999);

/* 自動アップデートを有効化 */
require 'update/plugin-update-checker.php';
$ExampleUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://tools.skri.gr.jp/software/update/wp-verhide.json',
    __FILE__,
    'wp-verhide'
);