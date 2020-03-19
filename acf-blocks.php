<?php

$context = [
  '_name' => str_replace( 'acf/', '', $block['name'] ),
  '_align' => $block['align'],
  '_className' => $block['className'],
];

// Parse the custom field values
foreach( $block['data'] as $key => $raw_value ) {
  // If start with underscore, continue
  if( substr( $key, 0, 1 ) === '_' ) { continue; }

  $name = $key;
  
  // If start with "field", get the field name
  if( substr( $key, 0, 6 ) === 'field_' ) {
    $field_object = get_field_object( $key );
    $name = $field_object['name'];
  }

  $context[ $name ] = get_field( $key );
}

Timber::render( "acf-blocks/{$context['_name']}.twig", $context );