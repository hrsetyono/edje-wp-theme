# Edje WordPress Theme

A WordPress starter theme for developer using Timber Library and ACF Pro. Also supports WooCommerce.

Stylesheet is compiled with **Node Sass** and using [Edje Framework](https://github.com/hrsetyono/edje). Visit that link to know how to compile Sass.

**REQUIREMENTS**

- PHP 7.0+
- WordPress 5.0+
- [Composer 1.8](https://getcomposer.org/)
- [Timber 1.8.0+](https://wordpress.org/plugins/timber-library/)
- [ACF Pro 5.8](https://www.advancedcustomfields.com/)

**TABLE OF CONTENTS**

1. [Installation](#installation)
1. [Useful Links](#useful-links)
1. [Changelog](https://github.com/hrsetyono/edje-wp-theme/wiki/Changelog)

## Installation

**MANUAL**

1. Copy this repo to your WordPress theme directory
1. Download the required plugins, they are: [Timber](https://wordpress.org/plugins/timber-library/), [ACF Pro](https://www.advancedcustomfields.com/pro/) (Paid), and [Edje WP Library](https://github.com/hrsetyono/edje-wp-library)

**WITH COMPOSER**

Available in Packagist under the name `pixelstudio/edje-wp-theme`.

Our recommended **composer.json** that will also download required plugins and WordPress core files:

```
{
  "name": "pixelstudio/new-site",
  "description": "Run the command `composer update` to download all plugins and themes.",
  "authors": [
    { "name": "Pixel Studio", "email": "info@pixelstudio.id", "homepage": "https://pixelstudio.id" }
  ],
  "require": {
    "pixelstudio/edje-wp-theme": "~4.0",
    "pixelstudio/advanced-custom-fields": "~5.8",
    "pixelstudio/edje-wp-library": "~2.0",
    "pixelstudio/wp-sync-db": "~1.6",
    "pixelstudio/wp-sync-media": "~1.1",

    "wpackagist-plugin/jetpack": "*",
    "wpackagist-plugin/timber-library": "*",
    "wpackagist-plugin/autodescription": "*",
    "wpackagist-plugin/contact-form-7": "*",
    "wpackagist-theme/twentynineteen": "*"
  },
  "require-dev": {},
  "autoload": { "psr-0": { "Acme": "src/" } }
}
```

Run `composer update` on empty directory.

For WooCommerce project, add this in `require`:

```
  "wpackagist-plugin/woocommerce": "*",
  "wpackagist-theme/storefront": "*",
  "pixelstudio/edje-wc-library": "~2.0"
```

## Useful Links

1. [What is Edje Sass?](https://github.com/hrsetyono/edje/wiki)
1. [What is Edje WordPress Library?](https://github.com/hrsetyono/edje-wp-library)
1. [What is Edje WooCommerce Library?](https://github.com/hrsetyono/edje-wc-library)
1. [How to compile Sass files?](https://github.com/hrsetyono/edje/wiki#installation)
1. [How to debug with mobile browser?](https://github.com/hrsetyono/generator-edje/wiki/My-Workflow#debugging-in-mobile)