<?php 
/**
 * Plugin Name: WP Smart Boilerplate
 * Plugin URI: https://wp-helpers.com
 * Description: Modern plugin boilerplate that uses Laravel Mix, Browsersync, Babel and modern JS/TS tools.
 * Version: 1.0.0
 * Requires at least: 5.4
 * Requires PHP: 7.4
 * Author: Carlos Matos
 * Author URI: https://wp-helpers.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI: https://wp-helpers.com
 * Text Domain: wp-smart-boilerplate
 * Domain Path: /languages
 */

use SmartBoilerplate\Config;

require __DIR__ . '/vendor/autoload.php';

$options = [
    'root' => plugin_dir_path(__FILE__),
    'slug' => trailingslashit(dirname(plugin_basename(__FILE__))),
    'browsersync' => false,
    'babel' => false,
    'compiling' => [
        'js' => true,
        'css' => true,
        'sass' => false.
        'less' => false,
        'jsx' => false,
        'vue' => false,
        'svelte' => false
    ]
];

$config = new Config($options);
$config->generate();
