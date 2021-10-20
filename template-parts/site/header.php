<?php
/**
 * Site header
 *
 * @package theme-scaffold
 */

use function ThemeScaffold\Utilities\get_component;

?>

<header id="masthead" class="site-header">
	<nav class="site-header__nav">
		<?php get_template_part( 'template-parts/site/branding' ); ?>
		<?php
		get_component(
			'menu-toggle',
			array(
				'id'            => 'main-navigation-toggle',
				'aria-controls' => 'main-navigation',
				'aria-expanded' => false,
			)
		);
		?>
		<?php get_template_part( 'template-parts/site/navigation', null, array( 'id' => 'main-navigation' ) ); ?>
	</nav>
</header><!-- .site-header -->
