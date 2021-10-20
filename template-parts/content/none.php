<?php
/**
 * Partial: content-none.
 *
 * @package theme-scaffold
 */

?>

<section class="content-none no-results not-found">
	<header class="content-none__header page-header">
		<h1 class="content-none__title page-title"><?php esc_html_e( 'Nothing Found', 'theme-scaffold' ); ?></h1>
	</header><!-- .page-header -->

	<div class="content-none__content page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'theme-scaffold' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'theme-scaffold' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'theme-scaffold' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div>
</section><!-- .content-none -->
