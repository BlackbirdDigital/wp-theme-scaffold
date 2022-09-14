/**
 * Toggle area-expanded attributes via aria-controls.
 */

const controlled = [];

/**
 * Link button with controlled element via aria-controls attribute.
 *
 * When pressed, the button will toggle the aria-expanded attribute on both the button and the controlled element.
 *
 * @param {Node} button A button element with an aria-controls attribute.
 * @param {object} options Options for the toggle functionality.
 * @param {boolean} options.clickOutsideClose Whether to close the target element when clicking outside. Default true.
 */
export const toggleExpanded = ( target, { clickOutsideClose = true } ) => {
	const targetId = target.id;
	const buttons = document.querySelectorAll(
		'[aria-controls="' + targetId + '"]'
	);

	if ( buttons.lenth === 0 ) {
		console.warn(
			'No buttons found with aria-controls="' + targetId + '".'
		);
		return;
	}

	// Only set event listeners once per target.
	if ( controlled.includes( target ) ) {
		return;
	}

	controlled.push( target );

	const startExpanded =
		target.getAttribute( 'aria-expanded' ) === 'true' ? 'true' : 'false';
	target.setAttribute( 'aria-expanded', startExpanded );
	buttons.forEach( ( button ) =>
		button.setAttribute( 'aria-expanded', startExpanded )
	);

	// Toggle the aria-expanded value each time the button or outside the target is clicked.
	document.addEventListener( 'click', ( event ) => {
		// Whether a toggle button was clicked.
		let buttonClick = false;
		for ( let i = 0; i < buttons.length; i++ ) {
			if ( buttons.item( i ).contains( event.target ) ) {
				buttonClick = true;
				break;
			}
		}

		// If NOT allowing for click outside to close the target, don't continue if the click was outside the target.
		if ( ! clickOutsideClose && ! buttonClick ) {
			return;
		}

		// If click is inside the menu and not a toggle button, don't continue.
		if ( target.contains( event.target ) && ! buttonClick ) {
			return;
		}

		// Check if target is currently expanded.
		const expanded = target.getAttribute( 'aria-expanded' ) === 'true';

		// If not expanded, only the button should expand the target.
		if ( ! expanded && ! buttonClick ) {
			return;
		}

		const newExpanded =
			target.getAttribute( 'aria-expanded' ) === 'true'
				? 'false'
				: 'true';
		target.setAttribute( 'aria-expanded', newExpanded );
		buttons.forEach( ( button ) =>
			button.setAttribute( 'aria-expanded', newExpanded )
		);
	} );
};

/**
 * Apply toggleExpanded to all queried elements.
 *
 * @param {string} targetID The id attribute for all targets to apply the expanded toggle functionality to.
 * @param {object} options Options for the toggle functionality. @see {@link toggleExpanded} for available options.
 */
export const applyToggleExpanded = (
	targetID = '#main-navigation',
	options = {}
) => {
	const target = document.getElementById( targetID );
	toggleExpanded( target, options );
};

export default applyToggleExpanded;
