<?php
$context = Timber::get_context();

$post = Timber::get_post( get_option( 'page_for_posts' ) );
$context['title'] = $post->title;
$context['description'] = $post->_genesis_description ?? $post->post_excerpt;

$context['posts'] = Timber::get_posts();
$context['blog_nav'] = new TimberMenu( 'blog-nav' );

// if infinite scroll not active, add Pagination
if(!class_exists('Jetpack') || !Jetpack::is_module_active('infinite-scroll') || is_paged() ) {
  $context['pagination'] = Timber::get_pagination();
}

Timber::render('index.twig', $context);
