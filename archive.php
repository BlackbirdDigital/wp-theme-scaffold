<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-scaffold
 */

get_header();
?>

	<main id="content" class="site-content">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			while ( have_posts() ) :
				the_post();

				// Include the Post-Type-specific template for the excerpt.
				get_template_part( 'template-parts/content/excerpt', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content/none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
