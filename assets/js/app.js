(function( $ ) { 'use strict';

document.addEventListener( 'DOMContentLoaded', onReady );
window.addEventListener( 'load', onLoad );

function onReady() {
  myApp.init();
  myHeader.init();
  myJetpack.init();
}

function onLoad() {
  // script that runs when everything is loaded
}


///// GENERAL LISTENERS

var myApp = {
  init() {
    this.backToTop();
    this.gallerySlider();
    this.galleryLightbox();
  },

  backToTop() {
    $( '[data-back-to-top]' ).on( 'click', ( e ) => {
      $( '#main-container' ).smoothScroll();
    } );
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


///// HEADER

var myHeader = {
  init() {
    $( document ).on( 'click', this.closeOffcanvas );

    // Sticky
    this.stickyRow();

    $( '[href="#menu"]' ).on( 'click', this.toggleOffcanvas );
    $( '.offcanvas .menu-item-has-children' ).on( 'click', this.toggleMobileChildren );

    $( '[data-mobile-dropdown-toggle]' ).on( 'click', this.toggleMobileDropdown );
  },

  /**
   *  
   */
  stickyRow() {
    var target = '.header--mid-row';
    var classToToggle = 'header--stuck';

    if( !( CSS.supports && CSS.supports( 'position', 'sticky' ) ) ) { return; }

    var $elems = [].slice.call( document.querySelectorAll( target ) );

    // Initial check if already sticky
    $elems.forEach( _checkStickyState );

    window.addEventListener( 'scroll', (e) => {
      $elems.forEach( _checkStickyState );
    } );

    //
    function _checkStickyState( $elem ) {
      var currentOffset = $elem.getBoundingClientRect().top;
      var stickyOffset = parseInt( getComputedStyle( $elem ).top.replace( 'px','' ) );
      var isStuck = currentOffset <= stickyOffset;
    
      if( isStuck ) {
        $elem.classList.add( classToToggle );
      } else {
        $elem.classList.remove( classToToggle );
      }
    }
  },

  /**
   * 
   */
  onToggleSearch( e ) {
    e.stopPropagation();
    var $form = $(e.currentTarget).closest( '.search-wrapper' );
    $form.toggleClass( 'search-wrapper--active' );

    if( $form.hasClass( 'search-wrapper--active' ) ) {
      setTimeout( () => { $form.find( 'input' ).focus(); }, 100);
    }
  },

  /**
   *  
   */
  toggleOffcanvas( e ) {
    e.preventDefault();
    e.stopPropagation();
    $( 'body' ).toggleClass( 'has-active-offcanvas' );
  },

  /**
   * Close offcanvas when clicking outside it 
   */
  closeOffCanvas( e ) {
    $( 'body' ).removeClass( 'has-active-offcanvas' );
  },


  /**
   * Toggle dropdown menu in offcanvas 
   */
  toggleMobileChildren( e ) {
    e.preventDefault();

    $( e.currentTarget ).closest( '.menu-item' ).toggleClass( 'menu-item--toggled' );
  },
}


/**
 * Handle Jetpack modules
 */
var myJetpack = {
  init() {
    this.sharingMoreButton();
  },

  /**
   * Move the hidden sharing buttons to main list when MORE is clicked
   */
  sharingMoreButton() {
    if( document.querySelector('.sharedaddy') == null ) { return; }

    let $moreButtons = document.querySelectorAll( '.share-more' );
    for( let $mb of $moreButtons ) {
      $mb.addEventListener( 'click', (e) => {
        e.preventDefault();
        let $shareButtons = e.currentTarget.closest('ul');
        let $shareWrapper = e.currentTarget.closest('.sd-content');

        // remove More button
        e.currentTarget.closest('li').removeChild( e.currentTarget );

        // get hidden links and append it to main list
        let $shareHidden = $shareWrapper.querySelector( '.sharing-hidden' )
        for( let $button of $shareHidden.querySelectorAll('ul li') ) {
          $shareButtons.appendChild( $button );
        }

        // remove hidden share
        $shareHidden.parentElement.removeChild( $shareHidden );
      } );
    }
  }
};

// Browser compatibility, leave this untouched
if('registerElement' in document) { document.createElement( 'h-grid' ); document.createElement( 'h-tile' ); }

// Smooth scroll jQuery
$.fn.extend({
  smoothScroll: function( offset ) {
    var $target = $(this);
    offset = offset || 0;

    $('html, body').animate({
      scrollTop: $target.offset().top + offset
    }, 500 );
  }
});

})( jQuery );

