<?php

add_action( 'after_setup_theme', 'my_theme_supports' );


function my_theme_supports() {
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'menus' );
  add_theme_support( 'custom-logo' );
  add_theme_support( 'title_tag' );
  add_theme_support( 'html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption'] );
  add_theme_support( 'automatic-feed-links' );
  add_post_type_support( 'page', 'excerpt' ); // allow page to have excerpt
  
  add_theme_support( 'widgets' );
  add_theme_support( 'customize-selective-refresh-widgets' );

  // Gutenberg support
  add_theme_support( 'align-wide' );
  add_theme_support( 'responsive-embeds' );

  // Edje Support
  add_theme_support( 'h-faq-block' );

  if( class_exists( 'Custy' ) ) {
    add_theme_support( 'editor-color-palette', Custy::get_editor_color_palette() );
    add_theme_support( 'editor-font-sizes', Custy::get_editor_font_sizes() );

    // Add @font-face in custy.css and append these fonts in Customizer dropdown
    $font_dir = get_stylesheet_directory_uri() . '/assets/fonts';

    add_theme_support( 'custy-fonts', [
      'Source Sans Pro' => [
        '400' => $font_dir . '/sourcesanspro-regular.woff2',
        '400i' => $font_dir . '/sourcesanspro-italic.woff2',
        '700' => $font_dir . '/sourcesanspro-bold.woff2',
      ],
      'Noto Serif' => [
        '700' => $font_dir . '/notoserif-bold.woff2',
      ],
    ] );

  }

}