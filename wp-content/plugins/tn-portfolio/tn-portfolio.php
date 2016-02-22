<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://tom-napier.co.uk/
 * @since             1.0.0
 * @package           TN_Portfolio
 *
 * @wordpress-plugin
 * Plugin Name:       TN-Portfolio
 * Plugin URI:        http://tom-napier.co.uk/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Tom Napier
 * Author URI:        http://tom-napier.co.uk/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tn-portfolio
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tn-portfolio-activator.php
 */
function activate_tn_portfolio() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tn-portfolio-activator.php';
	TN_Portfolio_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tn-portfolio-deactivator.php
 */
function deactivate_tn_portfolio() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tn-portfolio-deactivator.php';
	TN_Portfolio_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tn_portfolio' );
register_deactivation_hook( __FILE__, 'deactivate_tn_portfolio' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tn-portfolio.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_tn_portfolio() {

	$plugin = new TN_Portfolio();
	$plugin->run();

}
run_tn_portfolio();
