<?php

$section = [
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


    custy_rand_id() => [ 'label' => __( 'Input' ), 'type' => 'ct-title' ],
  
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
      'type' => 'ct-border',
      'desc' => my_css_desc([
        '--formBorder',
      ]),
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
  
    custy_rand_id() => [ 'label' => __( 'Select Dropdown' ), 'type' => 'ct-title' ],
  
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
  
  
    custy_rand_id() => [ 'label' => __( 'Radio & Checkbox' ), 'type' => 'ct-title' ],
  
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

];