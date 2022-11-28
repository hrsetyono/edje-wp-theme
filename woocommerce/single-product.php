<?php
global $post;

$catalog_columns = get_option('woocommerce_catalog_columns');
$related_ids = wc_get_related_products($post->ID, $catalog_columns);

$args = [
  'post' => $post,
  // 'product' => wc_get_product($post->ID),
  'thumbnail_url' => get_the_post_thumbnail_url($post, 'thumbnail'),
  'total_sales' => get_post_meta($post->ID, 'total_sales', true),

  // Args to be passed to Related Products
  'related_args' => [
    'catalog_columns' => $catalog_columns,
    'products' => get_posts([
      'post_type' => 'product',
      'post__in' => $related_ids,
      'orderby' => 'post__in',
    ]),
    'extra_classes' => 'is-style-my-slider',
  ],
];

get_header();
get_template_part('woocommerce/views/single-product', '', $args);
get_footer();