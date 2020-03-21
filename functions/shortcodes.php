<?php
/**
 * Custom Shortcode
 * @deprecated: try not to use this if possible, it's hard for client to understand
 */
class MyShortcodes {
  function __construct() {
    add_shortcode( 'example', [$this, 'example'] );

    add_shortcode( 'h-related-posts', [$this, 'related_posts'] );
  }

  /**
   * Example of custom shortcode
   *   [example name="$name"] ... [/example]
   */
  function example( $atts, $content = null ) {
    $atts = shortcode_atts([
      'name' => 'Default value'
    ], $atts);

    return "<div class='example'> <h2>{$atts['name']}</h2> $content </div>";
  }

  /**
   * Show Related Posts
   * 
   * [h-related-posts count="3"]
   */
  function related_posts( $atts, $content = null ) {
    global $post;

    $atts = shortcode_atts([
      'count' => '3'
    ], $atts);

    $context = [
      'style' => 'grid',
      'mods' => Custy::get_mods(),
      'posts' => Timber::get_posts([
        'post_type' => 'post',
        'posts_per_page' => $atts['count'],
        'post__not_in' => [ $post->ID ],
        'category__in' => wp_get_post_categories( $post->ID ),
        'orderby' => 'rand'
      ]),
    ];

    return Timber::compile( '_posts.twig', $context );
  }
}


new MyShortcodes();