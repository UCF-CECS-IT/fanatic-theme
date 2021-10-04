<?php

namespace FANATIC\Theme\Includes\Meta;

/**
 * Enqueue front-end css and js.
 **/
function enqueue_frontend_assets() {
	$theme = wp_get_theme();
	$theme_version = $theme->get( 'Version' );

	wp_enqueue_style( 'style-child', FANATIC_THEME_CSS_URL . '/style.min.css', array( 'style' ), $theme_version );

	wp_enqueue_script( 'script-child', FANATIC_THEME_JS_URL . '/script.min.js', array( 'jquery', 'script' ), $theme_version, true );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_frontend_assets', 11 );


/**
 * Removes the UCF header bar from the theme.
 *
 * @since 0.2.2
 * @return void
 */
function fan_dequeue() {
	wp_dequeue_script( 'ucf-header' );
	wp_deregister_script( 'ucf-header' );
}

add_action( 'wp_enqueue_scripts',  __NAMESPACE__ . '\fan_dequeue', 11 );
