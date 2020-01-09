<?php

add_filter( 'h_customizer_defaults', function( $defaults ) {
  return wp_parse_args( [

    // SIDEBAR
    'sidebar_type' => 'type-1',
    'sidebarWidth' => '25%',
    'sidebarGap' => '3rem',
    'sidebarInnerSpacing' => [
      'mobile' => '0.5rem',
      'tablet' => '0.75rem',
      'desktop' => '1rem',
    ],
    'separated_widgets' => 'no',
    'has_sticky_sidebar' => 'no',
    'sidebarOffset' => '1rem',
    'sidebarBackgroundColor' => [
      'default' => [ 'color' => 'var(--textInvert)' ],
    ],
    'sidebarBorder' => [
      'width' => 1,
      'style' => 'solid',
      'color' => [ 'color' => 'rgba(224, 229, 235, 0.8)' ],
    ],
    'sidebarShadow' => 'none',
    'sidebar_visibility' => [
      'desktop' => true,
      'tablet' => true,
      'mobile' => false,
    ],
    // SIDEBAR > Content
    'sidebarTitleSize' => 'var(--h4Size)',
    'sidebarTitleColor' => [
      'default' => [ 'color' => 'var(--text)' ],
    ],
    'sidebarWidgetsSpacing' => [
      'mobile' => '1rem',
      'tablet' => '1.5rem',
      'desktop' => '2rem',
    ],
    'sidebarFontSize' => 'var(--smallFontSize)',
    'sidebarFontColor' => [
      'default' => [ 'color' => 'CT_CSS_SKIP_RULE' ],
      'hover' => [ 'color' => 'CT_CSS_SKIP_RULE' ],
    ],


  ], $defaults );
});