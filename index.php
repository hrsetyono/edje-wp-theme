<?php
$context = Timber::get_context();

$blog_page_id = get_option( 'page_for_posts' );
if( $blog_page_id ) {
  $post = Timber::get_post( get_option( 'page_for_posts' ) );
  $context['title'] = $post->title;
  $context['description'] = $post->_genesis_description ?? $post->post_excerpt;
}

$context['posts'] = Timber::get_posts();

// if infinite scroll not active, add Pagination
if(!class_exists('Jetpack') || !Jetpack::is_module_active('infinite-scroll') || is_paged() ) {
  $context['pagination'] = Timber::get_pagination();
}

Timber::render('index.twig', $context);