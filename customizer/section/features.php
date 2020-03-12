<?php

$section = [ 'title' => __( 'Features' ), 'container' => [ 'priority' => 10 ], 'options' => [
    
  'has_back_to_top' => [
    'label' => __( 'Has Back to Top?' ),
    'type' => 'ct-panel',
    'switch' => true,
    'inner-options' => [

    'back_to_top_style' => [
      'label' => __( 'Style' ),
      'type' => 'ct-image-picker',
      'attr' => [
        'data-type' => 'background',
        'data-padding' => 'medium',
        'data-columns' => 3,
      ],
      'choices' => [
        'arrow-up' => [
          'src'   => custy_get_svg( 'arrow-up' ),
          'title' => __( 'Default' ),
        ],
        'arrow-up-angle' => [
          'src'   => custy_get_svg( 'arrow-up-angle' ),
          'title' => __( 'Angle' ),
        ],
        'arrow-up-caret' => [
          'src'   => custy_get_svg( 'arrow-up-caret' ),
          'title' => __( 'Caret' ),
        ],
      ],
    ],

    custy_rand_id() => [ 'divider' => '' ],

    'back_to_top_alignment' => [
      'label' => __( 'Alignment' ),
      'type' => 'ct-radio/alignment-no-center',
    ],

    'back_to_top_visibility' => [
      'label' => __( 'Visibility' ),
      'type' => 'ct-visibility',
    ],

  ] ],

  custy_rand_id() => [ 'divider' => '' ],

  'has_frame' => [
    'label' => __( 'Has Frame?' ),
    'type' => 'ct-switch',
  ],

] ];