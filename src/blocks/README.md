# Blocks

The `src/blocks` folder is for custom Gutenberg blocks.

While it is generally not recommended to include blocks within themes, when we
are building very custom-designed websites we often need very custom-designed
blocks that don't make sense to try to abstract as a plugin that will survive
across theme activations.

Each block should be contained within a folder named for its base name (don't include the namespace). This folder should contain all files related to the block, including:
- `block.json`:  Block metadata file (required)
- `index.js`:    Entrypoint for editor functionality (required)
- `style.scss`:  Front-end styles that will also be enqueued in the editor (recommended)
- `editor.scss`: Editor-only style overrides
- `script.js`:   Front and editor javascript enqueued if the block is present
- `view.js`:     Front-end-only javascript enqueued if the block is present

You can of course include other files/folders as needed, but only the root files will be copied/compiled to the dist folder.

Check out the example block for more info.
