# Blocks

The `src/blocks` folder is for custom Gutenberg blocks.

While it is generally not recommended to include blocks within themes, when we
are building very custom-designed websites we often need very custom-designed
blocks that don't make sense to try to abstract as a plugin that will survive
across theme activations.

Each block should be contained within a folder named for its base name (don't include the namespace). This folder should contain all files related to the block, but at minimum it should contain a `block.json` metadata file.

Any [defined assets](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#assets) in `block.json` will be compiled, as long as it is either the same extension or an expected variation (ts, jsx, or tsx for .js files, scss or sass for .css files). Defined assets should be in the root of the block folder, paths elsewhere are not intended or tested. You can of course include other files/folders as needed, but only the defined files will be copied/compiled (with any includes) to the dist folder.

You can also include an index.php file, which will be automatically registered as the `render_callback` for a dynamic block (see inc/blocks.php).

Check out the example block for more info.
