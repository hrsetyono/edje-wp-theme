<?php
$context = Timber::get_context();
$context['posts'] = Timber::get_posts();
$query = get_queried_object();

$templates = [ 'archive.twig' ];
$context['title'] = $query->name;
$context['description'] = $query->description;

// if infinite scroll not active, add Pagination
if( !class_exists('Jetpack') || !Jetpack::is_module_active('infinite-scroll') || is_paged() ) {
  $context['pagination'] = Timber::get_pagination();
}


// If post category
if( is_category() ) {
  $context['term'] = $query; 
  $context['blog_nav'] = new TimberMenu( 'blog-nav' );
}
// If custom taxonomy page
elseif( is_tax() ) {
  $context['term'] = $query;
  array_unshift( $templates, 'archive-' . $query->taxonomy . '.twig' );
}
// If custom post-type page
elseif( is_post_type_archive() ) {
  array_unshift( $templates, 'archive-' . get_post_type() . '.twig' );
}
// If author page
elseif( is_author() ) {
  $avatar_url = get_avatar_url( $query->ID );
  $context['title'] = "<img src='{$avatar_url}'> <small>Posts by</small> {$query->display_name}";
  $context['description'] = "{$context['description']} \n \n {$query->user_url}";
}


Timber::render( $templates, $context );
