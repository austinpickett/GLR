// ---------------------------------------------

export class Header {
	constructor($header) {
		this.$header = $header

		this.lastScrollTop = 0
		this._onScroll = this.handleScroll.bind(this)

		this._onScroll()
		window.addEventListener('scroll', this._onScroll, false)

		//

		let $mobileLink

		if ($mobileLink = this.$header.querySelector('.mobile-link > a')) {
			$mobileLink.addEventListener('click', this.handleMobileClick.bind(this), true)
		}

		let $mobileNavLinks
		if ($mobileNavLinks = this.$header.querySelectorAll('.main-mobile-nav li.menu-item-has-children')) {
			Array.from($mobileNavLinks).forEach(x => x.querySelector('a').addEventListener('click', this.handleMobileSubanv.bind(this), true))
		}
	}

	handleMobileSubanv(e) {
		e.preventDefault()
		e.target.offsetParent.classList.toggle('over')
	}

	toggleIf(c, cond) {
		let classList = this.$header.classList

		if (cond) classList.add(c)
		else classList.remove(c)
	}

	handleScroll(e) {
		let scrollTop = window.pageYOffset,
			threshold = 30

		if (document.querySelector('.masthead'))
			threshold = 300

		this.toggleIf('out', this.lastScrollTop < scrollTop && scrollTop >= threshold)
		this.toggleIf('min', scrollTop >= threshold)

		this.lastScrollTop = scrollTop
	}

	handleMobileClick(e) {
		this.toggleIf('mobile-menu-open', !this.$header.classList.contains('mobile-menu-open'))

		if (this.$header.classList.contains('mobile-menu-open'))
			document.body.classList.add('lock')

		else document.body.classList.remove('lock')
	}
}

new Header(document.getElementById('header'))