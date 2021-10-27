<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme-scaffold
 */

if ( ! is_active_sidebar( 'primary' ) ) {
	return;
}
?>

<aside id="sidebar-primary" class="widget-area">
	<?php dynamic_sidebar( 'primary' ); ?>
</aside>
