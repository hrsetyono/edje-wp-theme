/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./assets/js/app.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("(function( $ ) { 'use strict';\r\n\r\ndocument.addEventListener( 'DOMContentLoaded', onReady );\r\nwindow.addEventListener( 'load', onLoad );\r\n\r\nfunction onReady() {\r\n  myApp.init();\r\n  myHeader.init();\r\n  myJetpack.init();\r\n}\r\n\r\nfunction onLoad() {\r\n  // script that runs when everything is loaded\r\n}\r\n\r\n\r\n///// GENERAL LISTENERS\r\n\r\nvar myApp = {\r\n  init() {\r\n    this.backToTop();\r\n    this.gallerySlider();\r\n    this.galleryLightbox();\r\n  },\r\n\r\n  backToTop() {\r\n    $( '[data-back-to-top]' ).on( 'click', ( e ) => {\r\n      $( '#main-container' ).smoothScroll();\r\n    } );\r\n  },\r\n\r\n  /**\r\n   * Setup Gallery Block with \"Slider\" style\r\n   * \r\n   * Read more https://github.com/hrsetyono/hSlider\r\n   */\r\n  gallerySlider() {\r\n    let $targets = $('.wp-block-gallery.is-style-h-slider .blocks-gallery-grid');\r\n\r\n    $targets.each( function() {\r\n      let $t = $(this);\r\n      let perSlide = $t.closest('.wp-block-gallery').attr('class').match( /columns-(\\d+)/ );\r\n\r\n      hSlider( $t.get(0), {\r\n        index: 0,\r\n        arrows: true,\r\n        dots: true,\r\n        itemsPerSlide: perSlide[1],\r\n        responsive: { 767: 2, 480: 1 }\r\n      });\r\n    });\r\n  },\r\n\r\n\r\n  /**\r\n   * Setup Gallery or Image block that has link to an image\r\n   * \r\n   * Read more at https://github.com/hrsetyono/hLightbox\r\n   */\r\n  galleryLightbox() {\r\n    let $targets = document.querySelectorAll('.wp-block-gallery a, .wp-block-image a');\r\n\r\n    for( let $t of $targets ) {\r\n      let href = $t.getAttribute( 'href' );\r\n      if( href.match(/^(?:http(s)?:\\/\\/)?[\\w.-]+(?:\\.[\\w\\.-]+)+[\\w\\-\\._~:/?#[\\]@!\\$&'\\(\\)\\*\\+,;=.]+(?:png|jpg|jpeg|gif|svg)/) ) {\r\n        hLightbox( $t, { closeButton: true } );\r\n      }\r\n    }\r\n  }\r\n};\r\n\r\n\r\n///// HEADER\r\n\r\nvar myHeader = {\r\n  init() {\r\n    $( document ).on( 'click', this.closeOffcanvas );\r\n\r\n    // Sticky\r\n    this.stickyRow();\r\n\r\n    $( '[href=\"#menu\"]' ).on( 'click', this.toggleOffcanvas );\r\n    $( '.offcanvas .menu-item-has-children' ).on( 'click', this.toggleMobileChildren );\r\n\r\n    $( '[data-mobile-dropdown-toggle]' ).on( 'click', this.toggleMobileDropdown );\r\n  },\r\n\r\n  /**\r\n   *  \r\n   */\r\n  stickyRow() {\r\n    var target = '.header--mid-row';\r\n    var classToToggle = 'header--stuck';\r\n\r\n    if( !( CSS.supports && CSS.supports( 'position', 'sticky' ) ) ) { return; }\r\n\r\n    var $elems = [].slice.call( document.querySelectorAll( target ) );\r\n\r\n    // Initial check if already sticky\r\n    $elems.forEach( _checkStickyState );\r\n\r\n    window.addEventListener( 'scroll', (e) => {\r\n      $elems.forEach( _checkStickyState );\r\n    } );\r\n\r\n    //\r\n    function _checkStickyState( $elem ) {\r\n      var currentOffset = $elem.getBoundingClientRect().top;\r\n      var stickyOffset = parseInt( getComputedStyle( $elem ).top.replace( 'px','' ) );\r\n      var isStuck = currentOffset <= stickyOffset;\r\n    \r\n      if( isStuck ) {\r\n        $elem.classList.add( classToToggle );\r\n      } else {\r\n        $elem.classList.remove( classToToggle );\r\n      }\r\n    }\r\n  },\r\n\r\n  /**\r\n   * \r\n   */\r\n  onToggleSearch( e ) {\r\n    e.stopPropagation();\r\n    var $form = $(e.currentTarget).closest( '.search-wrapper' );\r\n    $form.toggleClass( 'search-wrapper--active' );\r\n\r\n    if( $form.hasClass( 'search-wrapper--active' ) ) {\r\n      setTimeout( () => { $form.find( 'input' ).focus(); }, 100);\r\n    }\r\n  },\r\n\r\n  /**\r\n   *  \r\n   */\r\n  toggleOffcanvas( e ) {\r\n    e.preventDefault();\r\n    e.stopPropagation();\r\n    $( 'body' ).toggleClass( 'has-active-offcanvas' );\r\n  },\r\n\r\n  /**\r\n   * Close offcanvas when clicking outside it \r\n   */\r\n  closeOffCanvas( e ) {\r\n    $( 'body' ).removeClass( 'has-active-offcanvas' );\r\n  },\r\n\r\n\r\n  /**\r\n   * Toggle dropdown menu in offcanvas \r\n   */\r\n  toggleMobileChildren( e ) {\r\n    e.preventDefault();\r\n\r\n    $( e.currentTarget ).closest( '.menu-item' ).toggleClass( 'menu-item--toggled' );\r\n  },\r\n}\r\n\r\n\r\n/**\r\n * Handle Jetpack modules\r\n */\r\nvar myJetpack = {\r\n  init() {\r\n    this.sharingMoreButton();\r\n  },\r\n\r\n  /**\r\n   * Move the hidden sharing buttons to main list when MORE is clicked\r\n   */\r\n  sharingMoreButton() {\r\n    if( document.querySelector('.sharedaddy') == null ) { return; }\r\n\r\n    let $moreButtons = document.querySelectorAll( '.share-more' );\r\n    for( let $mb of $moreButtons ) {\r\n      $mb.addEventListener( 'click', (e) => {\r\n        e.preventDefault();\r\n        let $shareButtons = e.currentTarget.closest('ul');\r\n        let $shareWrapper = e.currentTarget.closest('.sd-content');\r\n\r\n        // remove More button\r\n        e.currentTarget.closest('li').removeChild( e.currentTarget );\r\n\r\n        // get hidden links and append it to main list\r\n        let $shareHidden = $shareWrapper.querySelector( '.sharing-hidden' )\r\n        for( let $button of $shareHidden.querySelectorAll('ul li') ) {\r\n          $shareButtons.appendChild( $button );\r\n        }\r\n\r\n        // remove hidden share\r\n        $shareHidden.parentElement.removeChild( $shareHidden );\r\n      } );\r\n    }\r\n  }\r\n};\r\n\r\n// Browser compatibility, leave this untouched\r\nif('registerElement' in document) { document.createElement( 'h-grid' ); document.createElement( 'h-tile' ); }\r\n\r\n// Smooth scroll jQuery\r\n$.fn.extend({\r\n  smoothScroll: function( offset ) {\r\n    var $target = $(this);\r\n    offset = offset || 0;\r\n\r\n    $('html, body').animate({\r\n      scrollTop: $target.offset().top + offset\r\n    }, 500 );\r\n  }\r\n});\r\n\r\n})( jQuery );\r\n\r\n\n\n//# sourceURL=webpack:///./assets/js/app.js?");

/***/ })

/******/ });