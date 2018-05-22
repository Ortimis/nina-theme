class App {

	constructor() {
		this.el = document.querySelector('.el');

		this.listeners();
		this.init();
	}

	init() {
		// ****
		// Cookie Consent Bar
		// ****
		function handleCookieBar() {
			$('.cookie-info').hide();
			if (sessionStorage.getItem('cookieNotifyState') != 'dismissed') {
				$('.cookie-info').delay(2000).fadeIn();

			}
			$('.cookie-info').on('click', '.dismiss-cookie-notification', function (event) {
				event.preventDefault();
				$('.cookie-info').fadeOut();
				sessionStorage.setItem('cookieNotifyState', 'dismissed');
			});
		}
		handleCookieBar();
	}

	listeners() {
		if (this.el) {
			this.el.addEventListener('click', this.elClick);
		}
	}

	elClick(e) {
		e.target.classList.add('text-light-grey');
		e.target.addEventListener('transitionend', (e) => ('color' === e.propertyName) ? e.target.classList.remove('text-light-grey') : '');
	}

}

export default App;
