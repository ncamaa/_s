<?php
/**
 * pixcell_medical Theme Customizer
 *
 * @package pixcell_medical
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pixcell_medical_customize_register( $wp_customize ) {
	$wp_customize->getpixcell_medicaletting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->getpixcell_medicaletting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->getpixcell_medicaletting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'pixcell_medical_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'pixcell_medical_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'pixcell_medical_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function pixcell_medical_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function pixcell_medical_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pixcell_medical_customize_preview_js() {
	wp_enqueuepixcell_medicalcript( 'pixcell_medical-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), pixcell_medical_VERSION, true );
}
add_action( 'customize_preview_init', 'pixcell_medical_customize_preview_js' );
