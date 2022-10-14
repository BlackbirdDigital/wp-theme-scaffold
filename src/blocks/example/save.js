/**
 * Block: example, save.
 */

// WordPress
import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';

export default function save() {
	// If a dynamic block, return null or <InnerBlocks.Content />
	return <InnerBlocks.Content />;

	// If not a dynamic block, you must return the full markup to be saved.
	/*
	const blockProps = useBlockProps.save();
	const innerBlocksProps = useInnerBlocksProps.save( {
		className: 'wp-block-themescaffold-example__content',
	} );
	return (
		<div { ...blockProps }>
			<p>Hello Blocks</p>
			<div { ...innerBlocksProps} />
		</div>
	);
	*/
}
