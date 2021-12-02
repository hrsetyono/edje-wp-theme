<?php
global $post;
$args = [
  // Related posts
  'post' => $post,
  'posts' => new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => '3',
    'post__not_in' => [ $post->ID ],
    'orderby' => 'rand',
    // 'category__in' => array_map(function($term) {
    //   return $term->term_id;
    // }, get_the_category()),
  ]),
];

get_header();
get_template_part('views/single', $post->post_type, $args);
get_footer();