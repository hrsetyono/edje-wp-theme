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

  /**
   * Each color will be outputted into 2 classes:
   * 
   *   `has-x-background-color` and `has-x-color`.
   */
  add_theme_support( 'editor-color-palette', H::color_palette([
    'Main'         => 'var(--main)',
    'Main Dark'    => 'var(--mainDark)',
    'Main Light'   => 'var(--mainLight)',
    'Sub'          => 'var(--sub)',
    'Sub Light'    => 'var(--subLight)',
    'Text'         => 'var(--text)',
    'Text Invert'  => 'var(--textInvert)',
  ]) );

}