<?php
global $wp_query;

$args = [
  'page' => get_post(get_option('woocommerce_shop_page_id')),
  'products' => $wp_query->get_posts(),
  'pagination' => H::get_pagination(),
];

get_header();
get_template_part('woocommerce/views/shop', '', $args);
get_footer();