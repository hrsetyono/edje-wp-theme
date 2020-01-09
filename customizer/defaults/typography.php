<?php

add_filter( 'h_customizer_defaults', function( $defaults ) {
  return wp_parse_args( [

    // TYPOGRAPHY
    'rootTypography' => blocksy_typography_default_values([
      'family' => 'System Default',
      'variation' => 'n4',
  
      'size' => '16px',
      'line-height' => '1.65',
      'letter-spacing' => '0em',
      'text-transform' => 'none',
      'text-decoration' => 'none',
    ]),
    'smallFontSize' => '14px',
    'mediumFontSize' => '18px',
    'largeFontSize' => '22px',

    //
    'buttons' => blocksy_typography_default_values([
      'size' => '18px',
      'line-height' => '1',
      'text-transform' => 'uppercase'
    ]),
  
    'blockquote' => blocksy_typography_default_values([
      'size' => '18px',
    ]),
  
    'pre' => blocksy_typography_default_values([
      'family' => 'monospace',
      'size' => '14px',
      'variation' => 'n4'
    ]),
      
    // HEADING
    'headingTypography' => blocksy_typography_default_values([
      'family' => 'System Default',
      'variation' => 'n7',
      'size' => '0',
      'line-height' => '1.25',
      'letter-spacing' => '0.05em',
    ] ),
    'h1Size' => [
      'mobile' => '32px',
      'tablet' => '40px',
      'desktop' => '46px',
    ],
    'h2Size' => [
      'mobile' => '26px',
      'tablet' => '30px',
      'desktop' => '36px',
    ],
    'h3Size' => [
      'mobile' => '22px',
      'tablet' => '26px',
      'desktop' => '30px',
    ],
    'h4Size' => [
      'mobile' => '20px',
      'tablet' => '22px',
      'desktop' => '26px',
    ],
    'h5Size' => [
      'mobile' => '18px',
      'tablet' => '20px',
      'desktop' => '20px',
    ],
    'h6Size' => [
      'mobile' => '16px',
      'tablet' => '18px',
      'desktop' => '18px',
    ],

    // COLOR
    'headingColor' => [
      'default' => [ 'color' => 'var(--text)' ],
    ],
    'linkColor' => [
      'default' => [ 'color' => 'var(--text)', ],
      'hover' => [ 'color' => 'var(--main)', ],
    ],
    'buttonTextColor' => [
      'default' => [ 'color' => 'var(--textInvert)', ],
      'hover' => [ 'color' => 'var(--textInvert)', ],
    ],
    'buttonColor' => [
      'default' => [ 'color' => 'var(--main)', ],
      'hover' => [ 'color' => 'var(--mainDark)', ],
    ],


  ], $defaults );
});