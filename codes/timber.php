<?php
///// TIMBER Global setting /////

class MyTimber extends TimberSite {

  function __construct() {
    add_filter( 'timber_context', [$this, 'add_to_context'] );
    add_filter( 'get_twig', [$this, 'add_to_twig'] );
    parent::__construct();
  }

  /**
   * Global context
   * @filter timber_context
   */
  function add_to_context( array $context ) : array {
    $context['nav'] = new TimberMenu( 'main-nav' );
    $context['social_nav'] = new TimberMenu( 'social-nav' );

    $context['site'] = $this;
    $context['home_url'] = home_url();
    $context['footer_widgets'] = Timber::get_widgets( 'my-footer' );

    $root = get_template_directory_uri();
    $context['images'] = $root.'/assets/images';
    $context['img'] = $context['images']; // alias
    $context['files'] = $root.'/assets/files';

    // if posts page, single post, or category page, use CATEGORIES as nav
    if( is_home() || is_singular('post') || is_category() ) {
      $context['blog_url'] = get_post_type_archive_link( 'post' );
      $context['blog_nav'] = Timber::get_terms( 'category', ['parent' => 0] );
    }

    // ACF Options Page    
    if( function_exists( 'acf_add_options_page' )) {
      $context['options'] = get_fields( 'options' );
    }

    // WooCommerce
    if( class_exists('WooCommerce') ) {
      global $woocommerce;
      $context['woo'] = $woocommerce;
    }

    return $context;
  }

  /**
   * Custom filter for Twig
   * @filter get_twig
   */
  function add_to_twig( $twig ) {
    $twig->addExtension( new Twig_Extension_StringLoader() );

    // Custom filter sample
    $twig->addFilter( new Twig_SimpleFilter( 'my_example', [$this, 'filter_my_example'] ) );

    return $twig;
  }

  /**
   * Example of custom filter
   *  {{ post.my_data | my_example( $name ) }}
   */
  function filter_my_example( string $text, string $name ) : string {
    return "<h1>$name</h1> $text";
  }
}
