<?php
$args = [
  'footers' => [
    'top' => H::dynamic_sidebar('footer-top'),
    'mid' => H::dynamic_sidebar('footer-mid'),
    'bottom' => H::dynamic_sidebar('footer-bottom'),
  ],
];

get_template_part('views/_footer', '', $args);