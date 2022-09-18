/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************************!*\
  !*** ./resources/js/pages/form-repeater.int.js ***!
  \*************************************************/
$(document).ready(function () {
  "use strict";

  $(".repeater").repeater({
    defaultValues: {
      "textarea-input": "foo",
      "text-input": "bar",
      "select-input": "B",
      "checkbox-input": ["A", "B"],
      "radio-input": "B"
    },
    show: function show() {
      $(this).slideDown();
    },
    hide: function hide(e) {
      confirm("Are you sure you want to delete this element?") && $(this).slideUp(e);
    },
    ready: function ready(e) {}
  }), window.outerRepeater = $(".outer-repeater").repeater({
    defaultValues: {
      "text-input": "outer-default"
    },
    show: function show() {
      console.log("outer show"), $(this).slideDown();
    },
    hide: function hide(e) {
      console.log("outer delete"), $(this).slideUp(e);
    },
    repeaters: [{
      selector: ".inner-repeater",
      defaultValues: {
        "inner-text-input": "inner-default"
      },
      show: function show() {
        console.log("inner show"), $(this).slideDown();
      },
      hide: function hide(e) {
        console.log("inner delete"), $(this).slideUp(e);
      }
    }]
  });
});
/******/ })()
;