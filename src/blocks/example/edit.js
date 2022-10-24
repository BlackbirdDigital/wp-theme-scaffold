/**
 * Block: example, edit.
 */

// WordPress
import { useBlockProps, useInnerBlocksProps } from '@wordpress/block-editor';

const template = [ [ 'core/paragraph', { placeholder: 'Hello' } ] ];
const allowedBlocks = [ 'core/paragrpah' ];

export default function edit() {
	const blockProps = useBlockProps();
	const innerBlocksProps = useInnerBlocksProps(
		{
			className: 'wp-block-themescaffold-example__content',
		},
		{
			template,
			allowedBlocks,
		}
	);

	return (
		<div { ...blockProps }>
			<p>Hello Blocks</p>
			<div { ...innerBlocksProps } />
		</div>
	);
}
