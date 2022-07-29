<?php
/**
 * Patrial: tag-term-list.
 *
 * Output a list of terms from the post. Taxonomy defaults to `post_tag`.
 *
 * @package theme-scaffold
 */

$defaults = array(
	'label'    => esc_html_x( 'Posted in', 'post tags label', 'theme-scaffold' ),
	'linked'   => true,
	'taxonomy' => 'post_tag',
);

$args = wp_parse_args( $args, $defaults );

$term_list = '';
if ( $args['linked'] ) {
	$term_list = get_the_term_list( get_the_ID(), $args['taxonomy'], '', esc_html_x( ', ', 'term list separator', 'theme-scaffold' ), '' );
} else {
	$terms = get_the_terms( get_the_ID(), $args['taxonomy'] );
	if ( is_array( $terms ) && $terms[0] instanceof WP_Term ) {
		$terms     = wp_list_pluck( $terms, 'name' );
		$terms     = array_map(
			function( $term ) {
				return sprintf( '<span>%s</span>', $term );
			},
			$terms
		);
		$term_list = implode( ', ', $terms );
	}
}

if ( $term_list && ! is_wp_error( $term_list ) ) :
	?>

<span class="tag-term-list" data-taxonomy="<?php echo esc_attr( $args['taxonomy'] ); ?>">
	<span class="tag-term-list__label"><?php echo $args['label']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
	<span class="tag-term-list__terms"><?php echo $term_list; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
</span>

	<?php
endif;
