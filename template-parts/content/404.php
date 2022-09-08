<?php
/**
 * Partial: content-404.
 *
 * This partial is meant for any 404/not found response.
 *
 * @package theme-scaffold
 */

?>

<section class="content-404 not-found">
	<header class="content-404__header header">
		<h1 class="content-404__title title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'theme-scaffold' ); ?></h1>
	</header>

	<div class="content-404__content content">
		<p><?php esc_html_e( 'It looks like nothing was found at this location. Try a search?', 'theme-scaffold' ); ?></p>
		<?php get_search_form(); ?>
	</div>
</section><!-- .content-404 -->
