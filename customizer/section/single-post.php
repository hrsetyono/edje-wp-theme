<?php

$section = [ 'title' => __( 'Single Post' ), 'container' => [ 'priority' => 8, 'type' => 'child' ], 'css_selector' => ':root', 'options' => [

  'post_style' => [
		'label' => __( 'Post Style' ),
		'type' => 'ct-image-picker',
		'attr' => [ 'data-type' => 'background' ],
		'choices' => [
			'narrow' => [
				'src'   => custy_get_svg( 'post-narrow' ),
				'title' => __( 'Narrow' ),
      ],
      'has-sidebar' => [
				'src'   => custy_get_svg( 'post-right-sidebar' ),
				'title' => __( 'Has Sidebar' ),
			],

		],
  ],

  custy_rand_id() => [ 'divider' => '' ],

  'post_elements' => [
    'label' => __( 'Post Elements' ),
    'type' => 'ct-layers',
  
    'settings' => [

      'title' => [ 'label' => __( 'Title' ), 'options' => [

        'style' => [
          'label' => __( 'Style' ),
          'desc' => __( 'If Banner style, it will always be placed first.' ),
          'type' => 'ct-image-picker',
          'attr' => [ 'data-type' => 'background' ],
          'choices' => [
            'default' => [
              'src'   => custy_get_svg( 'post-title-default' ),
              'title' => __( 'Default' ),
            ],
            'hero' => [
              'src'   => custy_get_svg( 'post-title-hero' ),
              'title' => __( 'Hero' ),
            ],
          ],
        ],
        
        custy_rand_id() => [ 'condition' => [ 'style' => 'banner' ], 'options' => [
          'banner_style' => [
            'label' => __( 'Banner Style' ),
            'type' => 'ct-radio',
            'choices' => [
              'color' => __( 'Color' ),
              'featured-image' => __( 'Featured Image' ),
            ],
          ],
        ] ],
          
        'meta' => [
          'label' => __( 'Meta' ),
          'type' => 'ct-checkboxes',
          'attr' => [ 'data-columns' => '2' ],
          'choices' => [
            'categories' => __( 'Categories' ),
            'author' => __( 'Author' ),
            'date' => __( 'Date' ),
            'comments' => __( 'Comments' ),
            'tags' => __( 'Tags' ),
          ],
        ],

      ] ],

      'featured_image' => [ 'label' => __( 'Featured Image' ), 'options' => [

        'style' => [
          'label' => __( 'Style' ),
          'type' => 'ct-radio',
          'choices' => [
            'narrow' => __( 'Narrow' ),
            'wide' => __( 'Wide' ),
            'full' => __( 'Full' ),
          ],
        ],

        custy_rand_id() => [ 'condition' => [ 'style' => 'narrow' ], 'options' => [
          'ratio' => [
            'label' => __( 'Ratio' ),
            'type' => 'ct-radio',
            'choices' => [
              '2:1' => __( '2:1' ),
              '3:1' => __( '3:1' ),
              'custom' => __( 'Custom' ),
            ],
          ],
        ] ],
        
        custy_rand_id() => [ 'condition' => [ 'any' => [ 'style' => '!narrow', 'ratio' => 'custom' ] ], 'options' => [
          'height' => [
            'label' => __( 'Height' ),
            'type' => 'ct-slider',
            'responsive' => true,
            'units' => [
              'px' => [ 'min' => 150, 'max' => 500 ],
              '%' => [ 'min' => 10, 'max' => 100  ],
            ],
            'css' => '--postImageHeight',
          ],
        ] ],

      ] ],

      'content' => [ 'label' => __( 'Content' ) ],

      'share' => [ 'label' => __( 'Share (Require Jetpack)' ) ],

      'author-box' => [ 'label' => __( 'Author Box' ), 'options' => [
        
        'show_avatar' => [
          'label' => __( 'Show Avatar?' ),
          'type' => 'ct-switch',
        ],

        'show_social_media' => [
          'label' => __( 'Show Social Media?' ),
          'type' => 'ct-switch',
        ],

      ] ],

      'next-prev-post' => [ 'label' => __( 'Next / Prev Post' ) ],
    ],

  ],

  custy_rand_id() => [ 'divider' => '' ],

  'post_footer_elements' => [
    'label' => __( 'Post Footer Elements' ),
    'type' => 'ct-layers',
  
    'settings' => [
          
      'related-posts' => [ 'label' => __( 'Related Posts' ), 'options' => [
        
        'use_jetpack' => [
          'label' => __( 'Use Jetpack?' ),
          'type' => 'ct-switch',
          'desc' => __( 'If Jetpack is installed, replace related posts with their format' ),
        ]

      ] ],

      'comments' => [ 'label' => __( 'Comments' ) ]
    ],

  ],

  
] ];