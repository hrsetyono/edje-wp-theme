<?php

$args = [
  'headers' => [
    'top-row' => H::dynamic_sidebar('header-top'),
    'mid-row' => H::dynamic_sidebar('header-mid'),
    'top-row-mobile' => H::dynamic_sidebar('header-top-mobile'),
    'mid-row-mobile' => H::dynamic_sidebar('header-mid-mobile'),
  ],
  'offcanvas' => H::dynamic_sidebar('header-offcanvas'),
];

get_template_part('views/_header', '', $args);