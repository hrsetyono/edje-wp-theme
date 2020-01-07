<?php

add_filter( 'h_customizer_css', 'my_customizer_css', 1, 2 );

function my_customizer_css( $styles, $mods ) {

  return wp_parse_args( $styles, [
    ':root' => [
      // WRAPPER
      '--site$' => $mods['site_background'],
      '--maxSiteWidth' => $mods['maxSiteWidth'],
      '--contentAreaSpacing' => $mods['contentAreaSpacing'],
      '--narrowContainerWidth' => $mods['narrowContainerWidth'],
      '--narrowContainerWidthNoUnit' => intval( $mods['narrowContainerWidth'] ),
      '--wideOffset' => $mods['wideOffset'],

      // PALETTE COLOR
      '--main' => $mods['colorPalette']['color1']['color'],
      '--mainDark' => $mods['colorPalette']['color2']['color'],
      '--mainLight' => $mods['colorPalette']['color3']['color'],
      '--sub' => $mods['colorPalette']['color4']['color'],
      '--subLight' => $mods['colorPalette']['color5']['color'],
      '--text' => $mods['textColor']['default']['color'],
      '--textInvert' => $mods['textColor']['invert']['color'],

      // COLOR
      '--headingColor' => $mods['headingColor']['default']['color'],
      '--linkColor' => $mods['linkColor']['default']['color'],
      '--linkColorHover' => $mods['linkColor']['hover']['color'],

      '--buttonTextInitialColor' => $mods['buttonTextColor']['default']['color'],
      '--buttonTextHoverColor' => $mods['buttonTextColor']['hover']['color'],
      '--buttonInitialColor' => $mods['buttonColor']['default']['color'],
      '--buttonHoverColor' => $mods['buttonColor']['hover']['color'],

      // SHADOWS
      '--shadow0' => $mods['shadow0'],
      '--shadow1' => $mods['shadow1'],
      '--shadow2' => $mods['shadow2'],
      '--shadow3' => $mods['shadow3'],
      '--shadow4' => $mods['shadow4'],

      // TYPOGRAPHY
      '--$' => $mods['rootTypography'],
      '--smallFontSize' => $mods['smallFontSize'],
      '--mediumFontSize' => $mods['mediumFontSize'],
      '--largeFontSize' => $mods['largeFontSize'],
      
      '--h$' => $mods['headingTypography'],
      '--h1Size' => $mods['h1Size'],
      '--h2Size' => $mods['h2Size'],
      '--h3Size' => $mods['h3Size'],
      '--h4Size' => $mods['h4Size'],
      '--h5Size' => $mods['h5Size'],
      '--h6Size' => $mods['h6Size'],

      '--button$' => $mods['buttons'],
    ],

    // FORM
    'form' => [
      '--formTextInitialColor' => $mods['formTextColor']['default']['color'],
      '--formTextFocusColor' => $mods['formTextColor']['focus']['color'],
      '--formFontSize' => $mods['formFontSize'],
      '--formBackgroundInitialColor' => $mods['formBackgroundColor']['default']['color'],
      '--formBackgroundFocusColor' => $mods['formBackgroundColor']['focus']['color'],
      
      '--formInputHeight' => $mods['formInputHeight'],
      '--formTextAreaHeight' => $mods['formTextAreaHeight'],

      '--formBorder' => $mods['formBorder'],
      '--formBorderFocusColor' => $mods['formBorderFocusColor']['focus']['color'],

      '--selectDefaultColor' => $mods['selectDropdownTextColor']['default']['color'],
      '--selectHoverColor' => $mods['selectDropdownTextColor']['hover']['color'],
      '--selectActiveColor' => $mods['selectDropdownTextColor']['active']['color'],
      '--selectItemHoverColor' => $mods['selectDropdownItemColor']['hover']['color'],
      '--selectItemActiveColor' => $mods['selectDropdownItemColor']['active']['color'],
      '--selectBackground' => $mods['selectDropdownBackground']['default']['color'],

      '--radioInitialColor' => $mods['radioCheckboxColor']['default']['color'],
      '--radioAccentColor' => $mods['radioCheckboxColor']['accent']['color'],
    ],

    // TYPOGRAPHY > Blockquote
    '.entry-content blockquote, .ct-quote-widget blockquote p' => [
      '--$' => $mods['blockquote'],
    ],

    // TYPOGRAPHY > Preformatted
    'code, kbd, samp, pre' => [
      '--$' => $mods['pre'],
    ],

    // GENERAL > Back to Top
    '.ct-back-to-top' => [
      '--bottom' => $mods['topButtonOffset'],
      '--color' => $mods['topButtonIconColor']['default']['color'],
      '--colorHover' => $mods['topButtonIconColor']['hover']['color'],
      '--backgroundColor' => $mods['topButtonShapeBackground']['default']['color'],
      '--backgroundColorHover' => $mods['topButtonShapeBackground']['hover']['color'],
      '--boxShadow' => $mods['topButtonShadow'],
    ],

    // SIDEBAR
    '[data-sidebar]' => [
      '--sidebarWidth' => $mods['sidebarWidth'],
      '--sidebarWidthNoUnit' => intval( $mods['sidebarWidth'] ),
      '--sidebarGap' => $mods['sidebarGap'],
      
      '--sidebarOffset' => $mods['sidebarOffset'],
      '--sidebarInnerSpacing' => $mods['sidebarInnerSpacing'],
      '--sidebarBackgroundColor' => $mods['sidebarBackgroundColor']['default']['color'],
      '--sidebarBorder' => $mods['sidebarBorder'],
      '--sidebarShadow' => $mods['sidebarShadow'],
    ],

    '.ct-sidebar' => [
      '--sidebarWidgetsSpacing' => $mods['sidebarWidgetsSpacing'],

      '--sidebarTitleSize' => $mods['sidebarTitleSize'],
      '--sidebarTitleColor' => $mods['sidebarTitleColor']['default']['color'],

      '--fontSize' => $mods['sidebarFontSize'],
      '--color' => $mods['sidebarFontColor']['default']['color'],
      '--colorHover' => $mods['sidebarFontColor']['hover']['color'],
    ],
  ] );

}