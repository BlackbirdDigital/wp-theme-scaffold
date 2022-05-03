# Blackbird's WordPress Theme Scaffold

A theme scaffold that is theme.json-ready for WordPress 5.8+ and includes a built-in workflow for custom Gutenberg blocks.

## Getting Started

1. Download this repository and place the folder into your local `wp-content/themes/` directory.
2. Rename the folder to your theme's slug
3. Run a few search & replace actions:
   1. Theme Scaffold: Theme name, title-case with spaces.
   2. ThemeScaffold: Theme namespace, pascal-case (no spaces).
   3. theme-scaffold: Theme slug, package name, text domain, and block namespace, lower-case with dashes.
   4. theme_scaffold: Function "namespace", lower-case with underscores.
4. Edit the `style.css` file to include your Author/URL information
5. Remove the scaffold info from the top portion of this README

## Agency-focused Theme Scaffold

WordPress theme scaffolds are a-dime-a-dozen, so why build another?

This scaffold is primarily meant to address pain points common to custom WordPress agency development work. Most theme scaffolds are very broad and are aimed at theme repository or premium theme developers. We needed a starting point that, among other things:

1. Is custom post type ready. Template-parts like `content.php` are ready to be extended like `content-customslug.php`, and different ways of viewing posts are accounted for with `excerpt.php` and potentially others.
2. Includes a workflow for custom Gutenberg blocks that are theme-specific.
3. Includes a starting point with `theme.json` and a framework for utilizing the custom space for global properties.

## Theming Approach

In WordPress 5.8, the [theme.json](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/) file was introduced as a way to configure a theme for interoperability with the Gutenberg editor. You can read the link for details, but one of the key aspects of `theme.json` that we are making heavy use of in this scaffold is the [automatic generation of CSS custom properties](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/#css-custom-properties-presets-custom).

In this scaffold, we make use of the `settings.custom` property to define all of our [Design Tokens](https://css-tricks.com/what-are-design-tokens/). This is a single source of truth for things that the Gutenberg editor will inherit, such as colors, font families & sizes, and layout widths, but also additional properties as needed. **In general, we prefer to define "variables" for our theme here instead of in Sass.**

## Scaffold Contents

### Includes: /inc

The `inc` folder houses the majority of the PHP files for the theme outside of the standard template hierarchy files.

### Components: /components

Templates that are meant to be self-contained (not using contextual functions/template tags) and composable. Insert them with `ThemeScaffold\Utilities\get_component()`.

See the [Components README](./components/README.md) for more information.

### Template Parts: /template-parts

Template parts for building page and post templates modularly. Unlike Components, these should make full use of contextual functions/template tags. The scaffolding includes a starting point for organizing these into subfolders.

*See the file header of all of the templates below for more info.*

#### Content: /template-parts/content

These files are explicitly for outputting content for posts, pages, and custom post types. They are named according to their role:

- `entry.php`: For any post type that can by syndicated, meaning timestamped with author information. Create variations for different post types.
- `page.php`: Not just for actual pages, but also any post type that is not syndicated, meaning not timestamped with author information and thus not compatible with an RSS-type feed. Create variations for different post types.
- `excerpt.php`: For displaying a summary of a post meant to link to the content. Create variations for different styles of excerpt.

#### Loop: /template-parts/loop

These files are for outputting content in a classic `WP_Query` loop. Generally they are used on archive pages, but can also be used for template parts that display a list of recent posts, for example.

#### Site: /template-parts/site

These files make up the modular components of the site structure.

### Source Files: /src

The `src` folder houses all files meant to be compiled into another form or otherwise put through a build process to end up in the `dist` folder. These are generally client-side files like JavaScript and CSS.

#### Blocks: /src/blocks

A special folder structure for building custom blocks easier. See the [blocks README](src/blocks/README.md) for more information.

#### Scripts: /src/scripts

All JS files in the root of `/src/scripts` are considered entrypoints and will be compiled and placed in the `/dist/js` folder. The workflow utilizes the WebPack configuration from [wp-scripts](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-scripts/), so you can write ESNext and also import CSS/Sass to be compiled as well.

#### Styles: /src/styles

For a brief intro to the basic foundation of our scaffold styling system, see this [article about scaling & maintaining legacy CSS](https://webuild.envato.com/blog/how-to-scale-and-maintain-legacy-css-with-sass-and-smacss/). We are also making use of [BEM syntax and utility classes](https://css-tricks.com/building-a-scalable-css-architecture-with-bem-and-utility-classes/).

There is a nod to SMACSS in our approach, but it is altered/extended for the WordPress theme context and ease-of-use. Most of the partial files throughout the folder structure are imported automatically without you having to remember to import them into an entrypoint file every time. This means that some ideas from SMACSS are bent or extended in order for automatic imports to work within the cascade.

An important point to note is that there is a `context` tool available that allows you to manage what styles are output in the main stylesheet vs the editor stylesheet. See the [tools/_context.scss](src/styles/tools/_context.scss) file for usage information.

The folders in import order:

**1. Base**

`global`: These are overarching styles or styles that need to appear as high up as possible in the cascade.

`elements`: Styles set directly on HTML elements to serve as a basis for the theme.

`typography`: Styles that are typography-focused. These might also contain plenty of element-only styles, but should only apply typographic properties like font family, sizes, weights, and styles, line heights, etc.

**2. Utilities**

Utility classes, which SMACSS doesn't really account for, are generally classes that focus on accomplishing one focused thing and are meant to be used liberally to form the basis of your styles. WordPress itself provides many classes that we need to account for that generally fall into this category, such as `.alignright`, `.has-background`, and `.screen-reader-text`, along with a slew of recommended classes for themes submitted to the theme repository.

**3. Modules**

These are our main BEM component class files. Each module file should be named the same as the "block" (from BEM's **Block**-Element-Modifier) so that when you need to update a module it is easy to find the file it resides in.

**4. Blocks**

Here is where there is an exception made to the standard concept of modules: Gutenberg blocks. Custom block styles should be added to the `blocks` subfolder and named with their block name (minus the namespace). There is a subfolder in `blocks` for core blocks to distinguish them from custom blocks.

Many block styles may `@extend` existing component styles from the `modules` folder; remember you need to `@use` the module file in order to `@extend` a component class.

**Other Folders**

There are some other folders that are not imported in the entrypoint files. The `tools` and `settings` folders contain files that are meant to be used via the `@use` Sass declaration and, most importantly, should **not** include styles that are output into the final CSS.

### Distributable Files: /dist

The `dist` folder houses all compiled files. You might not see it yet if you've just downloaded the scaffolding and haven't run the build process.

### Translation Files: /language

The `languages` folder is for translation files. The build workflow automatically generates a `.pot` file that can be used to translate the theme wherever i18n functions have been used.

---

# Theme Scaffold

TODO: Boilerplate README info
