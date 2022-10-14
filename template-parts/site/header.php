<?php
/**
 * Partial: site-header.
 *
 * @package themescaffold
 */

use function ThemeScaffold\Utilities\get_component;

$main_nav_id = 'main-navigation';
?>

<header id="masthead" class="site-header">
	<nav class="site-header__nav">
		<?php get_template_part( 'template-parts/site/branding' ); ?>

		<?php
		get_component(
			'menu-toggle',
			array(
				'id'            => 'main-navigation-toggle',
				'aria-controls' => $main_nav_id,
				'aria-expanded' => false,
			)
		);
		?>

		<?php get_template_part( 'template-parts/site/navigation', 'header', array( 'id' => $main_nav_id ) ); ?>
	</nav>
</header><!-- .site-header -->
