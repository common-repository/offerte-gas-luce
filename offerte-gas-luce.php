<?php
/*
Plugin Name: Offerte Gas e Luce
Plugin URI:  https://offertegasluce.com
Description: Aggiunge un widget che mostra le migliori offerte per l'energia di casa, gas e luce. Fonte: https://offertegasluce.com.
Version:     1.0.6
Author:      Offerte Gas e Luce
Author URI:  https://gravida.pro/emanuele-feliziani-web-developer
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

include_once( plugin_dir_path( __FILE__ ) . 'includes/widget.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/fetch_and_store.php' );

// Create the cron job
add_action( 'offerte_gas_luce_cron_hook', 'offerte_gas_luce_fetch_data' );
// Create a scheduled event (if it does not exist already)…
function offerte_gas_luce_add_cron() {
	if ( ! wp_next_scheduled( 'offerte_gas_luce_cron_hook' ) ) {
		wp_schedule_event( time(), 'daily', 'offerte_gas_luce_cron_hook' );
	}
}
// …and make sure it's called whenever WordPress loads
add_action('wp', 'offerte_gas_luce_add_cron');

// On activation we create the option and populate it.
function offerte_gas_luce_activate() {
	offerte_gas_luce_fetch_data();
	offerte_gas_luce_add_cron();
}
register_activation_hook( __FILE__, 'offerte_gas_luce_activate' );

// When deactivating the plugin, we clean up the options.
function offerte_gas_luce_deactivate() {
	delete_option( 'offerte_gas_luce_data' );
	$timestamp = wp_next_scheduled( 'offerte_gas_luce_cron_hook' );
	wp_unschedule_event( $timestamp, 'offerte_gas_luce_cron_hook' );
}
register_deactivation_hook( __FILE__, 'offerte_gas_luce_deactivate' );

// Enqueue appropriate styles and scripts
add_action( 'wp_enqueue_scripts', 'offerte_gas_luce_assets' );
function offerte_gas_luce_assets() {
	wp_enqueue_style( 'offerte-gas-luce-styles', plugin_dir_url( __FILE__ ) . 'offerte-gas-luce.css' );
}
