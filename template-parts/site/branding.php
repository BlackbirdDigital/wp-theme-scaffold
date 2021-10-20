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
		$theme_scaffold_description = get_bloginfo( 'description', 'display' );
		if ( $theme_scaffold_description || is_customize_preview() ) :
			?>
			<p class="site-description"><?php echo $theme_scaffold_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php
		endif;
	endif;
	?>
</div><!-- .site-branding -->
