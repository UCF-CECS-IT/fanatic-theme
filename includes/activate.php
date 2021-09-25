<?php

function fan_activation_error_acf() {
	ob_start();
?>
	<div class="notice notice-error">
		<p><strong>Theme not activated:</strong> The Fanatic UCF WP Child Theme requires the ACF Pro plugin and the WP QuickLaTeX plugin. Please make sure the required plugins are installed.</p>
	</div>
<?php
	echo ob_get_clean();
}

function fan_activation_checks( $oldtheme_name, $oldtheme ) {
	$do_revert = false;

	// Require ACF PRO
	if ( ! class_exists( 'acf_pro' ) ) {
		$do_revert = true;
		add_action( 'admin_notices', 'ucfwp_activation_error_acf' );
	}

	// Require WP Quicklatex
	if ( ! function_exists( 'quicklatex_init' ) ) {
		$do_revert = true;
		add_action( 'admin_notices', 'ucfwp_activation_error_acf' );
	}

	// Switch back to previous theme if a requirement is missing
	if ( $do_revert ) {
		switch_theme( $oldtheme->stylesheet );
	}

	return false;
}

add_action( 'after_switch_theme', 'fan_activation_checks', 10, 2 );

function my_acf_json_save_point( $path ) {

    // update path
    $path = FANATIC_THEME_DIR . '/json';

    // return
    return $path;

}

add_filter('acf/settings/save_json', 'my_acf_json_save_point');

