/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************!*\
  !*** ./resources/js/js.js ***!
  \****************************/
// displayImg
window.displayImg = function (event) {
  var image = document.getElementById('output');
  image.src = URL.createObjectURL(event.target.files[0]);
};
/******/ })()
;