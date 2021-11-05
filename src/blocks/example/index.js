/**
 * Block: example, editorScript.
 *
 * Enqueued in editor.
 */

// WordPress
import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';

// Metadata
import { name } from './block.json';

registerBlockType( name, {
	edit() {
		const blockProps = useBlockProps();
		return (
			<div { ...blockProps }>
				<p>Hello Blocks</p>
				<InnerBlocks />
			</div>
		);
	},
	save() {
		// If not a dynamic block, you must return the markup to be saved.
		/*
		const blockProps = useBlockProps.save();
		return <p { ...blockProps }>Hello Blocks</p>;
		*/
		// If a dynamic block, return null or <InnerBlocks.Content />
		return <InnerBlocks.Content />;
	},
} );
