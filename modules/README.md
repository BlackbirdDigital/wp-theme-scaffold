# Modules

The `modules` folder is for template parts that should use contextual information and APIs from WordPress, such as [template tags](https://developer.wordpress.org/themes/basics/template-tags/) like `the_title()` or other functions that might change the content or layout.

For convenience, you can use `get_module()` function from `inc/utilities.php` to render these templates:

```php
get_module( 'content', 'page', $args_array );
// Outputs modules/content-page.php

// Or pass args as the second parameter if you don't need to specify a specialized template:
get_module( 'content', $args_array );
// Outputs modules/content.php
```

You can also use `get_template_part()` directly specifying the `modules/` folder:

```php
get_template_part( 'modules/content', 'page', $args_array );
// Outputs modules/content-page.php

// Or if you don't need to specify a specialized template:
get_template_part( 'modules/content', null, $args_array );
// Outputs modules/content.php
```

For template parts that are completely self-contained and should render consistently based on arguments, see the components folder.

These templates might also use components via `get_component()` (or good old `get_template_part()`) or other modules internally.
