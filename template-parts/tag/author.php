<?php
/**
 * Partial: tag-author.
 *
 * Output author vcard, optionally linked.
 *
 * @package theme-scaffold
 */

$defaults = array(
	'element' => 'span',
	'label'   => esc_html_x( 'by', 'post author byline', 'theme-scaffold' ),
	'linked'  => true,
);

$byline_format = $args['linked'] ? '<a class="tag-author__author" href="%2$s">%1$s</a>' : '<span class="tag-author__author">%1$s</span>';
$byline        = sprintf(
	$byline_format,
	esc_html( get_the_author() ),
	esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
);
?>

<<?php echo esc_html( $args['element'] ); ?> class="tag-author">
	<span class="tag-author__label"><?php echo $args['label']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
	<?php echo $byline; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
</<?php echo esc_html( $args['element'] ); ?>>
