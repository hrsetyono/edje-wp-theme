!function(e){var t={};function n(c){if(t[c])return t[c].exports;var o=t[c]={i:c,l:!1,exports:{}};return e[c].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,c){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:c})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var c=Object.create(null);if(n.r(c),Object.defineProperty(c,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(c,o,function(t){return e[t]}.bind(null,o));return c},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=4)}({4:function(e,t,n){"use strict";n.r(t);n(5);const c={init(){}},o={init(){this.stickyRow(),this.toggleOffcanvas(),this.closeOffcanvas(),this.preventCloseOffcanvas(),this.megaMenuOffcanvas(),this.submenuDepth2Offcanvas()},stickyRow(){if(!CSS.supports||!CSS.supports("position","sticky"))return;const e=[].slice.call(document.querySelectorAll(".header"));e.forEach(this.checkStickyState),window.addEventListener("scroll",()=>{e.forEach(this.checkStickyState)})},toggleOffcanvas(){document.querySelectorAll('[href="#menu"]').forEach(e=>{e.addEventListener("click",e=>{e.preventDefault(),e.stopPropagation(),document.querySelector("body").classList.toggle("has-active-offcanvas")})})},closeOffcanvas(){document.addEventListener("click",()=>{document.querySelector("body").classList.remove("has-active-offcanvas")})},preventCloseOffcanvas(){const e=document.querySelector(".offcanvas");e&&e.addEventListener("click",e=>{e.stopPropagation()})},megaMenuOffcanvas(){document.querySelectorAll(".offcanvas .mega-menu.menu-item-has-children a").forEach(e=>{e.addEventListener("click",e=>{e.preventDefault();e.currentTarget.closest(".mega-menu").classList.toggle("mega-menu-is-active")})})},submenuDepth2Offcanvas(){document.querySelectorAll(".offcanvas .menu-item:not(.mega-menu) .submenu-item.menu-item-has-children > a").forEach(e=>{e.addEventListener("click",e=>{e.preventDefault();e.currentTarget.closest(".submenu-item").classList.toggle("submenu-item-is-active")})})},checkStickyState(e){e.getBoundingClientRect().top<=parseInt(getComputedStyle(e).top.replace("px",""),10)?e.classList.add("is-stuck"):e.classList.remove("is-stuck")}};document.addEventListener("DOMContentLoaded",(function(){c.init(),o.init()})),window.addEventListener("load",(function(){}))},5:function(e,t,n){}});