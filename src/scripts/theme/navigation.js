/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

( function () {
	const button = document.getElementById( 'main-navigation-toggle' );

	// Return early if the button doesn't exist.
	if ( ! button ) {
		return;
	}

	const menu = document.getElementById( 'main-navigation' );

	// Hide menu toggle button if menu is empty and return early.
	if ( ! menu ) {
		button.style.display = 'none';
		return;
	}

	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}

	const menuClosedListener = () => {
		console.log( 'menu closed' );
		document.body.classList.remove( 'menu-closing' );
		menu.removeEventListener( 'transitionend', menuClosedListener );
	};

	const menuClosing = () => {
		console.log( 'menu closing' );
		document.body.classList.add( 'menu-closing' );
		menu.addEventListener( 'transitionend', menuClosedListener );
	};

	const toggleNav = () => {
		document.body.classList.toggle( 'menu-open' );

		if ( document.body.classList.contains( 'menu-open' ) ) {
			button.setAttribute( 'aria-expanded', 'true' );
		} else {
			button.setAttribute( 'aria-expanded', 'false' );
			menuClosing();
		}
	};

	const closeNav = () => {
		document.body.classList.remove( 'menu-open' );
		button.setAttribute( 'aria-expanded', 'false' );
		menuClosing();
	};

	// Toggle the .open class and the aria-expanded value each time the button is clicked.
	button.addEventListener( 'click', toggleNav );

	// Remove the .open class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener( 'click', function ( event ) {
		const isClickInside = document.body.contains( event.target );

		if ( ! isClickInside ) {
			closeNav();
		}
	} );

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

	/**
	 * Sets or removes .focus class on an element.
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
} )();
