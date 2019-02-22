<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://visualweb.co.uk/lazyload
 * @since      1.0.0
 *
 * @package    Visualweb_Lazy_Load
 * @subpackage Visualweb_Lazy_Load/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Visualweb_Lazy_Load
 * @subpackage Visualweb_Lazy_Load/includes
 * @author     VisualWeb <plugin@visualweb.co.uk>
 */
class Visualweb_Lazy_Load_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'visualweb-lazy-load',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}