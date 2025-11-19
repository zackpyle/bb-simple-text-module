<?php
/**
 * Plugin Name: Beaver Builder Simple Text Module
 * Plugin URI:  https://snippetnest.com/snippet/simple-text-module-for-beaver-builder-components/
 * Description: Adds a Simple Text module to Beaver Builder with extended HTML tag options
 * Author: PYLE/DIGITAL
 * Version: 1.0.2
 * Text Domain: bb-simple-text
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Only load when Beaver Builder is active.
add_action( 'init', function() {
	if ( class_exists( 'FLBuilder' ) ) {
		// Define constants.
		if ( ! defined( 'BBSTM_DIR' ) ) {
			define( 'BBSTM_DIR', plugin_dir_path( __FILE__ ) );
		}
		if ( ! defined( 'BBSTM_URL' ) ) {
			define( 'BBSTM_URL', plugin_dir_url( __FILE__ ) );
		}

		// Load the module class which registers itself.
		require_once BBSTM_DIR . 'modules/simple-text/simple-text.php';
	}
});

// GitHub Updater integration
require_once plugin_dir_path(__FILE__) . 'GithubUpdater.php';
if (class_exists('BB_Simple_Text_GithubUpdater')) {
	$bb_simple_text_updater = new BB_Simple_Text_GithubUpdater(__FILE__);
	$bb_simple_text_updater->set_username('zackpyle');
	$bb_simple_text_updater->set_repository('bb-simple-text-module');
	$bb_simple_text_updater->set_settings(array(
		'requires'		=> '5.4',
		'tested'		=> '6.8.3',
		'requires_php'	=> '7.4',
		'rating'		=> '100.0',
		'num_ratings'	=> '10',
		'downloaded'	=> '10',
		'added'			=> '2025-11-19',
	));
	$bb_simple_text_updater->initialize();
}