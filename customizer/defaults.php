<?php
/**
 * Default values for custom settings
 */
add_filter( 'custy_default_values', function( $defaults ) {
  return wp_parse_args( [

    // GRID
    'siteWidth' => '1120px',
    'blogWidth' => '650px',

    'gridGap' => '20px',
    'gridRim' => '10px',
    'tileGap' => '20px',


    // TYPOGRAPHY
    'headingColor' => [
      'default' => [ 'color' => 'var(--text)' ],
    ],
    'linkColor' => [
      'default' => [ 'color' => 'var(--text)', ],
      'hover' => [ 'color' => 'var(--main)', ],
    ],
    'blockquote' => blocksy_typography_default_values([
      'size' => '18px',
    ]),
    'pre' => blocksy_typography_default_values([
      'family' => 'monospace',
      'size' => '14px',
      'variation' => 'n4'
    ]),


    // BUTTON
    'buttons' => blocksy_typography_default_values([
      'size' => '18px',
      'line-height' => '1',
    ]),
    'buttonBackground' => [
      'default' => [ 'color' => 'var(--main)', ],
      'hover' => [ 'color' => 'var(--mainDark)', ],
    ],
    'buttonTextColor' => [
      'default' => [ 'color' => 'var(--textInvert)', ],
      'hover' => [ 'color' => 'var(--textInvert)', ],
    ],
    'buttonBorder' => [
      'width' => 1,
      'style' => 'solid',
      'color' => [ 'color' => 'var(--mainDark)' ],
    ],
    'buttonPadding' => [
      'top' => '0.75rem',
      'right' => '1.25rem',
      'bottom' => '0.75rem',
      'left' => '1.25rem',
    ],


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


    // SIDEBAR
    'sidebar_type' => 'type-1',
    'sidebarWidth' => '25%',
    'sidebarGap' => '3rem',
    'sidebarInnerSpacing' => [
      'mobile' => '0.5rem',
      'tablet' => '0.75rem',
      'desktop' => '1rem',
    ],
    'separated_widgets' => 'no',
    'has_sticky_sidebar' => 'no',
    'sidebarOffset' => '1rem',
    'sidebarBackgroundColor' => [
      'default' => [ 'color' => 'var(--textInvert)' ],
    ],
    'sidebarBorder' => [
      'width' => 1,
      'style' => 'solid',
      'color' => [ 'color' => 'rgba(224, 229, 235, 0.8)' ],
    ],
    'sidebarShadow' => 'none',
    'sidebar_visibility' => [
      'desktop' => true,
      'tablet' => true,
      'mobile' => false,
    ],

    // SIDEBAR > Content
    'sidebarTitleSize' => 'var(--h4Size)',
    'sidebarTitleColor' => [
      'default' => [ 'color' => 'var(--text)' ],
    ],
    'sidebarWidgetsSpacing' => [
      'mobile' => '1rem',
      'tablet' => '1.5rem',
      'desktop' => '2rem',
    ],
    'sidebarFontSize' => 'var(--smallFontSize)',
    'sidebarFontColor' => [
      'default' => [ 'color' => 'CT_CSS_SKIP_RULE' ],
      'hover' => [ 'color' => 'CT_CSS_SKIP_RULE' ],
    ],


    // OTHER > Back to Top
    'has_back_top' => 'yes',
    'top_button_type' => 'type-1',
    'top_button_shape' => 'square',
    'topButtonOffset' => '25px',
    'top_button_alignment' => 'right',
    'back_top_visibility' => [ 'desktop' => true, 'tablet' => true, 'mobile' => false ],

    'topButtonIconColor' => [
      'default' => [ 'color' => '#ffffff' ],
      'hover' => [ 'color' => '#ffffff' ],
    ],
    'topButtonShapeBackground' => [
      'default' => [ 'color' => 'var(--text)' ],
      'hover' => [ 'color' => 'var(--textInvert)' ],
    ],
    'topButtonShadow' => 'var(--shadow1)',

    // OTHER > Performance
    'emoji_scripts' => 'no',
    'has_lazy_load' => 'yes',
    'lazy_load_type' => 'fade',
    

    // BLOG POSTS
    'blogTitleSize' => 'var(--h1Size)',
    'blogTitleColor' => [
      'default' => [ 'color' => 'var(--text)' ]
    ],

  ], $defaults );
} );