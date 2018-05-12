<?php

/*
Plugin Name: Surbma - GDPR Proof Gravity Forms
Plugin URI: https://surbma.com/wordpress-plugins/
Description: Makes your Gravity Forms forms GDPR compatible.

Version: 1.0

Author: Surbma
Author URI: https://surbma.com/

License: GPLv2

Text Domain: surbma-gdpr-proof-gravity-forms
Domain Path: /languages/
*/

// Prevent direct access to the plugin
if ( !defined( 'ABSPATH' ) ) exit( 'Good try! :)' );

// Prevent GF to save visitor IP address
add_filter( 'gform_ip_address', '__return_empty_string' );

function surbma_gpgf_remove_form_entry( $entry ) {
	GFAPI::delete_entry( $entry['id'] );
}
add_action( 'gform_after_submission', 'surbma_gpgf_remove_form_entry' );
