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

## Installation

**MANUAL**

1. Copy this repo to your WordPress theme directory
1. Download the required plugins, they are: [Timber](https://wordpress.org/plugins/timber-library/), [ACF Pro](https://www.advancedcustomfields.com/pro/) (Paid), and [Edje WP Library](https://github.com/hrsetyono/edje-wp-library)

**WITH COMPOSER**

> Available in Packagist under the name `pixelstudio/edje-wp-theme`.

This is our workflow for starting new project. This steps will also download WP Core files and other required plugins.

1. Create empty directory then create new file named `composer.json`. Put this code below inside it:

    ```
    {
      "name": "pixelstudio/new-site",
      "description": "Run the command `composer update` to download all plugins and themes.",
      "authors": [
        { "name": "Pixel Studio", "email": "info@pixelstudio.id", "homepage": "https://pixelstudio.id" }
      ],
      "require": {
        "pixelstudio/wordpress": "~5.2",
        "pixelstudio/edje-wp-theme": "~5.0",
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
      "suggest": {
        "pixelstudio/edje-wc-library": "~2.0",
        "wpackagist-plugin/woocommerce": "*",
        "wpackagist-theme/storefront": "*"
      },
      "repositories":[
        { "type": "composer", "url":"https://wpackagist.org" }
      ],
      "autoload": { "psr-0": { "Acme": "src/" } }
    }
    ```

1. If you want WooCommerce site, add the value of `suggest` to `require`.

1. Run the command `composer update` in that directory.

1. Done! You will find the WP Core files inside `wp-core/` directory. Cut it to root.

1. Recommended: Rename `edje-wp-theme` so it won't be overriden the next time you run `composer update`. Also remove `pixelstudio/wordpress` in JSON file after first installation.

## Used In

Here are some websites that uses this theme:

- [WordPress Tips - Advanced Tutorial](https://wptips.dev)
- [Angela Chung - Fashion Designer](https://angela-chung.com)
- [Briliant Glass - Glassware Factory](https://briliant.glass)
- [Fitnation - Premium Gym](https://fitnation.co.id)
- [Istana Mie - Restaurant Franchise](https://istanamie.com)
- [LTL School - Learn Mandarin in China](https://ltl-school.com)
- [GES13 - Refrigeration Distributor](https://ges13.com)
- [Paritama - Garden Architecture](https://paritama.com)
- [Pandarin - Mandarin Learning Center](https://pandarin.net)
- [Pixel Studio - Web Designer](https://pixelstudio.id)
- [Premiera Skincare](https://premieraskincare.com/)

## Useful Links

1. [What is Edje Sass?](https://github.com/hrsetyono/edje/wiki)
1. [What is Edje WordPress Library?](https://github.com/hrsetyono/edje-wp-library)
1. [What is Edje WooCommerce Library?](https://github.com/hrsetyono/edje-wc-library)
1. [How to compile Sass files?](https://github.com/hrsetyono/edje/wiki#installation)
1. [How to debug with mobile browser?](https://github.com/hrsetyono/generator-edje/wiki/My-Workflow#debugging-in-mobile)
