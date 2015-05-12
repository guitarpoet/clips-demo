(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } };

var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ('value' in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();

Object.defineProperty(exports, '__esModule', {
    value: true
});

var _inArrIndex = require('./helper/common');

var Spy = (function () {
    function Spy(sel, options) {
        _classCallCheck(this, Spy);

        this.refresh = true;
        this.arr = [];
        this.arrIndex = 0;
        this.sel = sel;
        this.options = options;
        this.$window = $(window);
        this.$menuitems = $(options.menuitemSel);
        this.enable();
        this.checkScroll();
        this.bind();
    }

    _createClass(Spy, [{
        key: 'bind',
        value: function bind() {
            var self = this;
            self.$window.load(function () {
                $(self.sel).on('stickup.over', function () {
                    self.initArr();
                });

                $(self.sel).on('stickup.leave', function () {
                    self.disable();
                });
            });
        }
    }, {
        key: 'initArr',
        value: function initArr() {
            var first = arguments[0] === undefined ? false : arguments[0];

            var self = this;
            var $menu = $(self.sel);
            self.arr = [];
            self.$menuitems.each(function () {
                var $item = $(this);
                var content = $item.data('spyHref');
                var $con = $('[spy-check-area=' + content + ']');

                var firsttop = 0;

                if ($menu.attr('mobile') == 'true') {
                    firsttop = Math.ceil($con.offset().top - $menu.outerHeight() - $menu.cssNumber('top'));
                } else {
                    firsttop = Math.ceil($con.offset().top - $menu.cssNumber('top'));
                }
                self.arr.push(firsttop);
                self.arr.push(firsttop + $con.height());
            });
            return Promise.resolve();
        }
    }, {
        key: 'checkScrollTopInSomeArea',
        value: function checkScrollTopInSomeArea(v) {
            var self = this;
            return _inArrIndex.inArrIndex(self.arr, v).then(function (args) {
                var pusharr = args[0];
                var index = args[1];
                if (index % 2 == 1 && index < self.arr.length + 1) {
                    return Promise.resolve((index - 1) / 2);
                } else {
                    return Promise.resolve(false);
                }
            });
        }
    }, {
        key: 'checkScroll',
        value: function checkScroll() {
            var self = this;
            self.$window.on('scroll', function () {
                var windowScrollTop = self.$window.scrollTop();
                self.applyActive(windowScrollTop);
            });
        }
    }, {
        key: 'applyActive',
        value: function applyActive(scrolltop) {
            var first = arguments[1] === undefined ? false : arguments[1];

            var self = this;
            if (!first) {
                self.checkScrollTopInSomeArea(scrolltop).then(function (val) {
                    if ($.isNumeric(val)) {
                        self.refresh = val;
                        self.arrIndex = val;
                        $('[data-spy-href]').removeClass('active');
                        $('[data-spy-href="' + (val + 1) + '"]').addClass('active');
                    }
                });
            } else {
                _inArrIndex.inArrIndex(self.arr, scrolltop).then(function (args) {
                    var pusharr = args[0];
                    var index = args[1];
                    if (index < self.arr.length + 1) {
                        $('[data-spy-href]').removeClass('active');
                        $('[data-spy-href="' + Math.ceil(index / 2) + '"]').addClass('active');
                    }
                });
            }
        }
    }, {
        key: 'enable',
        value: function enable() {
            var self = this;
            if ($(self.sel).attr('class')) {
                self.initArr(true).then(function () {
                    self.applyActive(self.$window.scrollTop(), self.refresh);
                });
                if (self.refresh) {
                    self.refresh = false;
                }
            }
        }
    }, {
        key: 'disable',
        value: function disable() {
            var self = this;
            self.refresh = true;
            self.$menuitems.removeClass('active');
        }
    }]);

    return Spy;
})();

exports.Spy = Spy;

window.Spy = Spy;

},{"./helper/common":2}],2:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.inArrIndex = inArrIndex;

function inArrIndex(arr, ele) {
    var tmp = arr.slice();
    var index = -1;
    tmp.push(ele);
    tmp.sort(function (a, b) {
        return a - b;
    });
    index = tmp.indexOf(ele);
    return Promise.resolve([tmp, index]);
}

},{}]},{},[1])