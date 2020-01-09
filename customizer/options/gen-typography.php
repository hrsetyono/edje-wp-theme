<?php

add_filter( 'h_customizer_options', function( $sections ) {
$textUnits = [
  'px' => [ 'min' => 12, 'max' => 32, ],
  'rem' => [ 'min' => 0, 'max' => 2 ],
  'em' => [ 'min' => 0, 'max' => 2 ],
];

$headingUnits = [
  'px' => [ 'min' => 14, 'max' => 64, ],
  'rem' => [ 'min' => 0, 'max' => 4 ],
  'em' => [ 'min' => 0, 'max' => 4 ],
];

return wp_parse_args( [ 'typography' => [

  'title' => __( 'Typography' ),
  'container' => [ 'priority' => 1 ],
  'css_selector' => ':root',
  'options' => [

    blocksy_rand_md5() => [
    'title' =>  __( 'Body' ),
    'type' => 'tab',
    'options' => [

      'rootTypography' => [
        'label' => __( 'Root Typography' ),
        'type' => 'ct-typography',
        'isDefault' => true,
        'css' => '--$',
      ],
  
      'smallFontSize' => [
        'label' => __( 'Small Font Size' ),
        'type' => 'ct-slider',
        'units' => $textUnits,
        'css' => '--smallFontSize',
      ],
  
      'mediumFontSize' => [
        'label' => __( 'Medium Font Size' ),
        'type' => 'ct-slider',
        'responsive' => true,
        'units' => $textUnits,
        'css' => '--mediumFontSize',
      ],
  
      'largeFontSize' => [
        'label' => __( 'Large Font Size' ),
        'type' => 'ct-slider',
        'responsive' => true,
        'units' => $textUnits,
        'css' => '--largeFontSize',
      ],
  
      h_option_divider() => '',
  
      'buttons' => [
        'type' => 'ct-typography',
        'label' => __( 'Buttons', 'blocksy' ),
        'css' => '--button$',
      ],
  
      'blockquote' => [
        'type' => 'ct-typography',
        'label' => __( 'Blockquote', 'blocksy' ),
        'css_selector' => 'blockquote',
        'css' => '--$',
      ],
  
      'pre' => [
        'type' => 'ct-typography',
        'label' => __( 'Preformatted', 'blocksy' ),
        'css_selector' => 'code, pre, samp',
        'css' => '--$',
      ],

    ] ],

    
    blocksy_rand_md5() => [
    'title' =>  __( 'Heading' ),
    'type' => 'tab',
    'options' => [

      'headingTypography' => [
        'type' => 'ct-typography',
        'label' => __( 'Heading Typography' ),
        'desc' => "Applies to H1-H6. Leave size as 0.",
        'isDefault' => true,
        'css' => '--h$'
      ],
  
      'h1Size' => [
        'label' => __( 'H1 Size' ),
        'type' => 'ct-slider',
        'responsive' => true,
        'units' => $headingUnits,
        'css' => '--h1Size',
      ],
  
      'h2Size' => [
        'label' => __( 'H2 Size' ),
        'type' => 'ct-slider',
        'responsive' => true,
        'units' => $headingUnits,
        'css' => '--h2Size',
      ],
  
      'h3Size' => [
        'label' => __( 'H3 Size' ),
        'type' => 'ct-slider',
        'responsive' => true,
        'units' => $headingUnits,
        'css' => '--h3Size'
      ],
  
      'h4Size' => [
        'label' => __( 'H4 Size' ),
        'type' => 'ct-slider',
        'responsive' => true,
        'units' => $headingUnits,
        'css' => '--h4Size'
      ],
  
      'h5Size' => [
        'label' => __( 'H5 Size' ),
        'type' => 'ct-slider',
        'responsive' => true,
        'units' => $headingUnits,
        'css' => '--h5Size',
      ],
  
      'h6Size' => [
        'label' => __( 'H6 Size' ),
        'type' => 'ct-slider',
        'responsive' => true,
        'units' => $headingUnits,
        'css' => '--h6Size'
      ],
    ] ],

    blocksy_rand_md5() => [
    'title' => __( 'Color' ),
    'type' => 'tab',
    'options' => [
      
      'headingColor' => [
        'label' => __( 'Heading Color' ),
        'css' => [
          '--headingColor' => 'default.color',
        ],
        'type'  => 'ct-color-picker',
        'pickers' => [
          'default' => __( 'Initial' )
        ],
      ],
    
      h_option_divider() => '',
    
      'linkColor' => [
        'label' => __( 'Link Color' ),
        'type'  => 'ct-color-picker',
        'desc' => 'Affect only the links that are inside the posts & pages content area.',
        'css' => [
          '--linkColor' => 'default.color',
          '--linkColorHover' => 'hover.color'
        ],
        'pickers' => [
          'default' => __( 'Initial' ),
          'hover' => __( 'Hover' ),
        ],
      ],
    
      h_option_divider() => '',
    
      'buttonColor' => [
        'label' => __( 'Button Color' ),
        'type'  => 'ct-color-picker',
        'css' => [
          '--buttonInitialColor' => 'default.color',
          '--buttonHoverColor' => 'hover.color'
        ],
        'pickers' => [
          'default' => __( 'Initial' ),
          'hover' => __( 'Hover' ),
        ],
      ],
    
      'buttonTextColor' => [
        'label' => __( 'Button Text Color' ),
        'type'  => 'ct-color-picker',
        'css' => [
          '--buttonTextInitialColor' => 'default.color',
          '--buttonTextHoverColor' => 'hover.color',
        ],
        'pickers' => [
          'default' => __( 'Initial' ),
          'hover' => __( 'Hover' ),	
        ],
      ],
    ] ],
    
  ],

] ], $sections );
} );