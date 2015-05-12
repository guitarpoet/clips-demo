(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } };

var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ('value' in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();

Object.defineProperty(exports, '__esModule', {
    value: true
});
$.fn.cssNumber = function (options) {
    if ($(this).css(options)) {
        return parseInt($(this).css(options).replace(/[^-\d\.]/g, ''));
    } else {
        return false;
    }
};

var Stickup = (function () {
    function Stickup(sel) {
        _classCallCheck(this, Stickup);

        var self = this;

        this.sel = sel;
        this.$window = $(window);
        this.menuNextDom = $(sel).next();
        this.menuNextDomFirstChildren = this.menuNextDom.children().eq(0);
        this.lastscrolltop = 0;

        this.checkScreenWidth(function () {
            $(self.sel).addClass('isstuck');
            self.menutop = self.getMenutop(true);
        }, function () {
            self.menutop = self.getMenutop(false);
        });
        this.getPrevHeight();
        this.checkScroll(this.checkHandler);
        this.applayWatch();
    }

    _createClass(Stickup, [{
        key: 'checkScroll',
        value: function checkScroll(checkhandler) {
            var self = this;
            $.proxy(checkhandler, self)();
            self.$window.on('scroll', $.proxy(checkhandler, self));
        }
    }, {
        key: 'checkHandler',
        value: function checkHandler() {
            var self = this;
            var $menu = $(self.sel);
            var menutop = self.menutop;
            var menuNextDomFirstChildrenTop = self.menuNextDomFirstChildren.cssNumber('margin-top');
            var windowScrollTop = self.$window.scrollTop();

            if (windowScrollTop > menutop) {
                if (!$menu.hasClass('isstuck')) {
                    $menu.addClass('isstuck');
                    $menu.trigger('stickup.over');
                    var menuNextDomMt = $menu.outerHeight() + menutop + menuNextDomFirstChildrenTop;
                    if (windowScrollTop < menuNextDomMt && $menu.attr('mobile') != 'true') {
                        $menu.next().css('margin-top', $menu.outerHeight() + windowScrollTop - menutop + menuNextDomFirstChildrenTop);
                    }
                }
            } else {
                $menu.removeClass('isstuck');
                $menu.trigger('stickup.leave');
                $menu.next().css('margin-top', '');
            }
        }
    }, {
        key: 'applayWatch',
        value: function applayWatch() {
            var self = this;
            var $menu = $(self.sel);
            $menu.watch({
                properties: 'attr_class',
                callback: function callback(data, i) {
                    var propChanged = data.props[i];
                    var newValue = data.vals[i];
                    if (propChanged == 'attr_class') {
                        if (newValue == 'isstuck') {
                            $menu.trigger('stickup.over');
                        } else {
                            $menu.trigger('stickup.leave');
                        }
                    }
                }
            });
            $menu.watch({
                properties: 'attr_mobile',
                callback: function callback(data, i) {
                    var propChanged = data.props[i];
                    var newValue = data.vals[i];
                    if (propChanged == 'attr_mobile') {
                        if (newValue == 'true') {
                            $menu.trigger('stickup.over');
                            self.checkHandler();
                        } else {
                            $menu.trigger('stickup.over');
                            self.checkHandler();
                        }
                    }
                }
            });
        }
    }, {
        key: 'checkScreenWidth',
        value: function checkScreenWidth(onmobile, ondesktop) {
            var self = this;
            if (this.$window.width() < 1025) {
                $(self.sel).attr('mobile', true);
                if ($.isFunction(onmobile)) {
                    onmobile();
                }
            } else {
                $(self.sel).attr('mobile', false);
                if ($.isFunction(ondesktop)) {
                    ondesktop();
                }
            }
            $(window).resize(function () {
                if (self.$window.width() < 1025) {
                    $(self.sel).attr('mobile', true);
                    if ($.isFunction(onmobile)) {
                        onmobile();
                    }
                } else {
                    $(self.sel).attr('mobile', false);
                    if ($.isFunction(ondesktop)) {
                        ondesktop();
                    }
                }
            });
        }
    }, {
        key: 'getPrevHeight',
        value: function getPrevHeight() {
            var self = this;
            var height = 0;
            var prev = $(self.sel).prev();
            var i = 0;
            while (prev && prev.length > 0) {
                i++;
                height = height + prev.outerHeight();
                prev = prev.prev();
            }
            return height;
        }
    }, {
        key: 'getMenutop',
        value: function getMenutop() {
            var mobile = arguments[0] === undefined ? false : arguments[0];

            var self = this;
            if (mobile) {
                return self.getPrevHeight() - $(self.sel).outerHeight() - $(self.sel).cssNumber('top');
            } else {
                return self.getPrevHeight();
            }
        }
    }, {
        key: 'logLastWindow',
        value: function logLastWindow() {
            var self = this;
            self.$window.on('scrollstop', function () {
                self.lastscrolltop = $(window).scrollTop();
            });
        }
    }]);

    return Stickup;
})();

exports.Stickup = Stickup;

window.Stickup = Stickup;

},{}]},{},[1])