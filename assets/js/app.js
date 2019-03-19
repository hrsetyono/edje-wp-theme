'use strict';

(function() { 

$( onReady );
$( window ).on( 'load', onLoad );

function onReady() {
  myApp.init();
  myNav.init();
}

function onLoad() {
}


///// GENERAL LISTENERS

var myApp = {
  init() {
    // this.slider();
    // this.lightbox();
  },

  /*
    hSlider Example
    https://github.com/hrsetyono/hSlider
  */
  slider() {
    hSlider( $('.wp-gallery').get(0), {
      index: 0,
      arrows: true,
      dots: true,
      itemsPerSlide: 3,
      responsive: {
        767: 2,
        480: 1
      }
    });
  },

  /*
    hLightbox Example
    https://github.com/hrsetyono/hLightbox
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
    this.dialogNav();

    $(document).on( 'click', this.closeNav );
  },

  /*
    Toggle mobile nav
  */
  mobileNav() {
    $('#nav-toggle').on( 'click', toggle );
    $('.nav-items').on( 'click', this.preventClose );

    
    function toggle( e ) {
      e.stopPropagation();
      $('body').removeClass( 'dialog-is-active' ).toggleClass( 'nav-is-active' );
    }
  },


  /*
    Toggle dialog nav

    <a data-dialog="my-dialog-id"> Click me </a>
    <div id="my-dialog-id" class="dialog">
      ...
    </div>
  */
  dialogNav() {
    var self = this;
    $( document.body ).on( 'click', '[data-dialog]', toggle );
    $( document.body ).on( 'click', '.dialog', self.preventClose );

    //
    function toggle( e ) {
      e.preventDefault();
      e.stopPropagation();
      var $target = $( '#' + $(this).data( 'dialog' ) );

      $('.dialog--active').not( $target ).removeClass( 'dialog--active' ); // close other nav dialog
      $('body').removeClass( 'nav-is-active' ).toggleClass( 'dialog-is-active' ); // close main menu, toggle dialog menu
      $target.toggleClass( 'dialog--active' ); // toggle selected dialog menu
    }
  },

  // Close all nav when clicking outside
  closeNav( e ) {
    $('.dialog--active').removeClass( 'dialog--active' );
    $('body').removeClass( 'nav-is-active  dialog-is-active' );
  },


  // Prevent nav closed when clicking this part
  preventClose( e ) {
    e.stopPropagation();
  }
};

// Browser compatibility, leave this untouched
if('registerElement' in document) { document.createElement( 'h-grid' ); document.createElement( 'h-tile' ); }
})();