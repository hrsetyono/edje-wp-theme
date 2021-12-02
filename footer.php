<?php
$args = [
  'footers' => [
    'top-row' => H::dynamic_sidebar( 'footer-top' ),
    'mid-row' => H::dynamic_sidebar( 'footer-mid' ),
    'bottom-row' => H::dynamic_sidebar( 'footer-bottom' ),
  ],
];

get_template_part('views/_footer', '', $args);