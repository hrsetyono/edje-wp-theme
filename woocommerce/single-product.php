<?php
global $post;

$post = $post;
// $product = wc_get_product($post->ID);
$thumbnail_url = get_the_post_thumbnail_url($post, 'thumbnail');
$total_sales = get_post_meta($post->ID, 'total_sales', true);

// Args to be passed to Related Products template
$related_args = [
  'catalog_columns' => get_option('woocommerce_catalog_columns'),
  'products' => get_posts([
    'post_type' => 'product',
    'post__in' => wc_get_related_products($post->ID, $catalog_columns),
    'orderby' => 'post__in',
  ]),
  'extra_classes' => 'is-style-my-slider',
];

///// ?>

<?php the_post(); ?>
<?php get_header(); ?>

<main>
  <?php
    // do_action('woocommerce_before_single_product');
    woocommerce_output_all_notices()
  ?>

  <div class="product-columns / wp-block-columns alignwide">
    <div class="product-figure / wp-block-column">
      <?php
        // do_action('woocommerce_before_single_product_summary');
        woocommerce_show_product_sale_flash();
        h_show_product_outfstock_flash();
        woocommerce_show_product_images();
      ?>
    </div>
    <div class="product-summary / wp-block-column">
      <?php // do_action('woocommerce_single_product_summary'); ?>
      <?php woocommerce_template_single_title(); ?>

      <div class="product-summary__subheader">
        <?php if ($total_sales > 0): ?>
          <div class="product-summary__sold">
            Sold <span><?= $total_sales ?></span>
          </div>
        <?php endif; ?>

        <?php woocommerce_template_single_rating(); ?>
      </div>

      <?php
        woocommerce_template_single_price();
        woocommerce_template_single_add_to_cart();
        woocommerce_template_single_excerpt();
        woocommerce_template_single_meta();
        woocommerce_template_single_sharing();
      ?>
    </div>
  </div>

  <?php
    // do_action('woocommerce_after_single_product_summary');
    woocommerce_output_product_data_tabs();
    // woocommerce_upsell_display();
    // woocommerce_output_related_products();
  ?>
  
  <?php // do_action('woocommerce_after_single_product'); ?>

  <section class="product-related / wp-block-group alignfull">
    <div class="wp-block-group__inner-container">
      <h3 class="alignwide">
        <?= __('Related Products') ?>
      </h3>
      <?php get_template_part('woocommerce/parts/products', '', $related_args); ?>
    </div>
  </section>

  <?php // Mobile bottom bar containing "Add to Cart" button ?>
  <aside class="product-bar" data-visible="mobile">
    <?php woocommerce_template_single_add_to_cart(); ?>
  </aside>
</main>

<?php get_footer(); ?>