<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package theme-scaffold
 */

get_header();
?>

<main id="content" class="site-content">

	<?php
	if ( have_posts() ) :

		get_template_part( 'template-parts/loop/archive', 'search' );

	else :

		get_template_part( 'template-parts/content/none' );

	endif;
	?>

</main>

<?php
get_footer();
