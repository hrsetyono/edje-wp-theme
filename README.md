# Edje WordPress Theme

A WordPress starter theme built with Timber.

Stylesheet is compiled with **Node Sass**. Visit that link to know how to compile Sass.

**REQUIREMENTS**

- PHP 7.3+
- WordPress 5.7+
- [Composer 1.8](https://getcomposer.org/)
- Node JS

**TABLE OF CONTENTS**

1. [Installation](#installation)
1. [Compiling Sass](#compiling-sass)
1. [Useful Links](#useful-links)

## Installation

**MANUAL**

1. Copy this repo to your WordPress theme directory.
1. Download [Edje WP Library](https://github.com/hrsetyono/edje-wp-library) plugin and put it into your Plugin directory.

**WITH COMPOSER**

> Available in Packagist under the name `pixelstudio/edje-wp-theme`.

This is our workflow for starting a new project:

1. Create a directory, put WP Core files in it.

1. In the root path (where `wp-config` resides), create new file named `composer.json`. Put this code below:

    ```
    {
      "name": "pixelstudio/new-site",
      "description": "Run the command `composer update` to download all plugins and themes.",
      "authors": [
        { "name": "Pixel Studio", "email": "info@pixelstudio.id", "homepage": "https://pixelstudio.id" }
      ],
      "require": {
        "pixelstudio/edje-wp-theme": "~14.1",
        "pixelstudio/edje-wp-library": "~9.0.0"
      },
      "require-dev": {},
      "suggest": {},
      "repositories":[
        { "type": "composer", "url":"https://wpackagist.org" }
      ],
      "autoload": { "psr-0": { "Acme": "src/" } }
    }
    ```

1. Run the command `composer update` in that directory.

1. After first run, rename `edje-wp-theme` so it won't be overriden the next time you run `composer update`. Also remove `pixelstudio/edje-wp-theme` in your Composer JSON.

## Compiling Sass

1. Install Node JS if you don't have it yet.
1. Run `npm update` in this directory to download all modules.
1. Open `webpack.config.js` and change the variable `localDomain` to fit your localhost domain.
1. Run `npm run dev` to watch the Sass files and launch Browser Sync that refreshes the CSS everytime you save.
1. Before pushing to live, run `npm run prod` to minify all CSS and JS.

## Used In

Here are some websites that uses this theme:

- [WordPress Tips - Advanced Tutorial](https://wptips.dev)
- [Gumaya - 5-star Hotel](https://gumayatowerhotel.com)
- [Kantu - Peruvian Gifts](https://mikantu.com)
- [LTL School - Learn Mandarin in China](https://ltl-school.com)
- [Premiera Skincare](https://premieraskincare.com/)
- [Pixel Studio - Web Designer](https://pixelstudio.id)
- [Angela Chung - Fashion Designer](https://angela-chung.com)
- [Briliant Glass - Glassware Factory](https://briliant.glass)
- [Fitnation - Premium Gym](https://fitnation.co.id)
- [Istana Mie - Restaurant Franchise](https://istanamie.com)
- [GES13 - Refrigeration Distributor](https://ges13.com)
- [Paritama - Garden Architecture](https://paritama.com)
- [Pandarin - Mandarin Learning Center](https://pandarin.net)

## Useful Links

1. [What is Edje Sass?](https://github.com/hrsetyono/edje/wiki)
1. [What is Edje WordPress Library?](https://github.com/hrsetyono/edje-wp-library)
1. [What is Edje WooCommerce Library?](https://github.com/hrsetyono/edje-wc-library)
1. [How to compile Sass files?](https://github.com/hrsetyono/edje/wiki#installation)
1. [How to debug with mobile browser?](https://github.com/hrsetyono/generator-edje/wiki/My-Workflow#debugging-in-mobile)
