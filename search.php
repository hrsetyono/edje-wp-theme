<?php
global $wp_query;
$query = get_search_query();

$title = "Search result for \"{$query}\"";
$posts = $wp_query->get_posts();

///// ?>

<?php get_header(); ?>

<main role="main">
  <?php get_template_part('parts/blog-header', '', [ 'title' => $title ]); ?>
  <?php get_template_part('parts/posts', '', $posts); ?>
</main>

<?php get_footer(); ?>