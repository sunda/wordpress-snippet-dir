<?php

define('PLUGIN_NAME','Plugin name');
define( 'REQUIRED_PHP_VERSION', '7.0' );
define( 'REQUIRED_WP_VERSION',  '5.0' );

/**
 * Check the requirements
 *
 * @return bool True if system requirements are met, false if not
 */
function check_requirements() {
	global $wp_version;

	if ( version_compare( PHP_VERSION, REQUIRED_PHP_VERSION, '<' ) ) {
		return false;
	}

	if ( version_compare( $wp_version, REQUIRED_WP_VERSION, '<' ) ) {
		return false;
	}

	return true;
}

/**
 * Prints an error that the system requirements weren't met.
 */
function requirements_error() {
	global $wp_version;

	require_once( dirname( __FILE__ ) . '/views/requirements-error.php' );
}

/*
 * Check requirements and load main class
 * The main program needs to be in a separate file that only gets loaded if the plugin requirements are met. Otherwise older PHP installations could crash when trying to parse it.
 */
if ( requirements_met() ) {} else {
	add_action( 'admin_notices', 'requirements_error' );
}
