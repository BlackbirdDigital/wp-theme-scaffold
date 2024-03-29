<?php
/**
 * Partial: nav-navigation.
 *
 * Output prev/next links to adjacent posts. Meant as a replacement for
 * the_post_navigation().
 *
 * @link https://developer.wordpress.org/reference/functions/the_posts_navigation/
 *
 * @package themescaffold
 */

$defaults = array(
	'class'          => '',
	'prev_text'      => 'Previous: %title',
	'next_text'      => 'Next: %title',
	'in_same_term'   => false,
	'excluded_terms' => '',
	'taxonomy'       => 'category',
	'label'          => _x( 'Post navigation', 'post prev/next links label', 'themescaffold' ),
);

$args = wp_parse_args( $args, $defaults );
?>

<div class="nav-navigation <?php echo esc_attr( $args['class'] ); ?>">
	<nav class="nav-navigation__nav">
		<?php // Using h2 to provide a heading to the nav section. ?>
		<h2 class="nav-navigation__label"><?php echo esc_html( $args['label'] ); ?></h2>
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
