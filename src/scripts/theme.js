/**
 * Main entrypoint for theme scripts that should be loaded on every page.
 */

import { applyToggleExpanded } from './theme/toggle-expanded';
import { applyMenuFocus } from './theme/menu-focus';

/**
 * Make our menu toggle buttons expand the element defined in its aria-controls
 * attribute.
 *
 * This can be used for any other toggle button that expands any element, for
 * example, an FAQ section.
 */
applyToggleExpanded( '.menu-toggle' );

/**
 * Make our menus and submenus focusable with the tab key, and also add a
 * "focus" class.
 *
 * Note: Make sure if you add a custom `menu_class` to include the standard menu
 * class as well:
 *
 * 		wp_nav_menu( array(
 * 			'theme_location' => 'primary',
 * 			'menu_class'     => 'menu menu--primary',
 * 		) );
 */
applyMenuFocus( '.menu' );
