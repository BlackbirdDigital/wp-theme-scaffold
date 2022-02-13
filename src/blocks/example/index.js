/**
 * Block: example, editorScript.
 *
 * Enqueued in editor.
 */

// WordPress
import { registerBlockType } from '@wordpress/blocks';

// Metadata
import { name } from './block.json';

import icon from './icon';
import edit from './edit';
import save from './save';
import example from './example';

registerBlockType( name, {
	icon,
	edit,
	save,
	example,
} );
