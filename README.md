# Blackbird's WordPress Theme Scaffold

A theme scaffold that is theme.json-ready for WordPress 5.8+ and includes a built-in workflow for custom Gutenberg blocks.

## Getting Started

1. Download this repository and place the folder into your local `wp-content/themes/` directory.
2. Rename the folder to your theme's slug
3. Run a few search & replace actions:
   1. Theme Scaffold: Theme name, title-case with spaces.
   2. theme-scaffold: Theme slug, package name, text domain, and block namespace, lower-case with dashes.
   3. theme_scaffold: Function "namespace", lower-case with underscores.
4. Edit the `style.css` file to include your Author/URL information
5. Remove the scaffold info from the top portion of this README

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

#### Styles: /src/styles

### Distributable Files: /dist

The `dist` folder houses all compiled files. You might not see it yet if you've just downloaded the scaffolding and haven't run the build process.

### Translation Files: /language

The `languages` folder is for translation files. The build workflow automatically generates a `.pot` file that can be used to translate the theme wherever i18n functions have been used.

---

# Theme Scaffold

TODO: Boilerplate README info
