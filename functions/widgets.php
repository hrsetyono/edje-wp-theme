<?php

add_action( 'widgets_init', function() {

  register_sidebar( [
    'name' => __( 'Sidebar' ),
    'id' => 'sidebar',
    'description' => __( 'Widgets for Blog and Single Post page. You must enable it via Customizer.' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
	] );

  $number_of_sidebars = 4;

  for ( $i = 1; $i <= $number_of_sidebars; $i++ ) {
    register_sidebar( [
      'id' => 'footer-widget-' . $i,
      'name' => "Footer Widget $i",
		] );
  }
  
} );