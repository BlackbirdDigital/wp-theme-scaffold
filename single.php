<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package themescaffold
 */

get_header();
?>

<main id="content" class="site-content">

	<?php
	while ( have_posts() ) :
		the_post();

		if ( is_post_type_hierarchical( get_post_type() ) ) {
			// If post type is hierarchical, it should probably be displayed as a page.
			get_template_part( 'template-parts/content/page', get_post_type() );
		} else {
			// If post type is not hierarchical, it should probably be displayed as an entry.
			get_template_part( 'template-parts/content/entry', get_post_type() );

			/*
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			*/
		}

	endwhile; // End of the loop.
	?>

</main>

<?php
get_footer();
