<?php
/**
 * Block: example.
 *
 * This is an example "dynamic" block template that is rendered on the front end.
 * If you include an `index.php` file in a block folder, it will be
 * automatically included in the block registration as the `render_callback`.
 * If you use this approach, it is recommended that you recreate the markup with
 * JSX in the `index.js` file's `edit` function for the editor.
 *
 * Available globals:
 * - $attributes Block attributes
 * - $content    InnerBlock content (from `save()` in index.js)
 * - $metadata   Block registration metadata from block.json
 *
 * @package themescaffold
 */

/**
 * Get block wrapper attributes, which includes default block class name,
 * alignment class, additional class. Similar to `useBlockProps()` in JS.
 *
 * @link https://developer.wordpress.org/reference/functions/get_block_wrapper_attributes/
 *
 * Note: Dynamic blocks do not support anchor (id attribute) as of v11.8.1:
 * https://github.com/WordPress/gutenberg/pull/24699
 */
$atts = get_block_wrapper_attributes();
?>

<div <?php echo $atts; ?>>
	<p>Hello Blocks</p>
	<div class="wp-block-themescaffold-example__content">
		<?php
		/**
		 * Output block content, which is the markup provided by `save()` in JS.
		 * This is generally used for <InnerBlocks/>.
		 */
		echo $content;
		?>
	</div>
</div>
