<?php
global $post;
$args = [];

get_header();
get_template_part('views/page', $post->post_name, $args);
get_footer();