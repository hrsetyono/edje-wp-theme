<?php
global $woocommerce;

$template = '';
$args = [
  'woo' => $woocommerce,
  'catalog_columns' => get_option('woocommerce_catalog_columns'),
];

// SINGLE PRODUCT
if (is_singular('product')) {
  global $post;
  $template = 'single-product';
  $related_ids = wc_get_related_products($post->ID, $args['catalog_columns']);
  
  $args = array_merge($args, [
    'post' => $post,
    'product' => wc_get_product($post->ID),
    'products' => get_posts([
      'post_type' => 'product',
      'post__in' => $related_ids,
      'orderby' => 'post__in',
    ]),
  ]);
}
// If SHOP page
elseif (is_shop()) {
  $template = 'shop';
  $post = get_post(get_option('woocommerce_shop_page_id'));

  $args = array_merge($args, [
    'post' => $post,
    'products' => $wp_query->get_posts(),
  ]);
}
// if CATEGORY page
elseif(is_product_category() || is_product_tag()) {
  global $wp_query;
  $template = 'archive-product';

  $display_mode = woocommerce_get_loop_display_mode();
  $term = get_queried_object();

  $args['title'] = $term->name;
  $args['content'] = wpautop($term->description);

  // if display products
  if ($display_mode === 'both' || $display_mode === 'products') {
    $args['products'] = $wp_query->get_posts();
  }

  // if display categories
  if ($display_mode === 'both' || $display_mode === 'subcategories') {
    $args['categories'] = _get_categories($term->term_id);
  }

  // disable pagination
  if ($display_mode === 'subcategories') {
    wc_set_loop_prop('total', 0);
  }
}

get_header();
get_template_part("woocommerce/views/$template", '', $args);
get_footer();


//


/**
 * Get WC_Product data from posts and embed it
 * 
 * @param $posts
 * @return - Posts with embedded Product data
 */
function _get_products(array $posts) : array {
  $post_ids = array_reduce($posts, function($result, $p) {
    $result[] = $p->id;
    return $result;
  }, []);

  $products = wc_get_products([
    'include' => $post_ids,
    'orderby' => 'post__in',
    'posts_per_page' => wc_get_loop_prop('total')
   ]);

  $posts = array_map(function($p, $index) use ($products) {
    $p->product = $products[$index];
    return $p;
  }, $posts, array_keys($posts));

  return $posts;
}


/**
 * Get categories / subcategories with attached Thumbnail image and Permalink
 * 
 * @param $parent_id
 * @return - The formatted categories
 */
function _get_categories(int $term_id = 0) : array {
  $raw_cats = woocommerce_get_product_subcategories($term_id);

  // get extra data for category
  $parsed_cats = array_map(function($c) {
    // get thumbnail image
    $thumb_id = get_term_meta($c->term_id, 'thumbnail_id', true);
    $image = wp_get_attachment_image_src($thumb_id, 'medium');
    $c->image = $image ? $image[0] : wc_placeholder_img_src();

    // get permalink
    $c->link = get_term_link($c->term_id, 'product_cat');

    return $c;
  }, $raw_cats);

  return $parsed_cats;
}