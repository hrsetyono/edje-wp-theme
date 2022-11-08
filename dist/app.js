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
/******/ 	return __webpack_require__(__webpack_require__.s = "./js/app.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./css/app.sass":
/*!**********************!*\
  !*** ./css/app.sass ***!
  \**********************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack:///./css/app.sass?");

/***/ }),

/***/ "./js/_dark-mode.js":
/*!**************************!*\
  !*** ./js/_dark-mode.js ***!
  \**************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/**\r\n * DARK TOGGLE Widget\r\n */\r\n/* harmony default export */ __webpack_exports__[\"default\"] = ({\r\n  init() {\r\n    this.clickListener();\r\n    this.tabindexListener();\r\n  },\r\n\r\n  /**\r\n   * Click listener for dark mode toggle\r\n   */\r\n  clickListener() {\r\n    const $darkToggles = document.querySelectorAll('.h-dark-toggle input[type=\"checkbox\"]');\r\n    if ($darkToggles.length <= 0) { return; }\r\n\r\n    $darkToggles.forEach(($t) => {\r\n      $t.addEventListener('change', (e) => {\r\n        this.toggle(e.currentTarget.checked);\r\n      });\r\n    });\r\n  },\r\n\r\n  /**\r\n   * Keyboard listener for dark mode toggle\r\n   */\r\n  tabindexListener() {\r\n    const $darkSwitches = document.querySelectorAll('.h-dark-toggle__switch');\r\n\r\n    $darkSwitches.forEach(($s) => {\r\n      $s.addEventListener('keyup', (e) => {\r\n        if (e.key === 'Enter' || e.keyCode === 13) {\r\n          const $checkbox = e.currentTarget.closest('.h-dark-toggle').querySelector('input[type=\"checkbox\"]');\r\n          $checkbox.checked = !$checkbox.checked;\r\n          this.toggle($checkbox.checked);\r\n        }\r\n      });\r\n    });\r\n  },\r\n\r\n  /**\r\n   * Toggle the body class and cache the variable\r\n   */\r\n  toggle(isChecked) {\r\n    document.querySelector('body').classList.toggle('h-is-dark', isChecked);\r\n\r\n    // the checker for this is outputed into wp_body_open() by Edje WP Library\r\n    localStorage.setItem('hDarkMode', isChecked);\r\n  },\r\n});\r\n\n\n//# sourceURL=webpack:///./js/_dark-mode.js?");

/***/ }),

/***/ "./js/_mega-menu.js":
/*!**************************!*\
  !*** ./js/_mega-menu.js ***!
  \**************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony default export */ __webpack_exports__[\"default\"] = ({\r\n  init() {\r\n    this.offcanvasMegaMenu();\r\n  },\r\n\r\n  /**\r\n   * Toggle listener for mega menu in offcanvas\r\n   */\r\n  offcanvasMegaMenu() {\r\n    const $itemLinks = document.querySelectorAll('.offcanvas .menu-item-has-mega-menu > a');\r\n    $itemLinks.forEach(($link) => {\r\n      $link.addEventListener('click', (e) => {\r\n        e.preventDefault();\r\n\r\n        const $wrapper = e.currentTarget.closest('.menu-item');\r\n        $wrapper.classList.toggle('is-open');\r\n      });\r\n    });\r\n  },\r\n});\r\n\n\n//# sourceURL=webpack:///./js/_mega-menu.js?");

/***/ }),

/***/ "./js/app.js":
/*!*******************!*\
  !*** ./js/app.js ***!
  \*******************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _dark_mode__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_dark-mode */ \"./js/_dark-mode.js\");\n/* harmony import */ var _mega_menu__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./_mega-menu */ \"./js/_mega-menu.js\");\n/* harmony import */ var _css_app_sass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../css/app.sass */ \"./css/app.sass\");\n/* harmony import */ var _css_app_sass__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_css_app_sass__WEBPACK_IMPORTED_MODULE_2__);\n\r\n\r\n// import myAnimation from './_animation';\r\n\r\n\r\n// GENERAL LISTENERS\r\nconst myApp = {\r\n  init() {\r\n    // do something\r\n  },\r\n};\r\n\r\n// HEADER\r\nconst myHeader = {\r\n  init() {\r\n    this.stickyRow();\r\n\r\n    this.toggleOffcanvas();\r\n    this.closeOffcanvas();\r\n    this.preventCloseOffcanvas();\r\n\r\n    this.offcanvasDepth2();\r\n    this.footerDepth1();\r\n  },\r\n\r\n  /**\r\n   *  Add extra class to Sticky header when it's on sticky state\r\n   */\r\n  stickyRow() {\r\n    if (!(CSS.supports && CSS.supports('position', 'sticky'))) { return; }\r\n\r\n    const target = '.header, .header-mobile';\r\n    const $elems = [].slice.call(document.querySelectorAll(target));\r\n\r\n    // Initial check if already sticky\r\n    $elems.forEach(this.checkStickyState);\r\n\r\n    window.addEventListener('scroll', () => {\r\n      $elems.forEach(this.checkStickyState);\r\n    });\r\n  },\r\n\r\n  /**\r\n   * Open or close the offcanvas menu\r\n   */\r\n  toggleOffcanvas() {\r\n    const $menuLinks = document.querySelectorAll('[href=\"#menu\"]');\r\n    $menuLinks.forEach(($link) => {\r\n      $link.addEventListener('click', (e) => {\r\n        e.preventDefault();\r\n        e.stopPropagation();\r\n        document.querySelector('body').classList.toggle('has-active-offcanvas');\r\n      });\r\n    });\r\n  },\r\n\r\n  /**\r\n   * Close offcanvas when clicking outside it\r\n   */\r\n  closeOffcanvas() {\r\n    document.addEventListener('click', () => {\r\n      document.querySelector('body').classList.remove('has-active-offcanvas');\r\n    });\r\n  },\r\n\r\n  preventCloseOffcanvas() {\r\n    const $offcanvas = document.querySelector('.offcanvas');\r\n\r\n    if ($offcanvas) {\r\n      $offcanvas.addEventListener('click', (e) => {\r\n        e.stopPropagation();\r\n      });\r\n    }\r\n  },\r\n\r\n  /**\r\n   * Toggle listener for 2nd level submenu\r\n   */\r\n  offcanvasDepth2() {\r\n    const $itemLinks = document.querySelectorAll('.offcanvas .submenu-item.menu-item-has-children > a');\r\n    $itemLinks.forEach(($link) => {\r\n      $link.addEventListener('click', (e) => {\r\n        e.preventDefault();\r\n\r\n        const $wrapper = e.currentTarget.closest('.submenu-item');\r\n        $wrapper.classList.toggle('is-open');\r\n      });\r\n    });\r\n  },\r\n\r\n  footerDepth1() {\r\n    const $itemLinks = document.querySelectorAll('.footer-widgets .menu-item-has-children > a');\r\n    $itemLinks.forEach(($link) => {\r\n      $link.addEventListener('click', (e) => {\r\n        e.preventDefault();\r\n        if (window.width > 480) { return; }\r\n\r\n        const $wrapper = e.currentTarget.closest('.menu-item');\r\n        $wrapper.classList.toggle('is-open');\r\n      });\r\n    });\r\n  },\r\n\r\n  /**\r\n   * Check if an element is in Sticky state or not\r\n   * @param {*} $elem\r\n   */\r\n  checkStickyState($elem) {\r\n    const currentOffset = $elem.getBoundingClientRect().top;\r\n    const stickyOffset = parseInt(getComputedStyle($elem).top.replace('px', ''), 10);\r\n    const isStuck = currentOffset <= stickyOffset;\r\n\r\n    if (isStuck) {\r\n      $elem.classList.add('is-stuck');\r\n    } else {\r\n      $elem.classList.remove('is-stuck');\r\n    }\r\n  },\r\n};\r\n\r\nfunction onReady() {\r\n  myApp.init();\r\n  myHeader.init();\r\n  _mega_menu__WEBPACK_IMPORTED_MODULE_1__[\"default\"].init();\r\n  _dark_mode__WEBPACK_IMPORTED_MODULE_0__[\"default\"].init();\r\n  // myAnimation.init();\r\n}\r\n\r\nfunction onLoad() {\r\n  // script that runs when everything is loaded\r\n}\r\n\r\ndocument.addEventListener('DOMContentLoaded', onReady);\r\nwindow.addEventListener('load', onLoad);\r\n\n\n//# sourceURL=webpack:///./js/app.js?");

/***/ })

/******/ });