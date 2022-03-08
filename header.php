<?php

$args = [
  'headers' => [
    'subheader' => H::dynamic_sidebar('subheader'),
    'header' => H::dynamic_sidebar('header'),
    'subheader-mobile' => H::dynamic_sidebar('subheader-mobile'),
    'header-mobile' => H::dynamic_sidebar('header-mobile'),
  ],
  'offcanvas' => H::dynamic_sidebar('offcanvas'),
];

get_template_part('views/_header', '', $args);