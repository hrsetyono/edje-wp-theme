<?php
/**
 * @todo - convert this from Timber to pure WP
 */
$context = Timber::get_context();

// SINGLE PRODUCT
if( is_singular( 'product' ) ) {
  $context['post'] = Timber::get_post();

  // get detailed product info
  $product = wc_get_product( $context['post']->id );
  $context['product'] = $product;

  // get related products
  $related_limit = wc_get_loop_prop( 'columns' );
  $related_ids = wc_get_related_products( $context['post']->id, $related_limit );
  $context['related_products'] =  Timber::get_posts(  $related_ids );

  Timber::render( 'shop/single.twig', $context );
}

// If SHOP page
elseif( is_shop() ) {
  $post = Timber::get_post( get_option( 'woocommerce_shop_page_id' ) );
  $context['post'] = $post;
  $context['products'] = Timber::get_posts();

  return Timber::render( 'shop/shop.twig', $context );
}

// if CATEGORY page
elseif( is_product_category() || is_product_tag() ) {
  $display_mode = woocommerce_get_loop_display_mode();
  $parent_term_id = 0;

  $term_raw = get_queried_object();
  $term = new TimberTerm( $term_raw->term_id );
  $parent_term_id = $term_raw->term_id;

  $context['title'] = $term->name;
  $context['content'] = wpautop( $term->description );

  // if display products
  if( $display_mode === 'both' || $display_mode === 'products' ) {
    $context['products'] = Timber::get_posts();
  }

  // if display categories
  if( $display_mode === 'both' || $display_mode === 'subcategories' ) {
    $context['categories'] = _get_categories( $parent_term_id );
  }

  // disable pagination
  if( $display_mode === 'subcategories' ) {
    wc_set_loop_prop( 'total', 0 );
  }

  Timber::render( 'shop/archive.twig', $context );
}


//


/**
 * Get WC_Product data from posts and embed it
 * 
 * @param $posts
 * @return - Posts with embedded Product data
 */
function _get_products( array $posts ) : array {
  $post_ids = array_reduce($posts, function( $result, $p ) {
    $result[] = $p->id;
    return $result;
  }, [] );

  $products = wc_get_products( [
    'include' => $post_ids,
    'orderby' => 'post__in',
    'posts_per_page' => wc_get_loop_prop( 'total' )
   ] );

  $posts = array_map( function( $p, $index ) use ( $products ) {
    $p->product = $products[$index];
    return $p;
  }, $posts, array_keys( $posts ) );

  return $posts;
}


/**
 * Get categories / subcategories with attached Thumbnail image and Permalink
 * 
 * @param $parent_id
 * @return - The formatted categories
 */
function _get_categories( int $parent_id = 0 ) : array {
  $raw_cats = woocommerce_get_product_subcategories( $parent_id );

  // get extra data for category
  $parsed_cats = array_map( function( $c ) {
    // get thumbnail image
    $thumb_id = get_term_meta( $c->term_id, 'thumbnail_id', true );
    $image = wp_get_attachment_image_src( $thumb_id, 'medium' );
    $c->image = $image ? $image[0] : wc_placeholder_img_src();

    // get permalink
    $c->link = get_term_link( $c->term_id, 'product_cat' );

    return $c;
  }, $raw_cats );

  return $parsed_cats;
}