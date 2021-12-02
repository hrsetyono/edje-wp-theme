<?php
global $wp_query;

$args = [
  'title' => 'Blog',
  'posts' => $wp_query,
  'pagination' => H::get_pagination(),
];

get_header();
get_template_part('views/index', '', $args);
get_footer();