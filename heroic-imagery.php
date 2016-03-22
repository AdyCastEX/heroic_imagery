<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/AdyCastEX
 * @since             1.0.0
 * @package           Heroic_Imagery
 *
 * @wordpress-plugin
 * Plugin Name:       Heroic Imagery
 * Plugin URI:        https://github.com/AdyCastEX/heroic_imagery
 * Description:       Provides an interface to easily create hero images through the wordpress admin area.
 * Version:           1.0.0
 * Author:            Carl Adrian P. Castueras
 * Author URI:        https://github.com/AdyCastEX
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       heroic-imagery
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-heroic-imagery-activator.php
 */
function activate_heroic_imagery() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-heroic-imagery-activator.php';
	Heroic_Imagery_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-heroic-imagery-deactivator.php
 */
function deactivate_heroic_imagery() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-heroic-imagery-deactivator.php';
	Heroic_Imagery_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_heroic_imagery' );
register_deactivation_hook( __FILE__, 'deactivate_heroic_imagery' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-heroic-imagery.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_heroic_imagery() {

	$plugin = new Heroic_Imagery();
	$plugin->run();

}
run_heroic_imagery();
