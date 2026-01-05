# WP Theme Template

A lightweight, starter WordPress theme intended for local development and as a base for custom themes. This README follows a consistent structure so contributors and users can find setup, development, and release information quickly.

## Table of contents

- Overview
- Requirements
- Installation
- Quick start (build & watch)
- Available scripts
- Folder structure
- Development workflow
- Packaging / Release
- Contributing
- License

## Overview

This theme provides a minimal, well-organized starting point with Sass-based styles, a small JS entry, and a lightweight framework for template parts, widgets and ACF option exports.

## Requirements

- WordPress 6.9+ (recommended)
- PHP 8.0+ (or newer)
- Node.js and npm (used for compiling Sass and other asset tooling)

## Installation

1. Copy or symlink the `wp-theme-template` folder into your site's `wp-content/themes/` directory.
2. In WP Admin go to Appearance → Themes and activate "WP Theme Template" (or use a child theme).

## Quick start (build & watch)

Install dependencies and start the Sass watcher from the theme root:

```bash
npm install
npm run watch
```

The included `watch` script compiles Sass files to `assets/css/` and keeps them updated while you edit.

## Available scripts

Scripts are defined in `package.json`. Current useful scripts:

- `npm run watch` — Run Sass in watch mode (dev-friendly with source maps).

You can add more scripts (e.g. `build` for production builds, `lint` for style/js linting) as needed.

## Folder structure

Top-level layout and purpose of the main files and folders:

```
your-theme-template/
├── style.css                  # Theme header and base stylesheet (theme metadata)
├── index.php                  # Fallback template
├── 404.php
├── archive.php
├── category.php
├── search.php
├── single.php
├── page.php
├── comments.php
├── header.php
├── footer.php
├── sidebar.php
├── functions.php
├── package.json
├── readme.txt
├── rtl.css
├── assets/
│   ├── css/
│   ├── images/                # Theme images and icons
│   ├── js/
│   ├── libs/
│   └── sass/
├── framework/
│   ├── acf-options.php
│   ├── block-load.php
│   ├── template-helper.php
│   ├── widget-load.php
│   ├── acf-options/
│   ├── block-parts/
│   ├── templates/
│   │   ├── post-card.php
│   │   ├── post-helper.php
│   │   ├── post-index.php
│   │   ├── post-none.php
│   │   ├── post-related.php
│   │   └── post.php
│   └── widgets/
└── languages/
	└── foundero.pot
```

Note: This listing reflects the current `wp-theme-template` folder structure. If you reorganize files (for example, introduce a `dist/` folder for compiled assets or a `src/` folder for a build system), update this section so contributors can find files quickly.

## Development workflow

1. Activate the theme in WordPress.
2. Install npm dependencies and run `npm run watch` while you work on styles.
3. Edit templates in the theme root and partials in `framework/templates/`.
4. For JS changes, edit files under `assets/js/` and add bundling steps if you introduce a bundler (Webpack/Rollup/Vite).

Recommended extra steps (optional):

- Add `stylelint` for SCSS linting and `eslint` for JS linting.
- Add a `build` npm script to produce minified, production-ready CSS/JS.

## Placeholders

Use the table below when adding or replacing template variables in files (style headers, readme, or scripts). These are theme-specific examples for `wp-theme-template`.

| Placeholder           | Description                          | Example             |
| --------------------- | ------------------------------------ | ------------------- |
| `foundero`      | Theme slug (kebab-case)              | `wp-theme-template` |
| `foundero` | Theme slug without separators (flat) | `wpthemetemplate`   |
| `Foundero`      | Theme display name                   | `WP Theme Template` |
| `https://foundero.kinsta.cloud/`       | URL of the interface's public website| `WP Theme Template` |
| `Foundero`       | PHP namespace (PascalCase)           | `WpThemeTemplate`   |
| `foundero`     | Translation text domain              | `wp-theme-template` |

Replace these placeholders in templates and headers when preparing releases or scaffolding new files.

## Packaging / Release

To prepare a release (zip) for distribution:

1. Ensure `style.css` header contains correct theme name and version.
2. Run your production build (e.g., compile and minify assets).
3. Remove any development-only files if desired (node_modules, source maps).
4. Zip the theme folder and upload or publish to your target (WordPress.org requires specific metadata in readme.txt and style.css).

Tip: Add an `npm run build` script that compiles and minifies assets before creating the zip.

## Contributing

Contributions are welcome. Please:

- Open issues for bugs or feature requests.
- Send small, focused pull requests that include a description and testing steps.
- Keep changes to templates/assets clear and document any new build steps.

## License

See `readme.txt` for WordPress.org-style readme details and the project license information.

---

If you'd like, I can also:

- Add a `build` script to `package.json` that runs a production Sass compile and outputs minified CSS.
- Provide a `style.css` header example for copying into your theme's `style.css`.
- Add a simple `release` npm script that creates a zip file of the theme.

Tell me which of the above you'd like and I'll implement it.

