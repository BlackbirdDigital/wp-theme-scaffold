<?php
/**
 * Partial: tag-comment-link.
 *
 * Output "leave a comment" link.
 *
 * @package theme-scaffold
 */

if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
	?>

<span class="tag-comment-link">
	<?php
	comments_popup_link(
		sprintf(
			wp_kses(
				/* translators: %s: post title */
				__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'theme-scaffold' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			wp_kses_post( get_the_title() )
		)
	);
	?>
</span>

	<?php
endif;
