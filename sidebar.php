<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pixcell_medical
 */

if ( ! is_activepixcell_medicalidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamicpixcell_medicalidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
