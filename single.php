<?php
global $post;

add_filter('previous_post_link', 'my_adjacent_post_link', 10, 5);
add_filter('next_post_link', 'my_adjacent_post_link', 10, 5);

$args = [
  // Related posts
  'post' => $post,
  'posts' => get_posts([
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


/**
 * @filter prev_post_link
 */
function my_adjacent_post_link($output, $format, $link, $post, $adjacent) {
  if (strpos($output, '%thumbnail') && $post) {
    $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'thumbnail');
    $thumbnail = $thumbnail_url ? "<img src='{$thumbnail_url}'>"  : '';

    $output = str_replace('%thumbnail', $thumbnail, $output);
  }

  if (strpos($output, '%label')) {
    $label = $adjacent === 'next' ? __('Next Post') : __('Previous Post');
    $label = "<em>{$label}</em>";

    $output = str_replace('%label', $label, $output);
  }

  return $output;
}
