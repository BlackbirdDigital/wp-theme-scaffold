<?php
/**
 * Partial: site-branding, footer variation.
 *
 * @package theme-scaffold
 */

?>
<div class="site-branding site-branding--footer">
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
