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

#### Components: /inc/components

Templates that are meant to be self-contained and composable. Insert them with `get_component()`.

#### Modules: /inc/modules

More "traditional" theme scaffolds might have called this the "template-parts" folder. Insert them with `get_module()`.

### Source Files: /src

The `src` folder houses all files meant to be compiled into another form or otherwise put through a build process to end up in the `dist` folder. These are generally client-side files like JavaScript and CSS.

#### Scripts: /src/scripts

All JS files in the root of `/src/scripts` are considered entrypoints and will be compiled and placed in the `/dist/js` folder. The workflow utilizes the WebPack configuration from [wp-scripts](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-scripts/), so you can write ESNext and also import CSS/Sass to be compiled as well.

#### Styles: /src/styles

For a brief intro to the basic foundation of our scaffold styling system, see this [CSS Tricks article about using BEM and utility classes](https://css-tricks.com/building-a-scalable-css-architecture-with-bem-and-utility-classes/).

### Distributable Files: /dist

The `dist` folder houses all compiled files. You might not see it yet if you've just downloaded the scaffolding and haven't run the build process.

### Translation Files: /language

The `languages` folder is for translation files. The build workflow automatically generates a `.pot` file that can be used to translate the theme wherever i18n functions have been used.

---

# Theme Scaffold

TODO: Boilerplate README info
