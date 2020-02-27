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
    $context['header'] = CustyBuilder::get_header( 'main' );
    $context['footer'] = CustyBuilder::get_footer( 'main' );

    $context['site'] = $this;
    $context['home_url'] = home_url();

    $root = get_template_directory_uri();
    $context['images'] = $root.'/assets/images';

    $context['mods'] = Custy::get_mods();

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
    $twig->addFilter( new Twig_SimpleFilter( 'my_example', [$this, 'filter_my_example'] ) );
    $twig->addFilter( new Twig_SimpleFilter( 'get_social_label', [$this, 'filter_social_label'] ) );

    return $twig;
  }

  /**
   * Example of custom filter
   *  {{ post.content | my_example( $name ) }}
   */
  function filter_my_example( string $post_content, string $name ) : string {
    return "<h1>$name</h1> $post_content";
  }


  /**
   * Get the label of Social Media buttons in Header / Footer
   */
  function filter_social_label( $context, $id, $default_label = false ) {
    if( $context['show_text'] == 'no' ) { return; }

    $label = $context[ "{$id}_label" ] ?? $default_label;
    return $label;
  }
}


new MyTimber();