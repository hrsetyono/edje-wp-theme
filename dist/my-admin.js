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
/******/ 	return __webpack_require__(__webpack_require__.s = "./assets/js/my-admin.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/css/my-admin.sass":
/*!**********************************!*\
  !*** ./assets/css/my-admin.sass ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack:///./assets/css/my-admin.sass?");

/***/ }),

/***/ "./assets/js/my-admin.js":
/*!*******************************!*\
  !*** ./assets/js/my-admin.js ***!
  \*******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _css_my_admin_sass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../css/my-admin.sass */ \"./assets/css/my-admin.sass\");\n/* harmony import */ var _css_my_admin_sass__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_css_my_admin_sass__WEBPACK_IMPORTED_MODULE_0__);\n\r\n\r\nconst myMenu = {\r\n  init() {\r\n    if (!window.wpNavMenu) { return; }\r\n\r\n    this.megaMenuListener();\r\n\r\n    // limit nav menu depth to 3rd level\r\n    window.wpNavMenu.options.globalMaxDepth = 2;\r\n  },\r\n\r\n  /**\r\n   * Add class to several items when mega menu is activated on the parent\r\n   */\r\n  megaMenuListener() {\r\n    const $toggles = document.querySelectorAll('.acf-field[data-name=\"mega_menu\"] input[type=\"radio\"]');\r\n\r\n    // add listener\r\n    $toggles.forEach(($t) => {\r\n      $t.addEventListener('click', (e) => {\r\n        const $wrapper = e.currentTarget.closest('.menu-item');\r\n\r\n        // need timeout to wait for ACF listener\r\n        setTimeout(() => {\r\n          this.megaMenuAddClasses($wrapper);\r\n        });\r\n      });\r\n    });\r\n\r\n    // activate mega menu classes on load\r\n    const $parentItems = document.querySelectorAll('.menu-item.menu-item-depth-0');\r\n    $parentItems.forEach(($i) => {\r\n      this.megaMenuAddClasses($i);\r\n    });\r\n  },\r\n\r\n  /**\r\n   * Check whether current item and all its children need mega menu classes\r\n   *\r\n   * @param $item - `.menu-item` DOM object in the Appearance > Menu page.\r\n   */\r\n  megaMenuAddClasses($item) {\r\n    const $checkedOption = $item.querySelector('[data-name=\"mega_menu\"] input[type=\"radio\"]:checked');\r\n    const $children = [];\r\n\r\n    let $currentItem = $item;\r\n\r\n    // loop to get all children\r\n    while (true) {\r\n      const $nextItem = $currentItem.nextElementSibling;\r\n\r\n      // Abort if no more next element\r\n      if (!$nextItem) { break; }\r\n\r\n      const isChildItem = $nextItem.classList.contains('menu-item-depth-1') || $nextItem.classList.contains('menu-item-depth-2');\r\n\r\n      if (isChildItem) {\r\n        $children.push($nextItem);\r\n      } else {\r\n        break; // abort if no more child item\r\n      }\r\n\r\n      $currentItem = $nextItem;\r\n    }\r\n\r\n    // if have checked option, add mega menu classes\r\n    if ($checkedOption) {\r\n      $item.classList.add('menu-item-is-mega-menu');\r\n\r\n      $children.forEach(($c) => {\r\n        $c.classList.add('menu-item-under-mega-menu');\r\n      });\r\n    } else { // if unchecked, remove mega menu classes\r\n      $item.classList.remove('menu-item-is-mega-menu');\r\n\r\n      $children.forEach(($c) => {\r\n        $c.classList.remove('menu-item-under-mega-menu');\r\n      });\r\n    }\r\n  },\r\n};\r\n\r\nfunction onReady() {\r\n  myMenu.init();\r\n}\r\n\r\nfunction onLoad() {\r\n  // script that runs when everything is loaded\r\n}\r\n\r\ndocument.addEventListener('DOMContentLoaded', onReady);\r\nwindow.addEventListener('load', onLoad);\r\n\n\n//# sourceURL=webpack:///./assets/js/my-admin.js?");

/***/ })

/******/ });