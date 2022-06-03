/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 *
 * Edit the selector at the bottom to target your menu toggle button className.
 */

/**
 * Make a menu's links focusable.
 *
 * @param {Element} menu Menu element.
 */
function focusableMenu( menu ) {
	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName( 'a' );

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll(
		'.menu-item-has-children > a, .page_item_has_children > a'
	);

	// Toggle focus each time a menu link is focused or blurred.
	for ( const link of links ) {
		link.addEventListener( 'focus', toggleFocus, true );
		link.addEventListener( 'blur', toggleFocus, true );
	}

	// Toggle focus each time a menu link with children receive a touch event.
	for ( const link of linksWithChildren ) {
		link.addEventListener( 'touchstart', toggleFocus, false );
	}
}

/**
 * Sets or removes .focus class on an element.
 *
 * @param object Event object.
 */
function toggleFocus( event ) {
	if ( event.type === 'focus' || event.type === 'blur' ) {
		let self = this;
		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( ! self.classList.contains( 'nav-menu' ) ) {
			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				self.classList.toggle( 'focus' );
			}
			self = self.parentNode;
		}
	}

	if ( event.type === 'touchstart' ) {
		const menuItem = this.parentNode;
		event.preventDefault();
		for ( const link of menuItem.parentNode.children ) {
			if ( menuItem !== link ) {
				link.classList.remove( 'focus' );
			}
		}
		menuItem.classList.toggle( 'focus' );
	}
}

// Holds a reference to a dynamic even handler function.
let clickOutsideCloseTargetHandler;

/**
 * Find each menu toggle button, link up via aria-controls
 * attribute.
 *
 * @param Node button Menu toggle button element with an aria-controls attribute.
 */
function setupMenuToggle( button ) {
	const targetId = button.getAttribute( 'aria-controls' );
	if ( ! targetId ) {
		return;
	}
	const target = document.getElementById( targetId );
	const startExpanded =
		target.getAttribute( 'aria-expanded' ) === 'true' ? 'true' : 'false';
	target.setAttribute( 'aria-expanded', startExpanded );
	button.setAttribute( 'aria-expanded', startExpanded );

	// Toggle the aria-expanded value each time the button is clicked.
	button.addEventListener( 'click', function () {
		const newExpanded =
			target.getAttribute( 'aria-expanded' ) === 'true'
				? 'false'
				: 'true';
		target.setAttribute( 'aria-expanded', newExpanded );
		button.setAttribute( 'aria-expanded', newExpanded );

		if ( newExpanded === 'true' ) {
			// Set aria-expanded to false when the user clicks outside the target.
			clickOutsideCloseTargetHandler = clickOutsideCloseTarget(
				target,
				button
			);
			document.addEventListener(
				'click',
				clickOutsideCloseTargetHandler
			);
		}
	} );

	if ( startExpanded === 'true' ) {
		// Set aria-expanded to false when the user clicks outside the target.
		clickOutsideCloseTargetHandler = clickOutsideCloseTarget(
			target,
			button
		);
		document.addEventListener( 'click', clickOutsideCloseTargetHandler );
	}
}

/**
 * Close target menu whehn clicking outside.
 *
 * @param Node target Target menu element.
 * @param Node button Menu toggle button element.
 * @returns
 */
function clickOutsideCloseTarget( target, button ) {
	return ( event ) => {
		const isClickInside =
			( target.contains( event.target ) &&
				! event.target.getAttribute( 'aria-controls' ) ===
					`#${ target.id }` ) ||
			button.contains( event.target );

		if ( ! isClickInside ) {
			target.setAttribute( 'aria-expanded', 'false' );
			button.setAttribute( 'aria-expanded', 'false' );
			document.removeEventListener(
				'click',
				clickOutsideCloseTargetHandler
			);
		}
	};
}

/**
 * Initialize.
 */
( function () {
	// Get all menus on page and make focusable.
	const menus = document.querySelectorAll( '[class^="menu"] > ul' );
	for ( let i = 0; i < menus.length; i++ ) {
		focusableMenu( menus[ i ] );
	}

	// Get all menu-toggle buttons on page and connect with target.
	const menuToggles = document.getElementsByClassName( 'menu-toggle' );
	for ( let i = 0; i < menuToggles.length; i++ ) {
		setupMenuToggle( menuToggles[ i ] );
	}
} )();
