<?php

add_action('init', 'ninja_forms_register_tab_license_settings');

function ninja_forms_register_tab_license_settings(){
	$args = array(
		'name' => __( 'Licenses', 'ninja-forms' ),
		'page' => 'ninja-forms-settings',
		'display_function' => '',
		'save_function' => 'ninja_forms_save_license_settings',
	);
	ninja_forms_register_tab('license_settings', $args);
}

add_action('init', 'ninja_forms_register_license_settings_metabox');

function ninja_forms_register_license_settings_metabox(){
	$args = array(
		'page' => 'ninja-forms-settings',
		'tab' => 'license_settings',
		'slug' => 'license_settings',
		'title' => __( 'Licenses', 'ninja-forms' ),
		'settings' => array(
			//array(
				//'name' => 'license_key',
				//'type' => 'text',
				//'label' => __('Ninja Forms License Key', 'ninja-forms'),
				//'desc' => __('You will find this included with your purchase email.', 'ninja-forms'),
			//),
		),
	);
	ninja_forms_register_tab_metabox($args);
}

function ninja_forms_save_license_settings($data){
	$plugin_settings = get_option("ninja_forms_settings");

	foreach($data as $key => $val){
		$plugin_settings[$key] = $val;
	}

	update_option( 'ninja_forms_settings', $plugin_settings);
	$update_msg = __( 'Licenses Saved', 'ninja-forms' );
	return $update_msg;
}