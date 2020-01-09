<?php

add_filter( 'h_customizer_defaults', function( $defaults ) {
  return wp_parse_args( [

    // FORMS
    'forms_type' => 'classic-forms', // @deprecated
    'formTextColor' => [
      'default' => [ 'color' => 'var(--text)' ],
      'focus' => [ 'color' => 'var(--text)' ],
    ],
    'formFontSize' => '1rem',
    'formBorder' => [
      'width' => 2,
      'style' => 'solid',
      'color' => [ 'color' => 'rgba(232, 235, 240, 1)' ],
    ],
    'formBorderFocusColor' => [
      'focus' => [ 'color' => 'var(--main)' ],
    ],
    'formBackgroundColor' => [
      'default' => [ 'color' => '#ffffff' ],
      'focus' => [ 'color' => '#ffffff' ],
    ],
    'formInputHeight' => '2.75rem',
    'formTextAreaHeight' => '8rem',
  
    'selectDropdownTextColor' => [
      'default' => [ 'color' => 'CT_CSS_SKIP_RULE' ],
      'hover' => [ 'color' => 'var(--c1)' ],
      'active' => [ 'color' => 'var(--c3)' ],
    ],
    'selectDropdownItemColor' => [
      'hover' => [ 'color' => 'rgba(0,0,0, 0.05)' ],
      'active' => [ 'color' => 'var(--c1)' ],
    ],
    'selectDropdownBackground' => [
      'default' => [ 'color' => '#ffffff' ],
    ],
  
    'radioCheckboxColor' => [
      'default' => [ 'color' => '#e8ebf0' ],
      'accent' => [ 'color' => 'var(--c1)' ],
    ],
  

  ], $defaults );
});