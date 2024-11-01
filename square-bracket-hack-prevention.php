<?php
/*
 Plugin Name: Square Bracket Hack Prevention
 Plugin URI: http://www.wpsos.io/wordpress-plugin-square-bracket-hack-prevention/
 Description: The Square Bracket Hack Prevention prevents hackers from adding a "[" to the URL.
 Author: WPSOS
 Version: 1.0
 Author URI: http://www.wpsos.io/
 Licence: GPLv2 or later
 */

/**
 * Add links to WPSOS
 */
function wpsos_sbhp_set_plugin_meta( $links, $file ) {

	if ( strpos( $file, 'square-bracket-hack-prevention.php' ) !== false ) {

		$links = array_merge( $links, array( '<a href="http://www.wpsos.io/wordpress-plugin-square-bracket-hack-prevention/">' . __( 'Plugin details' ) . '</a>' ) );
		$links = array_merge( $links, array( '<a href="http://www.wpsos.io/">WPSOS - WordPress Security & Hack Repair</a>' ) );
	}
	return $links;
}
add_filter( 'plugin_row_meta', 'wpsos_sbhp_set_plugin_meta', 10, 2 );

//Check if the htaccess file is writeable
$htaccess_file = ABSPATH . '.htaccess';
if(!is_writeable( $htaccess_file )){
	add_action( 'admin_notices', 'wpsos_sbhp_add_htaccess_warning');
	return;
}

//Register the activation hook for modifying htaccess file
register_activation_hook( __FILE__, 'wpsos_sbhp_activate' );
//Register the deactivation hook for removing the added rows
register_deactivation_hook( __FILE__, 'wpsos_sbhp_deactivate' );

/**
 * Called on plugin activation.
 * Will modify htaccess file, adding the necessary row for preventing '[' in URL
 */
function wpsos_sbhp_activate(){
	//If the htaccess file is not writeable, return
	$htaccess_file = ABSPATH . '.htaccess';
	if(!is_writeable( $htaccess_file )){
		return;
	}
	//If the function doesn't exist, require it
	if ( ! function_exists( 'insert_with_markers' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/misc.php' );
	}
	//The rows to add to htaccess file
	$insertion = '# Block URL based exploits 
RedirectMatch 403 \[';
	//Since it has to be an array, explode
	$insertion = explode( "\n", $insertion );
	insert_with_markers( $htaccess_file, 'WPSOS-SBHP', $insertion );
}

/**
 * Called on plugin deactivation
 * Removes the rows from htaccess file
 */
function wpsos_sbhp_deactivate(){
	//If htaccess file is not writeable, return
	$htaccess_file = ABSPATH . '.htaccess';
	if(!is_writeable( $htaccess_file )){
		return;
	}
	if ( ! function_exists( 'insert_with_markers' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/misc.php' );
	}
	//Remove the rows
	insert_with_markers( $htaccess_file, 'WPSOS-SBHP', '' );
}

/**
 * Adds warning to the admin UI to note that .htaccess is not writeable
 */
function wpsos_sbhp_add_htaccess_warning(){
	echo "<div class='error'>Redirect Bracket Requests requires .htaccess to be writeable. Please make the file writeable, and reactivate the plugin.</div>";
}

?>