<?php
global $wp_query;
$term = get_queried_object();

$display_mode = woocommerce_get_loop_display_mode();

$title = $term->name;
$content = wpautop($term->description);
$pagination = H::get_pagination();

// if display products
if ($display_mode === 'both' || $display_mode === 'products') {
  $args['products'] = $wp_query->get_posts();
}

// if display categories
if ($display_mode === 'both' || $display_mode === 'subcategories') {
  $raw_cats = woocommerce_get_product_subcategories($term->term_id);

  $args['categories'] = array_map(function($c) {
    // get thumbnail image
    $thumb_id = get_term_meta($c->term_id, 'thumbnail_id', true);
    $image = wp_get_attachment_image_src($thumb_id, 'medium');
    $c->image = $image ? $image[0] : wc_placeholder_img_src();

    // get permalink
    $c->link = get_term_link($c->term_id, 'product_cat');

    return $c;
  }, $raw_cats);
}

// disable pagination
if ($display_mode === 'subcategories') {
  wc_set_loop_prop('total', 0);
}

///// ?>

<?php get_header(); ?>

<main>
  <header class="wp-block-group alignwide / shop-header">
    <div class="wp-block-group__inner-container">
      <h1 class="has-text-align-center">
        <?= $title ?>
      </h1>
      <div class="has-text-align-center">
        <?= $content ?>
      </div>
    </div>
  </header>

  <?php if ($categories) {
    get_template_part('woocommerce/parts/categories', '', $args);
  } ?>

  <?php if ($products) {
    get_template_part('woocommerce/parts/products', '', $args);
    get_template_part('parts/pagination', '', $args);
  } ?>
</main>

<?php get_footer(); ?>