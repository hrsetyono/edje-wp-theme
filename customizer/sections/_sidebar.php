<?php

$sections = [
  'title' => __( 'Sidebar' ),
	'container' => [ 'priority' => 1 ],
  'options' => [

    custy_rand_id() => [
		'title' => __( 'Layout' ),
		'type' => 'tab',
		'css_selector' => '[data-sidebar]',
		'options' => [

			'sidebar_type' => [
				'label' => false,
				'type' => 'ct-image-picker',
				'attr' => [ 'data-type' => 'background' ],
				'choices' => [
					'type-1' => [
						'src' => blocksy_image_picker_url( 'sidebar-type-1.svg' ),
					],
					'type-2' => [
						'src' => blocksy_image_picker_url( 'sidebar-type-2.svg' ),
					],
					'type-3' => [
						'src' => blocksy_image_picker_url( 'sidebar-type-3.svg' ),
					],
					'type-4' => [
						'src' => blocksy_image_picker_url( 'sidebar-type-4.svg' ),
					],

				],
			],

			'sidebarWidth' => [
				'label' => __( 'Sidebar Width' ),
				'type' => 'ct-slider',
				'units' => [
					'%' => [ 'min' => 10, 'max' => 30 ],
					'px' => [ 'min' => 100, 'max' => 300 ]
				],
				'css' => '--sidebarWidth'
			],
				
			'sidebarGap' => [
				'label' => __( 'Sidebar Gap' ),
				'type' => 'ct-slider',
				'units' => [
					'%' => [ 'min' => 0, 'max' => 10 ],
					'px' => [ 'min' => 0, 'max' => 100 ],
					'rem' => [ 'min' => 0, 'max' => 6 ],
				],
				'css' => '--sidebarGap'
			],

			// Type Options
			custy_rand_id() => [
				'type' => 'ct-condition',
				'condition' => [ 'sidebar_type' => 'type-2 | type-3 | type-4' ],
				'options' => [

					custy_rand_id() => [ 'type' => 'ct-divider' ],
					
					'sidebarInnerSpacing' => [
						'label' => __( 'Inner Spacing' ),
						'type' => 'ct-slider',
						'desc' => my_css_desc([
							'--sidebarInnerSpacing'
						]),
						'responsive' => true,
						'units' => [
							'px' => [ 'min' => 5, 'max' => 50 ],
							'rem' => [ 'min' => 0, 'max' => 3 ],
						],
					],
					
				],
			],

			custy_rand_id() => [
				'type' => 'ct-condition',
				'condition' => [ 'sidebar_type' => 'type-2' ],
				'options' => [

					'sidebarShadow' => [
						'label' => __( 'Shadow' ),
						'type' => 'ct-select-shadow',
						'divider' => 'top',
					],
					
				],
			],

			custy_rand_id() => [
				'type' => 'ct-condition',
				'condition' => [ 'sidebar_type' => 'type-2 | type-3' ],
				'options' => [
					'sidebarBorder' => [
						'label' => __( 'Border' ),
						'type' => 'ct-border',
					],
				],
			],
			
			custy_rand_id() => [
				'type' => 'ct-condition',
				'condition' => [ 'sidebar_type' => 'type-2 | type-4' ],
				'options' => [

					'sidebarBackgroundColor' => [
						'label' => __( 'Background Color' ),
						'type'  => 'ct-color-picker',
						'pickers' => [
							'default' => __( 'Initial' ),
						],
					],

				],
			],
			
			custy_rand_id() => [
				'type' => 'ct-condition',
				'condition' => [ 'sidebar_type' => 'type-2' ],
				'options' => [

					'separated_widgets' => [
						'label' => __( 'Separate Widgets' ),
						'type' => 'ct-switch',
					],

				],
			],

			custy_rand_id() => [ 'type' => 'ct-divider' ],

			'has_sticky_sidebar' => [
				'label' => __( 'Sticky Sidebar' ),
				'type' => 'ct-switch',
			],

			custy_rand_id() => [
				'type' => 'ct-condition',
				'condition' => [ 'has_sticky_sidebar' => 'yes' ],
				'options' => [

					'sidebarOffset' => [
						'label' => __( 'Top Offset' ),
						'desc' => my_css_desc([
							'--sidebarOffset'
						]),
						'type' => 'ct-slider',
						'units' => [
							[ 'unit' => 'px', 'min' => 0, 'max' => 50 ],
							[ 'unit' => 'rem', 'min' => 0, 'max' => 3 ]
						],
						'divider' => 'top',
						
					],
				],
			],

			custy_rand_id() => [ 'type' => 'ct-divider' ],

			'sidebar_visibility' => [
				'label' => __( 'Visibility' ),
				'type' => 'ct-visibility',
			],

		] ],

		custy_rand_id() => [
		'title' => __( 'Content' ),
		'type' => 'tab',
		'css_selector' => '.ct-sidebar',
		'options' => [

			'sidebarWidgetsSpacing' => [
				'label' => __( 'Widgets Spacing' ),
				'type' => 'ct-slider',
				'responsive' => true,
				'units' => [
					'px' => [ 'min' => 0, 'max' => 80 ],
					'rem' => [ 'min' => 0, 'max' => 5 ], 
				],
				'css' => '--sidebarWidgetsSpacing'
			],

			custy_rand_id() => [ 'label' => __( 'Sidebar Text' ), 'type' => 'ct-title' ],

			'sidebarTitleSize' => [
				'label' => __( 'Title Size' ),
				'type' => 'ct-select/heading',
				'desc' => my_css_desc([
					'--sidebarTitleSize'
				]),
			],

			'sidebarTitleColor' => [
				'label' => __( 'Title Color' ),
				'desc' => my_css_desc([
					'--sidebarTitleColor'
				]),
				'type'  => 'ct-color-picker',
				'pickers' => [
					'default' => __( 'Initial' )
				],
			],

			'sidebarFontSize' => [
				'label' => __( 'Font Size' ),
				'type' => 'ct-select/font-size',
				'desc' => my_css_desc([
					'--sidebarFontSize'
				]),
			],

			'sidebarFontColor' => [
				'label' => __( 'Font Color' ),
				'desc' => my_css_desc([
					'--color',
					'--colorHover'
				]),
				'type'  => 'ct-color-picker',
				'pickers' => [
					'default' => __( 'Initial' ),
					'hover' => __( 'Hover' ),
				],
			],

		] ],
    
  ]
];