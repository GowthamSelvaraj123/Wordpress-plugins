<?php
/**
 * Plugin Name: Gk Slider Widget
 * Description: This Plugin control free slider widget
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-list-widget
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.21.0
 * Elementor Pro tested up to: 3.21.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register List Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_list_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/slider-widget.php' );

	$widgets_manager->register( new \Elementor_List_Widget() );

}
add_action( 'elementor/widgets/register', 'register_list_widget' );

function my_plugin_frontend_scripts() {
	wp_register_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
	wp_register_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], false, true);
	wp_enqueue_style('swiper-css');
	wp_enqueue_script('swiper-js');
}
add_action('elementor/frontend/after_register_scripts', 'my_plugin_frontend_scripts');

function gk_slider_enqueue_styles() {
    wp_enqueue_style('gk-slider-styles', plugins_url('assets/style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'gk_slider_enqueue_styles');
