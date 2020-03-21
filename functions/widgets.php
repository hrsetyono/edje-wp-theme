<?php

add_action( 'widgets_init', 'my_widgets_init' );


function my_widgets_init() {

  register_sidebar( [
    'name' => __( 'Sidebar' ),
    'id' => 'sidebar',
    'description' => __( 'Widgets for Blog and Single Post page. You must enable it in Customizer > Blog Posts' ),
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
}