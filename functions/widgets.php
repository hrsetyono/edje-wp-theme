<?php

add_action( 'widgets_init', 'my_widgets_init' );


function my_widgets_init() {
  register_sidebar( [
    'name'          => esc_html__( 'Sidebar' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.' ),
    'before_widget' => '<div class="ct-widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
	] );

  $number_of_sidebars = 4;

  for ( $i = 1; $i <= $number_of_sidebars; $i++ ) {
    register_sidebar( [
      'id'            => 'ct-footer-sidebar-' . $i,
      'name'          => "Footer Column $i",
      'before_widget' => '<div class="ct-widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
		] );
	}
}