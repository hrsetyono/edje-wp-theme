<?php
global $wp_query;

$title = 'Blog';
$posts = $wp_query->get_posts();
$pagination = H::get_pagination();

///// ?>

<?php get_header(); ?>

<main role="main">
  <?php get_template_part('parts/blog-header', '', [ 'title' => $title ]); ?>
  <?php get_template_part('parts/posts', '', $posts); ?>
  <?php get_template_part('parts/pagination', '', $pagination); ?>
</main>

<?php get_footer(); ?>