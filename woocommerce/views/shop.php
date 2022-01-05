<main>
<?php do_action('woocommerce_before_main_content'); ?>

<?php the_content(); ?>

<?php
  /**
   * @hooked woocommerce_output_all_notices - 10
   * @hooked wc_setup_loop - 10
   * @hooked woocommerce_catalog_ordering - 30
   */
  do_action('woocommerce_before_shop_loop');
?>

<?php get_template_part('woocommerce/views/_products', '', $args); ?>

<?php
  /**
   * @hooked my_custom_woocommerce_pagination - 10
   * @hooked woocommerce_reset_loop - 999
   */
  do_action('woocommerce_after_shop_loop');
?>

<?php do_action('woocommerce_after_main_content'); ?>
</main>