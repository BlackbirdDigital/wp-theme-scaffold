# Components

The `components` folder is for template parts that should be completely self-contained and render consistently based on the arguments passed in. They should avoid using [template tags](https://developer.wordpress.org/themes/basics/template-tags/) like `the_title()` or other contextual functions that might change the content or layout.

For convenience, you can use `get_component()` function from `inc/utilities.php` to render these templates:

```php
get_component( 'card', 'media', $args_array );
// Outputs components/card-media.php

// Or pass args as the second parameter if you don't need to specify a specialized template:
get_component( 'card', $args_array );
// Outputs components/card.php
```

You can also use `get_template_part()` directly specifying the `components/` folder:

```php
get_template_part( 'components/card', 'media', $args_array );
// Outputs components/card-media.php

// Or if you don't need to specify a specialized template:
get_template_part( 'components/card', null, $args_array );
// Outputs components/card.php
```

For template parts that use template tags and should render differently based on that context, see the modules folder.

These templates might also use other components via `get_component()` (or good old `get_template_part()`) internally.
