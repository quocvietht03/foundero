<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 */

require_once get_template_directory() . '/plugin-install/class-tgm-plugin-activation.php';

function woozio_register_required_plugins() {
	if ( isset( $_GET['page'] ) && $_GET['page'] === 'verifytheme_settings' ) {
		return;
	} 

	$pathfile = 'https://download.beplusthemes.com/';

	$plugin_includes = array(
		array(
			'name'     		=> __( 'Elementor Website Builder', 'woozio' ),
			'slug'     		=> 'elementor',
			'required'     	=> true,
		),
		array(
			'name'          => __( 'Elementor Pro', 'woozio' ),
			'slug'          => 'elementor-pro',
			'source'        => $pathfile . 'elementor-pro.zip',
			'required'      => true,
		),
		array(
			'name'          => __( 'Advanced Custom Fields PRO', 'woozio' ),
			'slug'          => 'advanced-custom-fields-pro',
			'source'        => $pathfile . 'advanced-custom-fields-pro.zip',
			'required'      => true,
		),
		array(
			'name'          => __( 'Gravity Forms', 'woozio' ),
			'slug'          => 'gravityforms',
			'source'        => $pathfile . 'gravityforms.zip',
			'required'      => true,
		),

	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugin_includes, $config );
}
add_action( 'tgmpa_register', 'woozio_register_required_plugins' );