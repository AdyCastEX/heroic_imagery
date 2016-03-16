<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/AdyCastEX
 * @since      1.0.0
 *
 * @package    Heroic_Imagery
 * @subpackage Heroic_Imagery/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Heroic_Imagery
 * @subpackage Heroic_Imagery/includes
 * @author     Carl Adrian P. Castueras <ady.castueras@gmail.com>
 */
class Heroic_Imagery_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'heroic-imagery',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
