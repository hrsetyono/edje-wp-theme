<?php
$wc_dir = __DIR__ . '/woocommerce';


if (is_singular('product')) {
  require_once "{$wc_dir}/single-product.php";
}
elseif (is_shop()) {
  require_once "{$wc_dir}/shop.php";
}
elseif (is_product_category() || is_product_tag()) {
  require_once "{$wc_dir}/archive-product.php";
}