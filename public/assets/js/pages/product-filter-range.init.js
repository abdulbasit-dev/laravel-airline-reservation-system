/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************************!*\
  !*** ./resources/js/pages/product-filter-range.init.js ***!
  \*********************************************************/
$(document).ready(function () {
  $("#pricerange").ionRangeSlider({
    skin: "square",
    type: "double",
    grid: !0,
    min: 0,
    max: 1e3,
    from: 200,
    to: 800,
    prefix: "$"
  });
});
/******/ })()
;