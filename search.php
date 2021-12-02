<?php
global $wp_query;
$query = get_search_query();

$args = [
  'title' => "Search result for \"{$query}\"",
  'query' => $query,
  'posts' => $wp_query,
];

get_header();
get_template_part('views/index', '', $args);
get_footer();