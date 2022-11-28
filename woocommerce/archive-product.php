<?php
global $wp_query;

$term = get_queried_object();
$display_mode = woocommerce_get_loop_display_mode();

$args = [
  'catalog_columns' => get_option('woocommerce_catalog_columns'),
  'title' => $term->name,
  'content' => wpautop($term->description),
  'pagination' => H::get_pagination(),
];

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

get_header();
get_template_part('woocommerce/views/archive-product', '', $args);
get_footer();


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