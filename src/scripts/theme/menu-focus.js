/**
 * Handle tab key navigation support for menu dropdowns.
 */

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

/**
 * Make a menu's links and submenus focusable.
 *
 * @param {Element} menu Menu element.
 */
export function menuFocus( menu ) {
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
 * Apply menuFocus to all queried menus.
 */
export function applyMenuFocus( menuQuery = '.menu' ) {
	const menus = document.querySelectorAll( menuQuery );
	for ( const menu of menus ) {
		menuFocus( menu );
	}
}

export default applyMenuFocus;
