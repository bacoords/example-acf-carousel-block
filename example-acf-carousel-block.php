<?php
/**
 * Plugin Name:       Example ACF Carousel Block
 * Description:       Example block built with Advanced Custom Fields Pro.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Brian Coords
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       example-acf-carousel-block
 *
 * @package           wpdev
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Registers the block's assets for the editor and the frontend.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#editor-scripts
 */
function example_register_styles_and_scripts() {
	wp_register_style( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.min.css' );
	wp_register_script( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js' );
	wp_register_script( 'wp-block-acf-carousel', plugin_dir_url( __FILE__ ) . '/blocks/carousel/script.js', array( 'flickity' ), filemtime( plugin_dir_path( __FILE__ ) . '/blocks/carousel/script.js' ), true );
}
add_action( 'wp_enqueue_scripts', 'example_register_styles_and_scripts' );
add_action( 'admin_enqueue_scripts', 'example_register_styles_and_scripts' );


/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function example_acf_carousel_block() {
	register_block_type( __DIR__ . '/blocks/carousel' );
}
add_action( 'init', 'example_acf_carousel_block' );
