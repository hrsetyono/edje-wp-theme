<?php

$section = [ 'title' => __( 'Blog Posts' ), 'container' => [ 'priority' => 8 ], 'css_selector' => ':root', 'options' => [

  'archive_style' => [
		'label' => __( 'Archive Style' ),
		'type' => 'ct-image-picker',
		'attr' => [ 'data-type' => 'background' ],
		'choices' => [
			'default' => [
				'src'   => custy_get_svg( 'posts-default' ),
				'title' => __( 'Default' ),
      ],
			'grid' => [
				'src'   => custy_get_svg( 'posts-grid' ),
				'title' => __( 'Grid' ),
			],
		],
  ],
  
  'archive_has_sidebar' => [
    'label' => __( 'Archive Has Sidebar?' ),
    'desc' => __( 'To edit it, go to Widget section > Sidebar' ),
    'type' => 'ct-switch',
  ],


  custy_rand_id() => [ 'condition' => [ 'archive_style' => 'grid' ], 'options' => [

    'postsPerRow' => [
      'label' => __( 'Posts Per Row' ),
      'type' => 'ct-number',
      'min' => 1,
      'max' => 5,
      'responsive' => true,
      'css' => '--postsPerRow'
    ],

  ] ],


  custy_rand_id() => [ 'divider' => '' ],

  'archive_elements' => [
    'label' => __( 'Archive Elements' ),
    'type' => 'ct-layers',
  
    'settings' => [
      'title' => [
        'label' => __( 'Title' ),
      ],

      'featured_image' => [
        'label' => __( 'Featured Image' ),
        'options' => [

          'ratio' => [
            'label' => __( 'Ratio' ),
            'type' => 'ct-radio',
            'choices' => [
              '4:3' => __( '4:3' ),
              '2:1' => __( '2:1' ),
              'custom' => __( 'Custom' ),
            ],
          ],
          
          custy_rand_id() => [ 'condition' => [ 'ratio' => 'custom' ], 'options' => [
            'height' => [
              'label' => __( 'Height' ),
              'type' => 'ct-slider',
              'responsive' => false,
              'units' => [
                'px' => [ 'min' => 75, 'max' => 300 ],
                '%' => [ 'min' => 25, 'max' => 100 ],
              ],
              'css' => '--archiveImageHeight',
            ]
          ] ],
        
        ]
      ],

      'excerpt' => [
        'label' => __( 'Excerpt', 'blocksy' ),
        'options' => [

          'word_count' => [
            'label' => __( 'Word Count' ),
            'type' => 'ct-number',
            'design' => 'inline',
            'min' => 10,
            'max' => 100,
          ],

        ],
      ],

      'read_more_button' => [
        'label' => __( 'Read More Button' ),
        'options' => [

          'style' => [
            'label' => __( 'Style' ),
            'type' => 'ct-radio',
            'choices' => [
              'solid' => __( 'Solid' ),
              'outline' => __( 'Outline' ),
              'transparent' => __( 'Transparent' ),
            ],
          ],

          'text' => [
            'label' => __( 'Text' ),
            'type' => 'text',
            'design' => 'inline',
          ],

        ],
      ],

      'post_meta' => [
        'label' => __( 'Post Meta' ),
        'clone' => true,
        'options' => [

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

        ],
      ],
    ],
  ],
  
] ];