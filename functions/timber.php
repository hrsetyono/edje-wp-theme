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
    
    $twig->addFilter( new Twig_SimpleFilter( 'h_get_timber_menu', [$this, '_filter_get_timber_menu'] ) );
    $twig->addFilter( new Twig_SimpleFilter( 'h_get_visible_attr', [$this, '_filter_get_visible_attr'] ) );
    $twig->addFilter( new Twig_SimpleFilter( 'h_get_social_label', [$this, '_filter_social_label'] ) );
    $twig->addFilter( new Twig_SimpleFilter( 'h_get_columns_count', [$this, '_filter_columns_count'] ) );
    $twig->addFilter( new Twig_SimpleFilter( 'h_get_dropdown_attr', [$this, '_filter_dropdown_attr'] ) );

    return $twig;
  }


  
  /**
   * Convert Menu ID into TimberMenu object
   * 
   * ```
   * {% set menu = menu_id | h_get_timber_menu %}
   * // loop it
   * ```
   * 
   * @return TimberMenu
   */
  function _filter_get_timber_menu( $menu_id ) {
    return new Timber\Menu( $menu_id );
  }



  /**
   * Parse the Visiblity value into string.
   *
   * Usage:
   * ```    
   * <div {{ visibility | h_get_visible_attr }}>
   *   ...
   * </div>
   * ```
   *
   * @return string - All the visible media, separated with space
   */
  function _filter_get_visible_attr( $visibility ) : string {
    $attr = [];
    foreach( $visibility as $media => $is_visible ) {
      if( $is_visible ) {
        $attr[] = $media;
      }
    }

    $data_visible = empty( $attr ) ? '' : implode( ' ', $attr );

    return "data-visible='{$data_visible}'";
  }


  /**
   * Get the label of Social Media buttons in Header / Footer
   */
  function _filter_social_label( $context, $id, $default_label = false ) {
    if( $context['has_text'] == 'no' ) { return; }

    $label = $context[ "{$id}_label" ] ?? $default_label;
    return $label;
  }


  /**
   * Get the number of Header columns. If Middle column is occupied, set to 3 no matter what
   */
  function _filter_columns_count( $row ) {
    $type = isset( $row['placements'] ) ? 'header' : 'footer';

    if( $type == 'footer' ) {
      return count( $row['columns'] );
    }
    elseif( $type == 'header' ) {
      // if has middle column, it become 3
      $has_middle = false;
      foreach( $row['placements'] as $column ) {
        if( $column['id'] == 'middle' ) {
          $has_center = true;
          return 3;
        }
      }

      return count( $row['placements'] );
    }
  }


  /**
   * Get the class for Desktop nav dropdown
   * 
   * {{ nav_item.children | h_get_dropdown_attr }}
   */
  function _filter_dropdown_attr( $nav_children, $base_class = 'nav-dropdown' ) {
    $class = $base_class;
    $count = 1;

    if( $nav_children[0]->children() ) {
      $count = count( $nav_children );
      $class .= " {$base_class}--wide";
    }

    return "class='{$class}' data-children='{$count}'";
  }
}


new MyTimber();