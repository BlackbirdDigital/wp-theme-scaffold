/**
 * Toggle area-expanded attributes via aria-controls.
 */

/**
 * Link button with controlled element via aria-controls attribute.
 *
 * When pressed, the button will toggle the aria-expanded attribute on both the button and the controlled element.
 *
 * @param {Node} button A button element with an aria-controls attribute.
 * @param {object} options Options for the toggle functionality.
 * @param {boolean} options.clickOutsideClose Whether to close the target element when clicking outside. Default true.
 */
export function toggleExpanded( button, { clickOutsideClose = true } ) {
	if ( ! button.hasAttribute( 'aria-controls' ) ) {
		console.warn(
			'Element missing aria-controls attribute for toggleExpanded:',
			button
		);
		return;
	}

	const targetId = button.getAttribute( 'aria-controls' );
	const target = document.getElementById( targetId );

	const startExpanded =
		target.getAttribute( 'aria-expanded' ) === 'true' ? 'true' : 'false';
	target.setAttribute( 'aria-expanded', startExpanded );
	button.setAttribute( 'aria-expanded', startExpanded );

	// Toggle the aria-expanded value each time the button or outside the target is clicked.
	document.addEventListener( 'click', function ( event ) {
		console.log( button.contains( event.target ) );
		if ( ! clickOutsideClose && ! button.contains( event.target ) ) {
			return;
		}

		// Check if click is inside the menu.
		if (
			target.contains( event.target ) &&
			! button.contains( event.target )
		) {
			return;
		}

		// Check if target is currently expanded.
		const expanded = target.getAttribute( 'aria-expanded' ) === 'true';

		// If not expanded, only the button should expand the target.
		if ( ! expanded && ! button.contains( event.target ) ) {
			return;
		}

		const newExpanded =
			target.getAttribute( 'aria-expanded' ) === 'true'
				? 'false'
				: 'true';
		target.setAttribute( 'aria-expanded', newExpanded );
		button.setAttribute( 'aria-expanded', newExpanded );
	} );
}

/**
 * Apply toggleExpanded to all queried elements.
 *
 * @param {string} buttonsQuery A query selector for all buttons to apply the expanded toggle functionality to.
 * @param {object} options Options for the toggle functionality. @see {@link toggleExpanded} for available options.
 */
export function applyToggleExpanded(
	buttonsQuery = '.toggle-expanded',
	options = {}
) {
	const buttons = document.querySelectorAll( buttonsQuery );
	buttons.forEach( ( button ) => toggleExpanded( button, options ) );
}

export default applyToggleExpanded;
