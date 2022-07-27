/**
 * Main entrypoint for theme scripts that should be loaded on every page.
 */

import { applyToggleExpanded } from './theme/toggle-expanded';
import { applyMenuFocus } from './theme/menu-focus';

/**
 * Make our menu toggle buttons expand the element defined in its aria-controls
 * attribute.
 *
 * A second argument can be passed to specify options, such as
 * `clickOutsideClose`, which can turn off the close behavior when clicking
 * outside the target element.
 *
 * This can be used for any other toggle button that expands any element, for
 * example, an FAQ section.
 */
applyToggleExpanded( '.menu-toggle' );

/**
 * Make our menus and submenus focusable with the tab key, and also add a
 * "focus" class.
 */
applyMenuFocus( '.menu, [class^="menu--"]' );
