<?php
/**
 * Bootstrap file
 *
 * Plugin Name:         Custom Gutenberg
 * Description:         Custom gutenberg blocks for site
 * Version:             1.2
 * Requires at least:   5.6
 * Requires PHP:        7.0
 * Author:              misha
 * Author URI:          {AUTHOR_URL}
 * License:             MIT
 * Text Domain:         custom-gutenberg
 *
 * @package     CustomGutenberg
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use CustomGutenberg\Plugin;
use CustomGutenberg\Vendor\Auryn\Injector;
include_once ABSPATH . 'wp-admin/includes/plugin.php';

if ( ! defined( 'CUSTOM_GUTENBERG_DEBUG' ) ) {
	/**
	 * Enable plugin debug mod.
	 */
	define( 'CUSTOM_GUTENBERG_DEBUG', false );
}
/**
 * Path to the plugin root directory.
 */
define( 'CUSTOM_GUTENBERG_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Load admin styles
 */
define( 'CUSTOM_GUTENBERG_ADMIN_STYLES', true );

/**
 * Url to the plugin root directory.
 */
define( 'custom_gutenberg_URL', plugin_dir_url( __FILE__ ) );

define( 'GUTENBERG_CATTITLE', wp_get_theme()['Name'] . ' blocks' );
define( 'GUTENBERG_CATSLUG', wp_get_theme()['Name'] . '-blocks' );

/**
 * Run plugin function.
 *
 * @throws Exception If something went wrong.
 * @since {VERSION}
 *
 */
function run_custom_gutenberg() {
//	require_once CUSTOM_GUTENBERG_PATH . 'vendor/autoload.php';

	if ( is_admin() && ! is_plugin_active( 'advanced-custom-fields-pro-master/acf.php' ) ) {
		activate_plugin( 'advanced-custom-fields-pro-master/acf.php' );
	}
}

add_action( 'plugins_loaded', 'run_custom_gutenberg' );
register_activation_hook( __FILE__, 'custom_gutenberg_activation' );

function custom_gutenberg_activation() {
	if ( is_admin() && ! is_plugin_active( 'advanced-custom-fields-pro-master/acf.php' ) && extension_loaded( 'zip' ) ) {
		$zip = new ZipArchive;
		if ( $zip->open( CUSTOM_GUTENBERG_PATH . 'must-use/advanced-custom-fields-pro.zip' ) ) {
			mkdir( WP_PLUGIN_DIR . '/advanced-custom-fields-pro-master' );
			$zip->extractTo( WP_PLUGIN_DIR . '/advanced-custom-fields-pro-master' );
		}
	}
}

require_once CUSTOM_GUTENBERG_PATH . '/functions/register-styles-scripts.php';
if ( function_exists( 'acf_register_block_type' ) ) {
	require_once CUSTOM_GUTENBERG_PATH . '/functions/gutenberg_register_blocks.php';
	require_once CUSTOM_GUTENBERG_PATH . '/map/map.php';

}

function mytheme_setup_theme_supported_features() {
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => esc_attr__( 'Purple', 'opendoors' ),
			'slug'  => 'purple',
			'color' => get_field('accent', 'option'),
		),
		array(
			'name'  => esc_attr__( 'Blue', 'opendoors' ),
			'slug'  => 'blue',
			'color' => get_field('blue', 'option'),
		),
		array(
			'name'  => esc_attr__( 'Black', 'opendoors' ),
			'slug'  => 'black',
			'color' => get_field('black', 'option'),
		),
		array(
			'name'  => esc_attr__( 'White', 'opendoors' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
		array(
			'name'  => esc_attr__( 'Red', 'opendoors' ),
			'slug'  => 'red',
			'color' => get_field('red', 'option'),
		),
		array(
			'name'  => esc_attr__( 'Grey first', 'opendoors' ),
			'slug'  => 'greyfirst',
			'color' => get_field('grey1', 'option'),
		),
		array(
			'name'  => esc_attr__( 'Grey second', 'opendoors' ),
			'slug'  => 'greysecond',
			'color' => get_field('grey2', 'option'),
		),
	) );
}

add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );

function blockStyling( $block ) {
	$style = 'style="';
	if ( isset($block['backgroundColor']) ) {
		$style.='background: var(--wp--preset--color--'.$block['backgroundColor'].');';
	}
	if ( isset($block['data']['padding']) ) {
		$style.='padding: '.$block['data']['padding'].'px;';
	}

	$style .= '"';

	return $style;
}