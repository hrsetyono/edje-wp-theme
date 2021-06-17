import '../sass/app.sass';

(function() { 'use strict';

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
  },

};


///// HEADER

var myHeader = {
  init() {
    this.stickyRow();

    document.addEventListener( 'click', this.closeOffcanvas );

    let $offcanvas = document.querySelector( '.offcanvas' );
    $offcanvas && $offcanvas.addEventListener( 'click', this.preventClose );

    // toggle offcanvas menu
    let $menuLinks = document.querySelectorAll( '[href="#menu"]' );
    for( let $l of $menuLinks ) {
      $l.addEventListener( 'click', this.toggleOffcanvas );
    }
  },

  /**
   *  Add extra class to Sticky header when it's on sticky state
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
  toggleOffcanvas( e ) {
    e.preventDefault();
    e.stopPropagation();
    document.querySelector( 'body' ).classList.toggle( 'has-active-offcanvas' );
  },

  /**
   * Close offcanvas when clicking outside it 
   */
  closeOffcanvas( e ) {
    document.querySelector( 'body' ).classList.remove( 'has-active-offcanvas' );
  },
  
  preventClose( e ) {
    e.stopPropagation();
  }
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

})();

