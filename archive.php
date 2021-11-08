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

<main id="content" class="site-content archive">

	<?php
	if ( have_posts() ) :

		get_template_part( 'template-parts/loop/archive' );

	else :

		get_template_part( 'template-parts/content/none' );

	endif;
	?>

</main>

<?php
get_sidebar();
get_footer();
