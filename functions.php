<?php
/**
 * テーマで使用するCSSとJavaScriptを読み込みます。
 */
function shibahashi_lab_enqueue_assets() {
	wp_enqueue_style(
		'shibahashi-lab-main',
		get_theme_file_uri('/assets/css/main.css'),
		array(),
		wp_get_theme()->get('Version')
	);

	wp_enqueue_script(
		'shibahashi-lab-main',
		get_theme_file_uri('/assets/js/main.js'),
		array(),
		wp_get_theme()->get('Version'),
		true
	);
}
add_action('wp_enqueue_scripts', 'shibahashi_lab_enqueue_assets');
