<?php

/*
Plugin Name: Surbma | GDPR Proof Gravity Forms
Plugin URI: https://surbma.com/wordpress-plugins/
Description: Gravity Forms add-on to help meet GDPR compliance.

Version: 3.0

Author: Surbma
Author URI: https://surbma.com/

License: GPLv2

Text Domain: surbma-gdpr-proof-gravity-forms
Domain Path: /languages/
*/

// Prevent direct access to the plugin
if ( !defined( 'ABSPATH' ) ) exit( 'Good try! :)' );

// Prevent GF to save visitor IP address
if ( class_exists( 'GFForms' ) )
	add_filter( 'gform_ip_address', '__return_empty_string' );

function surbma_gpgf_remove_form_entry( $entry ) {
	if ( class_exists( 'GFForms' ) )
		GFAPI::delete_entry( $entry['id'] );
}
add_action( 'gform_after_submission', 'surbma_gpgf_remove_form_entry' );

function surbma_gpgf_wp_admin_notices() {
	if ( !class_exists( 'GFForms' ) ) {
		_e( '<div class="error notice"><p><strong>Gravity Forms is not activated!</strong> This plugin is an add-on for Gravity Forms plugin. You need to activate Gravity Forms plugin before using this plugin.</p></div>', 'surbma-gdpr-proof-gravity-forms' );
	}
}
add_action( 'admin_notices', 'surbma_gpgf_wp_admin_notices' );
