<?php
$context = Timber::get_context();
$query = get_search_query();
$context['title'] = "Search result for \"$query\"";

$context['posts'] = Timber::get_posts();

Timber::render('search.twig', $context);
