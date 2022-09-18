/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************************!*\
  !*** ./resources/js/pages/table-editable.int.js ***!
  \**************************************************/
$(function () {
  var e = {};
  $(".table-edits tr").editable({
    dropdowns: {
      gender: ["Male", "Female"]
    },
    edit: function edit(t) {
      $(".edit i", this).removeClass("fa-pencil-alt").addClass("fa-save").attr("title", "Save");
    },
    save: function save(t) {
      $(".edit i", this).removeClass("fa-save").addClass("fa-pencil-alt").attr("title", "Edit"), this in e && (e[this].destroy(), delete e[this]);
    },
    cancel: function cancel(t) {
      $(".edit i", this).removeClass("fa-save").addClass("fa-pencil-alt").attr("title", "Edit"), this in e && (e[this].destroy(), delete e[this]);
    }
  });
});
/******/ })()
;