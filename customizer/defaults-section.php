<?php
/**
 * Default values for Core Settings
 * Learn more: https://github.com/hrsetyono/wp-custy/wiki/Default-Value
 */
add_filter( 'custy_default_values', function( $defaults ) {

  ///  CORE SECTION  ///
  $defaults = wp_parse_args( [
    'colorPalette' => [
      'color1' => [ 'color' => '#1976d2' ],
      'color2' => [ 'color' => '#0d47a1' ],
      'color3' => [ 'color' => '#bbdefb' ],
      'color4' => [ 'color' => '#4caf50' ],
      'color5' => [ 'color' => '#c8e6c9' ],
    ],

  ], $defaults );

  /// CUSTOM SECTION ///
  $defaults = wp_parse_args( [
    // FEATURES
    'has_back_to_top' => 'no',
    'back_to_top_style' => 'arrow-up',
    'back_to_top_alignment' => 'right',
    'back_to_top_visibility' => [
      'desktop' => true,
      'tablet' => true,
      'mobile' => false
    ],

    'has_frame' => 'no',
    'frameSize' => [
      'desktop' => '10px',
      'tablet' => '8px',
      'mobile' => '5px',
    ],
    'frameColor' => [
      'default' => [ 'color' => 'var(--text)' ]
    ],

    // BLOG POSTS
    'archive_style' => 'default',
    'postsPerRow' => [
      'desktop' => 3,
      'tablet' => 2,
      'mobile' => 1
    ],

    'archive_elements' => [
      [ 'id' => 'title', 'enabled' => true ],
      [ 'id' => 'featured_image', 'enabled' => true, 'ratio' => '2:1', 'height' => '50%' ],
      [ 'id' => 'excerpt', 'enabled' => true, 'word_count' => 30 ],
      [ 'id' => 'read_more_button', 'enabled' => false, 'style' => 'transparent', 'text' => __( 'Read More' ) ],
      [ 'id' => 'post_meta', 'enabled' => true, 'meta' => [
        'categories' => true,
        'author' => true,
        'date' => true,
        'comments' => true,
        'tags' => true,
      ] ],
    ],

    'archive_has_sidebar' => 'no',
    'archive_sidebar_position' => 'right',


    // SINGLE POST
    'post_style' => 'narrow',

    'post_elements' => [
      [ 'id' => 'title', 'enabled' => true,
        'style' => 'hero',
        'banner_style' => 'color',
        'meta' => [
          'categories' => true,
          'author' => true,
          'date' => true,
          'comments' => true,
          'tags' => true,
        ]
      ],
      [ 'id' => 'featured_image', 'enabled' => true,
        'style' => 'wide',
        'ratio' => '3:1',
        'height' => [ 'desktop' => '250px', 'tablet' => '300px', 'mobile' => '300px' ]
      ],
      [ 'id' => 'content', 'enabled' => true ],
      [ 'id' => 'share', 'enabled' => true ],
      [ 'id' => 'author-box', 'enabled' => true, 'show_avatar' => 'yes', 'show_social_media' => 'yes' ],
      [ 'id' => 'next-prev-post', 'enabled' => true ],
    ],

    'post_footer_elements' => [
      [ 'id' => 'related-posts', 'enabled' => true, 'use_jetpack' => 'yes' ],
      [ 'id' => 'comments', 'enabled' => true ],
    ],


  ], $defaults );


  return $defaults;
} );