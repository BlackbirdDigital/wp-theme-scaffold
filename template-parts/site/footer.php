<?php
/**
 * Partial: site-footer.
 *
 * @package themescaffold
 */

?>

<footer id="colophon" class="site-footer">
	<div class="site-footer__content">
		<nav class="site-footer__nav">
			<?php get_template_part( 'template-parts/site/branding', 'footer' ); ?>
			<?php get_template_part( 'template-parts/site/navigation', 'footer' ); ?>
		</nav>

		<div class="site-footer__widgets">
			<?php block_template_part( 'footer' ); ?>
		</div>
	</div>
</footer><!-- .site-footer -->
