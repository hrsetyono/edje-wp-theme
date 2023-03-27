<?php

if (is_admin()) {
  my_custom_block_styles();
  my_custom_block_patterns();

  add_filter('h_disallowed_blocks', 'my_disallowed_blocks');
}


/**
 * Register custom block style
 */
function my_custom_block_styles() {
  // register_block_style('core/table', [ 'name' => 'sample', 'label' => 'Sample Style' ]);
}

/**
 * Create custom patterns
 * 
 * How to format: Create the block in editor, copy it, paste it in https://codebeautify.org/javascript-escape-unescape
 */
function my_custom_block_patterns() {
  register_block_pattern('my/features', [
    'title' => 'Features',
    'categories' => [ 'text' ],
    'description' => '3 Images and a short text below it',
    'content' => "<!-- wp:columns -->\n<div class=\"wp-block-columns alignwide\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Heading</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Heading</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Heading</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->"
  ]);
}

/**
 * Limit the available blocks
 * 
 * @filter h_disallowed_blocks
 */
function my_disallowed_blocks($blocks) {
  $disabled_blocks = [
    'core/video',
    'core/pullquote',
    'core/nextpage',
    'core/more',
    'core/preformatted',
    'core/code',

    // widget
    'core/calendar',
    'core/tag-cloud',
    'core/search',
    'core/latest-comments',
    'core/rss',
    'core/archives',
    'core/categories',
    'core/social-links',

    // full-site editing
    'core/site-logo',
    'core/site-tagline',
    'core/site-title',
    'core/query',
    'core/post-title',
    'core/post-content',
    'core/post-date',
    'core/post-excerpt',
    'core/post-featured-image',
    'core/loginout',
    'core/page-list',
    'core/query-title',
    'core/post-terms',
    'core/navigation',
    'core/post-author',
    'core/post-comments',
    'core/term-description',
    'core/post-navigation-link',
  ];

  if (class_exists('Jetpack')) {
    $disabled_blocks = array_merge($disabled_blocks, [
      'jetpack/contact-info',
      'jetpack/business-hours',
      'jetpack/slideshow',
      'jetpack/image-compare',
      'jetpack/rating-star',
      'jetpack/send-a-message',
      'jetpack/calendly',
      'jetpack/eventbrite',
      'jetpack/gif',
      'jetpack/markdown',
      'jetpack/opentable',
      'jetpack/google-calendar',
      'jetpack/podcast-player',
      'jetpack/map',
      'jetpack/pinterest',
      'jetpack/revue',
      'jetpack/repeat-visitor',
      'jetpack/story',
      'jetpack/recurring-payments',
    ]);
  }

  if (class_exists('WooCommerce')) {
    $disabled_blocks = array_merge($disabled_blocks, [
      'woocommerce/product-search',
      'woocommerce/mini-cart',
      'woocommerce/active-filters',
      'woocommerce/stock-filter',
      'woocommerce/price-filter',
      'woocommerce/attribute-filter',

      'woocommerce/all-reviews',
      'woocommerce/reviews-by-product',
      'woocommerce/reviews-by-category',
      'woocommerce/all-products',
    ]);
  }
  return $disabled_blocks;
}