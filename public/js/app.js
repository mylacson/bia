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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  $('.small-box').on('click', function () {
    var urlStart = $(this).attr('urlStart'),
        name = $(this).find('h3.name').text(),
        timeStart = $(this).find('.inner p').attr('time-start');

    if ($(this).hasClass("bg-yellow")) {
      $.confirm({
        title: 'Xác nhận',
        content: 'Bắt đầu tính giờ?',
        buttons: {
          OK: function OK() {
            window.location.href = urlStart;
          },
          Thoát: function ThoT() {}
        }
      });
    } else if ('bg-aqua') {
      $.confirm({
        title: name,
        closeIcon: true,
        boxWidth: '30%',
        useBootstrap: false,
        onOpen: function onOpen() {
          var id = $('#countup'); // Month Day, Year Hour:Minute:Second, id-of-element-container

          countUpFromTime(timeStart, id); // ****** Change this line!
        },
        content: '<div class="form-group">' + '<p id="countup">Đang chơi: ' + '<span class="timeel hours">00</span>\n' + '<span class="timeel timeRefHours">Giờ</span>\n' + '<span class="timeel minutes">00</span>\n' + '<span class="timeel timeRefMinutes">Phút</span>\n' + // '<span class="timeel seconds">00</span>\n' +
        // '<span class="timeel timeRefSeconds">seconds</span></p>'+
        '</div>',
        buttons: {
          'Gọi Thêm': function GIThM() {
            $.dialog({
              title: 'Asynchronous content',
              content: 'url:http://localhost/bida/public/',
              animation: 'scale',
              columnClass: 'medium',
              closeAnimation: 'scale',
              backgroundDismiss: true
            });
          },
          'Tính Tiền': function TNhTiN() {
            alert(2);
          },
          'Chuyển bàn': function ChuyNBN() {
            alert(3);
          },
          Thoát: function ThoT() {
            alert(3);
          }
        }
      });
    }
  });

  function countUpFromTime(countFrom, elment) {
    countFrom = new Date(countFrom).getTime();
    var now = new Date(),
        countFrom = new Date(countFrom),
        timeDifference = now - countFrom;
    var secondsInADay = 60 * 60 * 1000 * 24,
        secondsInAHour = 60 * 60 * 1000;
    days = Math.floor(timeDifference / secondsInADay * 1);
    hours = Math.floor(timeDifference % secondsInADay / secondsInAHour * 1);
    mins = Math.floor(timeDifference % secondsInADay % secondsInAHour / (60 * 1000) * 1);
    secs = Math.floor(timeDifference % secondsInADay % secondsInAHour % (60 * 1000) / 1000 * 1);
    elment.find('.hours').text(days * 24 + hours);
    elment.find('.minutes').text(mins); // elment.find('.seconds').text(secs);

    clearTimeout(countUpFromTime.interval);
    countUpFromTime.interval = setTimeout(function () {
      countUpFromTime(countFrom, elment);
    }, 1000);
  }
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! D:\xampp\htdocs\bida\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! D:\xampp\htdocs\bida\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });