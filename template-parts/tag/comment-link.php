<?php
/**
 * Partial: tag-comment-link.
 *
 * Output "leave a comment" link.
 *
 * @package themescaffold
 */

$defaults = array(
	'class' => '',
	/* translators: %s: post title */
	'label' => __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'themescaffold' ),
);

$args = wp_parse_args( $args, $defaults );

if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
	?>

<span class="tag-comment-link <?php echo esc_attr( $args['class'] ); ?>">
	<?php
	comments_popup_link(
		sprintf(
			wp_kses(
				$args['label'],
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
