<?php


/**
 * TIMBER Global setting
 */
class MyTimber extends TimberSite {

  function __construct() {
    add_filter( 'timber_context', [$this, 'add_to_context'] );
    add_filter( 'get_twig', [$this, 'add_to_twig'] );
    parent::__construct();
  }


  /**
   * Global context. The values here are accessible in all rendered template
   * @filter timber_context
   */
  function add_to_context( array $context ) : array {
    // Header
    $context['header'] = [
      'top-row' => H::dynamic_sidebar( 'header-top' ),
      'mid-row' => H::dynamic_sidebar( 'header-mid' ),
      'top-row-mobile' => H::dynamic_sidebar( 'header-top-mobile' ),
      'mid-row-mobile' => H::dynamic_sidebar( 'header-mid-mobile' ),
    ];

    $context['offcanvas'] = H::dynamic_sidebar( 'header-offcanvas' );

    // Footer
    $context['footer'] = [
      'top-row' => H::dynamic_sidebar( 'footer-top' ),
      'mid-row' => H::dynamic_sidebar( 'footer-mid' ),
      'bottom-row' => H::dynamic_sidebar( 'footer-bottom' ),
    ];

    // Sidebar
    $context['sidebar'] = Timber::get_widgets( 'sidebar' );

    // Other
    $context['site'] = $this;
    $context['home_url'] = home_url();
    $root = get_template_directory_uri();
    $context['images'] = $root.'/assets/images';
  
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
   * Add custom filter for Twig
   * @filter get_twig
   */
  function add_to_twig( $twig ) {
    $twig->addExtension( new Twig_Extension_StringLoader() );
    
    $twig->addFilter( new Twig_SimpleFilter( 'sample', [$this, '_filter_sample'] ) );

    return $twig;
  }

  /**
   * This is an example of creating a custom Twig filter.
   * You need to define it first in add_to_twig() method above.
   * 
   * `{{ param1 | sample( param2 ) }}`
   */
  function _filter_sample( $param1, $param2 = 'default' ) {
    
    // do something

    return $param1;
  }


}


new MyTimber();