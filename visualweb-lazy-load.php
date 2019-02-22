<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://visualweb.co.uk/lazyload
 * @since             1.0.0
 * @package           Visualweb_Lazy_Load
 *
 * @wordpress-plugin
 * Plugin Name:       Visualweb Lazy Load
 * Plugin URI:        https://visualweb.co.uk/lazyload
 * Description:       LazyLoad images by entering your own JQuery selector, or use the default class of 'vweblazyload'.
 * Version:           1.0.0
 * Author:            VisualWeb
 * Author URI:        https://visualweb.co.uk/lazyload
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       visualweb-lazy-load
 * Domain Path:       /languages
 */
 /* Copyright 2019 Visualweb (email : lazyload@visualweb.co.uk)
 Visualweb Lazy Load is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 2 of the License, or
 any later version.
 
 Visualweb Lazy Load is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU General Public License for more details.

 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-visualweb-lazy-load-activator.php
 */
function activate_visualweb_lazy_load() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-visualweb-lazy-load-activator.php';
	Visualweb_Lazy_Load_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-visualweb-lazy-load-deactivator.php
 */
function deactivate_visualweb_lazy_load() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-visualweb-lazy-load-deactivator.php';
	Visualweb_Lazy_Load_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_visualweb_lazy_load' );
register_deactivation_hook( __FILE__, 'deactivate_visualweb_lazy_load' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-visualweb-lazy-load.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

function run_visualweb_lazy_load() {

	$plugin = new Visualweb_Lazy_Load();
	$plugin->run();


}
run_visualweb_lazy_load();