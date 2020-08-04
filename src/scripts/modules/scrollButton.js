class ScrollButton {
	constructor(selector, scrollToPositionY, duration) {
		this.el = $(selector);
		this.scrollToPositionY = scrollToPositionY;
		this.duration = duration;

		if (this.el) {
			this.init();
		}
	}

	init() {
		$(document).ready(this.addListeners.bind(this));
	}

	addListeners() {
		this.el.on('click', this.scrollEvent.bind(this));
	}

	scrollEvent(e) {
		e.preventDefault();
		$('body, html').animate({
			scrollTop: this.scrollToPositionY
		}, this.duration);
	}
}
export default ScrollButton;
