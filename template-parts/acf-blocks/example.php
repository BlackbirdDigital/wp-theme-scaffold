<?php
/**
 * ACF Block: example.
 *
 * @package themescaffold
 */

// Create id attribute allowing for custom "anchor" value.
$block_id = 'acf-example-block-' . $block['id'];
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'acf-example-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text = get_field( 'text' ) ?: 'Your text field here...';

?>
<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
		<span class="acf-example-block__text"><?php echo esc_attr( $text ); ?></span>
		<div class="acf-example-block__content"><InnerBlocks /></div>
</div>
