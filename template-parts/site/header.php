<?php
/**
 * Partial: site-header.
 *
 * @package theme-scaffold
 */

?>

<header id="masthead" class="site-header">
	<nav class="site-header__nav">
		<?php get_template_part( 'template-parts/site/branding' ); ?>

		<?php get_template_part( 'template-parts/site/navigation', null, array( 'id' => 'main-navigation' ) ); ?>
	</nav>
</header><!-- .site-header -->
