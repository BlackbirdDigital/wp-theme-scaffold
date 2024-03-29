<?php
/**
 * Partial: content-none.
 *
 * Displayed when there are no posts in a loop.
 *
 * @package themescaffold
 */

?>

<section class="content-none no-results not-found">
	<header class="content-none__header header">
		<h1 class="content-none__title title"><?php esc_html_e( 'Nothing Found', 'themescaffold' ); ?></h1>
	</header>

	<div class="content-none__content content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'themescaffold' ),
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

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'themescaffold' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'themescaffold' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div>
</section>
