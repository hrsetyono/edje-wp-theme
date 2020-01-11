<?php

add_filter( 'h_customizer_options', function( $sections ) {
return wp_parse_args( [ 'other' => [

  'title' => __( 'Others' ),
  'container' => [ 'priority' => 10 ],
  'options' => [
    
    'has_back_top' => [
      'label' => __( 'Scroll to Top' ),
      'type' => 'ct-panel',
      'switch' => true,
      'inner-options' => [
  
        blocksy_rand_md5() => [
          'type' => 'ct-title',
          'desc' => my_css_notice('CSS is applied to <code>.ct-back-to-top</code>'),
        ],
  
        'top_button_type' => [
          'label' => false,
          'type' => 'ct-image-picker',
          'attr' => [
            'data-type' => 'background',
            'data-columns' => '3',
          ],
          'choices' => [
            'type-1' => [
              'src'   => blocksy_image_picker_file( 'top-1' ),
              'title' => __( 'Type 1', 'blocksy' ),
            ],
            'type-2' => [
              'src'   => blocksy_image_picker_file( 'top-2' ),
              'title' => __( 'Type 2', 'blocksy' ),
            ],
          ],
        ],
  
        'topButtonOffset' => [
          'label' => __( 'Button Offset' ),
          'desc' => my_css_desc( [
            '--bottom'
          ] ),
          'type' => 'ct-slider',
          'responsive' => true,
          'divider' => 'top',
          'units' => [
            'px' => [ 'min' => 0, 'max' => 50 ],
            'rem' => [ 'min' => 0, 'max' => 3 ],
          ],
        ],
  
        'topButtonIconColor' => [
          'label' => __( 'Icon Color' ),
          'desc' => my_css_desc( [
            '--color',
            '--colorHover'
          ] ),
          'type'  => 'ct-color-picker',
          'pickers' => [
            'default' => __( 'Initial' ),
            'hover' => __( 'Hover' ),
          ],
        ],
  
        'topButtonShapeBackground' => [
          'label' => __( 'Shape Background' ),
          'desc' => my_css_desc( [
            '--backgroundColor',
            '--backgroundColorHover'
          ] ),
          'type'  => 'ct-color-picker',
          'pickers' => [
            'default' => __( 'Initial' ),
            'hover' => __( 'Hover' ),
          ],
        ],
  
        'topButtonShadow' => [
          'label' => __( 'Shadow' ),
          'type' => 'ct-select/shadow',
          'desc' => my_css_desc( [
            '--boxShadow',
          ] ),
        ],

        blocksy_rand_md5() => [ 'type' => 'ct-divider' ],
  
        'top_button_alignment' => [
          'label' => __( 'Alignment' ),
          'type' => 'ct-radio',
          'view' => 'text',
          'attr' => [ 'data-type' => 'alignment' ],
          'choices' => [
            'left' => '',
            'right' => '',
          ],
        ],
  
        'back_top_visibility' => [
          'label' => __( 'Visibility' ),
          'type' => 'ct-visibility',
        ],
      ],
  
    ],
  
    blocksy_rand_md5() => [ 'type' => 'ct-divider' ],
  
    'performance' => [
      'label' => __( 'Performance' ),
      'type' => 'ct-panel',
  
      'inner-options' => [
        'emoji_scripts' => [
          'label' => __( 'Emojis Script' ),
          'type' => 'ct-switch',
          'desc' => __( 'Disable WordPress emojis script if you don\'t use them in order to improve the performance. ' ),
        ],
  
        blocksy_rand_md5() => [ 'type' => 'ct-divider' ],
  
        'has_lazy_load' => [
          'label' => __( 'Lazy Load Images' ),
          'type' => 'ct-switch',
          'desc' => __( 'This option will be auto disabled if you have JetPack\'s lazy load option enabled.' ),
        ],
  
        blocksy_rand_md5() => [
          'type' => 'ct-condition',
          'condition' => [ 'has_lazy_load' => 'yes' ],
          'options' => [
  
            'lazy_load_type' => [
              'label' => __( 'Images Loading Animation Type' ),
              'type' => 'ct-radio',
              'view' => 'text',
              'choices' => [
                'fade' => __( 'Fade' ),
                'circle' => __( 'Circles' ),
                'none' => __( 'None' ),
              ],
            ],
          ],
        ],
  
      ],
    ]
  ]

] ], $sections );
} );