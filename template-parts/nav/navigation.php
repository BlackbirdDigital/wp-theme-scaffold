<?php
/**
 * Partial: nav-navigation.
 *
 * Output prev/next links to adjacent posts. Meant as a replacement for
 * the_post_navigation().
 *
 * @link https://developer.wordpress.org/reference/functions/the_posts_navigation/
 *
 * @package theme-scaffold
 */

$defaults = array(
	'prev_text'          => 'Previous: %title',
	'next_text'          => 'Next: %title',
	'in_same_term'       => false,
	'excluded_terms'     => '',
	'taxonomy'           => 'category',
	'label' => __( 'Post navigation', 'theme-scaffold' ),
	'class'              => 'post-navigation',
);

$args = wp_parse_args( $args, $defaults );
?>

<div class="nav-navigation">
	<nav class="nav-navigation__nav">
		<?php // Using h2 to provide a heading to the nav section. ?>
		<h2 class="nav-navigation__label"><?php echo $args['label']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h2>
		<div class="nav-navigation__links">
			<?php
			previous_post_link(
				'<div class="nav-navigation__link nav-navigation__link--prev">%link</div>',
				$args['prev_text'],
				$args['in_same_term'],
				$args['excluded_terms'],
				$args['taxonomy']
			);
			next_post_link(
				'<div class="nav-navigation__link nav-navigation__link--next">%link</div>',
				$args['next_text'],
				$args['in_same_term'],
				$args['excluded_terms'],
				$args['taxonomy']
			);
			?>
		</div>
	</nav>
</div>
