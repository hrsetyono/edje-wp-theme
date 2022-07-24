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
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _sass_app_sass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../sass/app.sass */ \"./assets/sass/app.sass\");\n/* harmony import */ var _sass_app_sass__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_sass_app_sass__WEBPACK_IMPORTED_MODULE_0__);\n\r\n\r\n// GENERAL LISTENERS\r\nconst myApp = {\r\n  init() {\r\n    // do something\r\n  },\r\n};\r\n\r\n// HEADER\r\nconst myHeader = {\r\n  init() {\r\n    this.stickyRow();\r\n\r\n    // toggle offcanvas menu\r\n    const $menuLinks = document.querySelectorAll('[href=\"#menu\"]');\r\n    [...$menuLinks].forEach(($link) => {\r\n      $link.addEventListener('click', this.toggleOffcanvas);\r\n    });\r\n\r\n    // close off canvas\r\n    document.addEventListener('click', this.closeOffcanvas);\r\n    const $offcanvas = document.querySelector('.offcanvas');\r\n    if ($offcanvas) {\r\n      $offcanvas.addEventListener('click', this.preventClose);\r\n    }\r\n  },\r\n\r\n  /**\r\n   *  Add extra class to Sticky header when it's on sticky state\r\n   */\r\n  stickyRow() {\r\n    if (!(CSS.supports && CSS.supports('position', 'sticky'))) { return; }\r\n\r\n    const target = '.header';\r\n    const $elems = [].slice.call(document.querySelectorAll(target));\r\n\r\n    // Initial check if already sticky\r\n    $elems.forEach(this.checkStickyState);\r\n\r\n    window.addEventListener('scroll', () => {\r\n      $elems.forEach(this.checkStickyState);\r\n    });\r\n  },\r\n\r\n  /**\r\n   * Open or close the offcanvas menu\r\n   */\r\n  toggleOffcanvas(e) {\r\n    e.preventDefault();\r\n    e.stopPropagation();\r\n    document.querySelector('body').classList.toggle('has-active-offcanvas');\r\n  },\r\n\r\n  /**\r\n   * Close offcanvas when clicking outside it\r\n   */\r\n  closeOffcanvas() {\r\n    document.querySelector('body').classList.remove('has-active-offcanvas');\r\n  },\r\n\r\n  preventClose(e) {\r\n    e.stopPropagation();\r\n  },\r\n\r\n  /**\r\n   * Check if an element is in Sticky state or not\r\n   * @param {*} $elem\r\n   */\r\n  checkStickyState($elem) {\r\n    const currentOffset = $elem.getBoundingClientRect().top;\r\n    const stickyOffset = parseInt(getComputedStyle($elem).top.replace('px', ''), 10);\r\n    const isStuck = currentOffset <= stickyOffset;\r\n\r\n    if (isStuck) {\r\n      $elem.classList.add('is-stuck');\r\n    } else {\r\n      $elem.classList.remove('is-stuck');\r\n    }\r\n  },\r\n};\r\n\r\nfunction onReady() {\r\n  myApp.init();\r\n  myHeader.init();\r\n}\r\n\r\nfunction onLoad() {\r\n  // script that runs when everything is loaded\r\n}\r\n\r\ndocument.addEventListener('DOMContentLoaded', onReady);\r\nwindow.addEventListener('load', onLoad);\r\n\n\n//# sourceURL=webpack:///./assets/js/app.js?");

/***/ }),

/***/ "./assets/sass/app.sass":
/*!******************************!*\
  !*** ./assets/sass/app.sass ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack:///./assets/sass/app.sass?");

/***/ })

/******/ });