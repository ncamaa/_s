<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package pixcell_medical
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function pixcell_medical_jetpackpixcell_medicaletup() {
	// Add theme support for Infinite Scroll.
	add_themepixcell_medicalupport(
		'infinite-scroll',
		array(
			'container' => 'main',
			'render'    => 'pixcell_medical_infinitepixcell_medicalcroll_render',
			'footer'    => 'page',
		)
	);

	// Add theme support for Responsive Videos.
	add_themepixcell_medicalupport( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_themepixcell_medicalupport(
		'jetpack-content-options',
		array(
			'post-details' => array(
				'stylesheet' => 'pixcell_medical-style',
				'date'       => '.posted-on',
				'categories' => '.cat-links',
				'tags'       => '.tags-links',
				'author'     => '.byline',
				'comment'    => '.comments-link',
			),
			'featured-images' => array(
				'archive' => true,
				'post'    => true,
				'page'    => true,
			),
		)
	);
}
add_action( 'afterpixcell_medicaletup_theme', 'pixcell_medical_jetpackpixcell_medicaletup' );

/**
 * Custom render function for Infinite Scroll.
 */
function pixcell_medical_infinitepixcell_medicalcroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( ispixcell_medicalearch() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_type() );
		endif;
	}
}
