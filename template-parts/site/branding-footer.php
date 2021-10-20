<?php
/**
 * Site branding
 *
 * @package theme-scaffold
 */

?>
<div class="site-branding">
	<?php
	if ( has_custom_logo() ) :
		the_custom_logo();
	else :
		?>
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php
	endif;
	?>
</div><!-- .site-branding -->
