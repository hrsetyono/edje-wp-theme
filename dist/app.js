!function(e){var t={};function n(o){if(t[o])return t[o].exports;var r=t[o]={i:o,l:!1,exports:{}};return e[o].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(o,r,function(t){return e[t]}.bind(null,r));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=4)}({4:function(e,t,n){"use strict";n.r(t);n(5);const o={init(){}},r={init(){this.stickyRow();[...document.querySelectorAll('[href="#menu"]')].forEach(e=>{e.addEventListener("click",this.toggleOffcanvas)}),document.addEventListener("click",this.closeOffcanvas);const e=document.querySelector(".offcanvas");e&&e.addEventListener("click",this.preventClose)},stickyRow(){if(!CSS.supports||!CSS.supports("position","sticky"))return;const e=[].slice.call(document.querySelectorAll(".header"));e.forEach(this.checkStickyState),window.addEventListener("scroll",()=>{e.forEach(this.checkStickyState)})},toggleOffcanvas(e){e.preventDefault(),e.stopPropagation(),document.querySelector("body").classList.toggle("has-active-offcanvas")},closeOffcanvas(){document.querySelector("body").classList.remove("has-active-offcanvas")},preventClose(e){e.stopPropagation()},checkStickyState(e){e.getBoundingClientRect().top<=parseInt(getComputedStyle(e).top.replace("px",""),10)?e.classList.add("is-stuck"):e.classList.remove("is-stuck")}};document.addEventListener("DOMContentLoaded",(function(){o.init(),r.init()})),window.addEventListener("load",(function(){}))},5:function(e,t,n){}});