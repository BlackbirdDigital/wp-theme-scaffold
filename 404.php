<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package theme-scaffold
 */

get_header();
?>

<main id="content" class="site-content">

	<section class="error-404 not-found">
		<header class="header">
			<h1 class="title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'theme-scaffold' ); ?></h1>
		</header>

		<div class="content block-container">
			<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'theme-scaffold' ); ?></p>

		</div>
	</section><!-- .error-404 -->

</main>

<?php
get_footer();
