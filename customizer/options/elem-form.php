<?php

add_filter( 'h_customizer_options', function( $sections ) {
return wp_parse_args( [ 'form' => [

  'title' => __( 'Form' ),
  'container' => [ 'priority' => 10 ],
  'css_selector' => 'form',
  'options' => [

    'formTextColor' => [
      'label' => __( 'Font Color' ),
      'desc' => my_css_desc( [
        '--formTextInitialColor',
        '--formTextFocusColor'
      ]),
      'type'  => 'ct-color-picker',
      'pickers' => [
        'default' => __( 'Initial' ),
        'focus' => __( 'Focus' ),
      ],
    ],
  
    'formFontSize' => [
      'label' => __( 'Font Size' ),
      'desc' => my_css_desc( [
        '--formFontSize',
      ]),
      'type' => 'ct-slider',
      'units' => [
        'px' => [ 'min' => '14', 'max' => '24' ],
        'rem' => [ 'min' => '0', 'max' => '2' ],
      ],
    ],


    h_option_title() => __( 'Input' ),
  
    'formBackgroundColor' => [
      'label' => __( 'Background Color' ),
      'desc' => my_css_desc( [
        '--formBackgroundInitialColor',
        '--formBackgroundFocusColor'
      ]),
      'type'  => 'ct-color-picker',
      'pickers' => [
        'default' => __( 'Initial' ),
        'focus' => __( 'Focus' ),
      ],
    ],
  
    'formBorder' => [
      'label' => __( 'Border' ),
      'desc' => my_css_desc([
        '--formBorder',
      ]),
      'type' => 'ct-border',
    ],
  
    'formBorderFocusColor' => [
      'label' => __( 'Border Focus Color' ),
      'desc' => my_css_desc( [
        '--formBorderFocusColor'
      ]),
      'type'  => 'ct-color-picker',
      'pickers' => [
        'focus' => __( 'Focus' ),
      ],
    ],
  
    h_option_title() => __( 'Select Dropdown' ),
  
    'selectDropdownTextColor' => [
      'label' => __( 'Dropdown Text Color' ),
      'desc' => my_css_desc( [
        '--selectDefaultColor',
        '--selectHoverColor',
        '--selectActiveColor'
      ]),
      'type'  => 'ct-color-picker',
      'pickers' => [
        'default' => __( 'Initial' ),
        'hover' => __( 'Hover' ),
        'active' => __( 'Active' ),
      ],
    ],
  
    'selectDropdownItemColor' => [
      'label' => __( 'Dropdown Items Color' ),
      'desc' => my_css_desc( [
        '--selectItemHoverColor',
        '--selectItemActiveColor',
      ]),
      'type'  => 'ct-color-picker',
      'pickers' => [
        'hover' => __( 'Hover' ),
        'active' => __( 'Active' ),
      ],
    ],
  
    'selectDropdownBackground' => [
      'label' => __( 'Dropdown background' ),
      'desc' => my_css_desc( [
        '--selectBackground',
      ]),
      'type'  => 'ct-color-picker',
      'pickers' => [
        'default' => __( 'Initial' ),
      ],
    ],
  
  
    h_option_title() => __( 'Radio & Checkbox' ),
  
    'radioCheckboxColor' => [
      'label' => __( 'Color' ),
      'desc' => my_css_desc( [
        '--radioInitialColor',
        '--radioAccentColor'
      ] ),
      'type'  => 'ct-color-picker',
      'pickers' => [
        'default' => __( 'Initial' ),
        'accent' => __( 'Accent' ),
      ],
    ],

  ]

] ], $sections );
} );