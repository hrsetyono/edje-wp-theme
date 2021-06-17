<?php
$context = Timber::get_context();
$context['post'] = Timber::get_post();

$context['related_posts'] = Timber::get_posts([
  'post_type' => 'post',
  'posts_per_page' => '3',
  'post__not_in' => [ $context['post']->ID ],
  // 'category__in' => $context['post']->categories,
  'orderby' => 'rand'
]);

$context['sidebar'] = Timber::get_widgets( 'sidebar' );

Timber::render( ['single-' . $post->post_type . '.twig', 'single.twig'], $context );
