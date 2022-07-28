<?php
/**
 * The sidebar containing the footer widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme-scaffold
 */

if ( ! is_active_sidebar( 'footer' ) ) {
	return;
}
?>

<div class="sidebar-footer widget-area">
	<?php dynamic_sidebar( 'footer' ); ?>
</div>
