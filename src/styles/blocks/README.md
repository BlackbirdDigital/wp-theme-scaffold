Block Style Overrides
=====================

This directory contains style overrides for existing blocks. The styles are
automatically loaded on the front end only if the block is present via
`wp_enqueue_block_style()`.

The only requirements are that the file name matches the block name, and that
the folder it's in matches the block namespace. For example:

```
src/
└── styles/
	└── blocks/
		├── core/
		│   ├── button.css
		│   ├── cover.css
		│   └── group.css
		└── custom/
			├── my-block.css
			└── my-other-block.css
```

In the above example, blocks with these names will have their styles loaded:

- `core/button`
- `core/cover`
- `core/group`
- `custom/my-block`
- `custom/my-other-block`

You can use this system to add styles to core blocks, your own custom blocks,
and any third-party blocks you have installed as long as you know the block name
and namespace.

In order for these styles to be processed by the gulp-wp workflow, the `styles`
task's `src` config has been modified in `gulp-wp.config.js` to include only
files that are nested in a namespace folder like the example above.

The function that loads these styles is located in `inc/blocks.php` as
`block_style_overrides()`.
