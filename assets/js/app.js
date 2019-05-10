(function() { 'use strict';
if( window.jQuery ) { $ = jQuery; }

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
    // this.slider();
    // this.lightbox();
  },

  /**
   * hSlider example
   * If you don't use this, remove the enqueue_script in functions.php 
   * 
   * Read more https://github.com/hrsetyono/hSlider
   */
  slider() {
    hSlider( $('.example-slider').get(0), {
      index: 0,
      arrows: true,
      dots: true,
      itemsPerSlide: 3,
      responsive: { 767: 2, 480: 1 }
    });
  },

  /**
   * hLightbox example
   * If you don't use this, remove the enqueue_script in functions.php 
   * 
   * Read more at https://github.com/hrsetyono/hLightbox
   */
  lightbox() {
    hLightbox( $('.wp-block-button a').get(0), {
      closeButton: true
    });
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
    $('#nav-toggle').on( 'click', toggle );
    $('.nav-items').on( 'click', this.preventClose );

    //
    function toggle( e ) {
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
})();