/**
 * Block: example, icon.
 */

import { Dashicon } from '@wordpress/components';

import { foreground } from '../common';

export default {
	foreground,
	/**
	 * You can replace the Dashicon with custom SVG markup or a core icon. from
	 * the @wordpress/icons module.
	 * @see https://wordpress.github.io/gutenberg/?path=/story/icons-icon--library
	 */
	src: <Dashicon icon="info" />,
};
