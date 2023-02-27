# Edje WordPress Theme

A WordPress starter theme built with Timber.

Stylesheet is compiled with **Node Sass**. Visit that link to know how to compile Sass.

**REQUIREMENTS**

- PHP 7.3+
- WordPress 5.9+
- [Composer 1.8](https://getcomposer.org/)
- Node JS

**TABLE OF CONTENTS**

1. [Installation](#installation)
1. [Compiling Sass](#compiling-sass)
1. [Useful Links](#useful-links)

## Installation

**MANUAL**

1. Copy this repo to your WordPress theme directory.
1. Download [Edje WP Library](https://github.com/hrsetyono/edje-wp-library) plugin as dependency.

**WITH COMPOSER**

If you are using Composer to manage themes and plugins, add these packages:

- `"pixelstudio/edje-wp-theme": "~14.4.0",`
- `"pixelstudio/edje-wp-library": "~9.4",`

Then rename `edje-wp-theme` to prevent it from being overriden.

## Compiling Sass

1. Install Node JS if you don't have it yet.
1. Run `npm update` in this directory to download all modules.
1. Open `webpack.config.js` and change the variable `localDomain` to fit your localhost domain.
1. Run `npm run dev` to watch the Sass files and launch Browser Sync that refreshes the CSS everytime you save.
1. Before pushing to live, run `npm run prod` to minify all CSS and JS.

## Used In

Here are some websites that uses this theme:

- [WordPress Tips - Advanced Tutorial](https://wptips.dev)
- [Gumaya Hotel](https://gumayatowerhotel.com)
- [Kantu Peruvian Gifts](https://mikantu.com)
- [LTL Language School](https://ltl-school.com)
- [Premiera Skincare](https://premieraskincare.com/)
- [Regenix Skincare](https://regenixskincare.com/)
- [Briliant Glass - Glassware Factory](https://briliant.glass)
- [Fitnation - Premium Gym](https://fitnation.co.id)
- [GES13 - Refrigeration Distributor](https://ges13.com)
- [Paritama - Garden Architecture](https://paritama.com)
- [Pandarin - Mandarin Learning Center](https://pandarin.net)
- [Pixel Studio - Web Designer](https://pixelstudio.id)