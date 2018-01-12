(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
	value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

// ---------------------------------------------

var Header = exports.Header = function () {
	function Header($header) {
		_classCallCheck(this, Header);

		this.$header = $header;

		this.lastScrollTop = 0;
		this._onScroll = this.handleScroll.bind(this);

		this._onScroll();
		window.addEventListener('scroll', this._onScroll, false

		//

		);var $mobileLink = void 0;

		if ($mobileLink = this.$header.querySelector('.mobile-link > a')) {
			$mobileLink.addEventListener('click', this.handleMobileClick.bind(this), true);
		}
	}

	_createClass(Header, [{
		key: 'toggleIf',
		value: function toggleIf(c, cond) {
			var classList = this.$header.classList;

			if (cond) classList.add(c);else classList.remove(c);
		}
	}, {
		key: 'handleScroll',
		value: function handleScroll(e) {
			var scrollTop = window.pageYOffset,
			    threshold = 30;

			if (document.querySelector('.masthead')) threshold = 300;

			this.toggleIf('out', this.lastScrollTop < scrollTop && scrollTop >= threshold);
			this.toggleIf('min', scrollTop >= threshold);

			this.lastScrollTop = scrollTop;
		}
	}, {
		key: 'handleMobileClick',
		value: function handleMobileClick(e) {
			this.toggleIf('mobile-menu-open', !this.$header.classList.contains('mobile-menu-open'));

			if (this.$header.classList.contains('mobile-menu-open')) document.body.classList.add('lock');else document.body.classList.remove('lock');
		}
	}]);

	return Header;
}();

new Header(document.getElementById('header'));

},{}],2:[function(require,module,exports){
'use strict';

var _Header = require('./components/Header');

var _Header2 = _interopRequireDefault(_Header);

var _AnimateOut = require('./modules/AnimateOut');

var _AnimateOut2 = _interopRequireDefault(_AnimateOut);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

// Array.from(document.querySelectorAll('[href]')).forEach(el => {
// 	const href = el.getAttribute('href')

// 	if (
// 		href.match(location.origin)
// 		&& !/#/.test(href)
// 		&& !/contact/.test(href)
// 	) {
// 		el.addEventListener('click', (e) => {
// 			e.preventDefault()
// 			return AnimateOut(href)
// 		})
// 	}
// })

window.onload = function () {
  return document.body.classList.add('loaded');
};

},{"./components/Header":1,"./modules/AnimateOut":3}],3:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
	value: true
});

exports.default = function (href) {
	var _arguments = arguments;

	document.body.classList.remove('load-in');
	document.body.classList.add('load-out');['animationend', 'webkitAnimationEnd'].map(function (evt) {
		$container.addEventListener(evt, function (e) {
			location.href = href;
			$container.removeEventListener(e.type, _arguments.callee);
		});
	});
};

var $container = document.getElementById('container');

window.onpageshow = function (e) {
	return e.persisted ? window.location.reload() : null;
};

},{}]},{},[2]);
