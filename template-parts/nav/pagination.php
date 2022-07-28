<?php
/**
 * Partial: nav-pagination.
 *
 * Output numbered pagination links with prev/next for the current query.
 *
 * This template can be used for custom pagination if you pass some options to
 * `paginate_links_args` if you know the current page and max pages:
 *
 * get_template_part(
 *     'template-parts/loop/pagination',
 *     'context',
 *     array(
 *         'paginate_links_args' => array(
 *             'current' => $current_page,
 *             'total'   => $max_pages,
 *         ),
 *     )
 * );
 *
 * @package theme-scaffold
 */

$defaults = array(
	'label'               => esc_html_x( 'Page navigation', 'pagination label', 'theme-scaffold' ),
	'paginate_links_args' => array(),
);

$args = wp_parse_args( $args, $defaults );
?>

<div class="nav-pagination">
	<nav class="nav-pagination__nav">
		<?php // Using h2 to provide a heading to the nav section. ?>
		<h2 class="nav-pagination__label"><?php echo $args['label']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2>
		<?php echo paginate_links( $args['paginate_links_args'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</nav>
</div>

<?php