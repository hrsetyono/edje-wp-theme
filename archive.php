<?php
global $wp_query;
$query = get_queried_object();
$views_name = '';

$args = [
  'title' => $query->name,
  'description' => $query->description,
  'posts' => $wp_query->get_posts(),
  'pagination' => H::get_pagination(),
];

// If post category
if (is_category()) {
  $views_name = $query->slug;
}
// If custom taxonomy page
elseif (is_tax()) {
  $views_name = $query->taxonomy;
}
// If custom post-type page
elseif (is_post_type_archive()) {
  $views_name = get_post_type();
}
// If author page
elseif (is_author()) {
  $views_name = 'author';
}

get_header();
get_template_part('views/archive', $views_name, $args);
get_footer();