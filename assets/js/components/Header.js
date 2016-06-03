import HoverIntent from '../modules/HoverIntent'

// ---------------------------------------------

if (window.innerWidth > 770) {
	HoverIntent.bind(document.body.querySelectorAll('li[class*="children"]'))
}

else {
	HoverIntent.bind(document.body.querySelectorAll('li[class*="children"] > a'))
}

// ---------------------------------------------

export class Header {
	constructor($header) {
		this.$header = $header

		this.lastScrollTop = 0
		this._onScroll = this.handleScroll.bind(this)

		this._onScroll()
		window.addEventListener('scroll', this._onScroll, false)

		this.$header.querySelector('.mobile-link').addEventListener('click', this.handleClick.bind(this))
	}

	toggleIf(c, cond) {
		let classList = this.$header.classList

		if (cond) classList.add(c)
		else classList.remove(c)
	}

	handleScroll(e) {
		let scrollTop = window.pageYOffset
		let threshold = 30

		this.toggleIf('out', this.lastScrollTop < scrollTop && scrollTop >= threshold)
		this.toggleIf('min', scrollTop >= threshold)

		this.lastScrollTop = scrollTop
	}

	handleClick(e) {
		this.toggleIf(
			'mobile-menu-open',
			!this.$header.classList.contains('mobile-menu-open')
		)

		document.body.style.overflow = this.$header.classList.contains('mobile-menu-open')
			? 'hidden'
			: false
	}
}

new Header(document.getElementById('header'))

// ---------------------------------------------

if (location.hash) {
	let el = document.getElementById(location.hash.replace('#', ''))
	if (el) {
		Velocity(el, 'scroll', {
			duration: 650,
			offset: -105
		})
	}
}