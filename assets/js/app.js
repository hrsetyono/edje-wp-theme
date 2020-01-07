(function( $ ) { 'use strict';

document.addEventListener( 'DOMContentLoaded', onReady );
window.addEventListener( 'load', onLoad );

function onReady() {
  myApp.init();
  myNav.init();
}

function onLoad() {
  // script that runs when everything is loaded
}


///// GENERAL LISTENERS

var myApp = {
  init() {
    this.gallerySlider();
    this.galleryLightbox();
  },

  /**
   * Setup Gallery Block with "Slider" style
   * 
   * Read more https://github.com/hrsetyono/hSlider
   */
  gallerySlider() {
    let $targets = $('.wp-block-gallery.is-style-h-slider .blocks-gallery-grid');

    $targets.each( function() {
      let $t = $(this);
      let perSlide = $t.closest('.wp-block-gallery').attr('class').match( /columns-(\d+)/ );

      hSlider( $t.get(0), {
        index: 0,
        arrows: true,
        dots: true,
        itemsPerSlide: perSlide[1],
        responsive: { 767: 2, 480: 1 }
      });
    });
  },


  /**
   * Setup Gallery or Image block that has link to an image
   * 
   * Read more at https://github.com/hrsetyono/hLightbox
   */
  galleryLightbox() {
    let $targets = document.querySelectorAll('.wp-block-gallery a, .wp-block-image a');

    for( let $t of $targets ) {
      let href = $t.getAttribute( 'href' );
      if( href.match(/^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+(?:png|jpg|jpeg|gif|svg)/) ) {
        hLightbox( $t, { closeButton: true } );
      }
    }
  }
};


///// NAVIGATION

var myNav = {
  init() {
    this.mobileNav();
    this.cartNav();

    $(document).on( 'click', this.closeNav );
  },


  /**
   * Toggle mobile nav
   */
  mobileNav() {
    $('#nav-toggle').on( 'click', _toggle );
    $('.nav-items').on( 'click', this.preventClose );

    //
    function _toggle( e ) {
      e.preventDefault();
      e.stopPropagation();
      $('body').removeClass( 'has-active-cart' ).toggleClass( 'has-active-nav' );
    }
  },


  /**
   * Toggle cart nav
   */
  cartNav() {
    if( $( '#cart-button' ).length == 0 ) { return; }

    $( document ).on( 'click', '#cart-button', toggle );
    $( document ).on( 'click', '.cart-dialog', this.preventClose );

    //
    function toggle( e ) {
      e.preventDefault();
      e.stopPropagation();

      $( 'body' ).removeClass( 'has-active-nav' ).toggleClass( 'has-active-cart' );
    }
  },

  // Close all nav when clicking outside
  closeNav( e ) {
    $('body').removeClass( 'has-active-nav has-active-cart' );
  },


  // Prevent nav closed when clicking this part
  preventClose( e ) {
    e.stopPropagation();
  }
};

// Browser compatibility, leave this untouched
if('registerElement' in document) { document.createElement( 'h-grid' ); document.createElement( 'h-tile' ); }
})( jQuery );