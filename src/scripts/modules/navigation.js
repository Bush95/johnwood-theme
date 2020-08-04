import { disableBodyScroll, enableBodyScroll, clearAllBodyScrollLocks } from 'body-scroll-lock';

class Navigation {
	constructor() {
		this.navEl = document.querySelector('.main-nav');
		this.socialBarEl = document.querySelector('.side-nav');
		this.element = document.querySelector('.page-navigation');
		this.elementOffset = this.element.offsetTop;
		this.elementHeight = this.element.clientHeight;
		this.addListeners();
		// this.bodyScrolled();
		this.hideNavbar(this.element);
	}

	closeMenu() {
		document.querySelector('body').classList.remove('nav-open');
		enableBodyScroll(this.navEl);
	}

	toggleMenu() {
		if (document.querySelector('body').classList.contains('nav-open')) {
			enableBodyScroll(this.navEl);
		} else {
			disableBodyScroll(this.navEl);
		}
		
		document.querySelector('body').classList.toggle('nav-open');
	}

	toggleSocialBar() {
		if (document.querySelector('body').classList.contains('social-bar-open')) {
			enableBodyScroll(this.socialBarEl);
		} else {
			disableBodyScroll(this.socialBarEl);
		}
		
		document.querySelector('body').classList.toggle('social-bar-open');
	}

	closeSocialBar() {
		document.querySelector('body').classList.remove('social-bar-open');
		enableBodyScroll(this.socialBarEl);
	}

	addListeners() {
		document.querySelector('.hamburger.nav-burger').addEventListener('click', this.toggleMenu.bind(this));

		document.querySelector('.hamburger.social-burger').addEventListener('click', this.toggleSocialBar.bind(this));

		document.querySelector('.social-bar-close-btn').addEventListener('click', this.toggleSocialBar.bind(this));

		document.querySelector('.page-navigation__overlay').addEventListener('click', this.closeMenu.bind(this));

		document.querySelector('.main-nav').addEventListener('click', function(e) {
			if (e.target && e.target.matches("li.menu-item-has-children")) {
			    e.target.classList.toggle('subnav-open');
			    $(e.target).find('.sub-menu').first().slideToggle(200);
			}
		});

		$('#searchform').submit(function(e){
		    if($('#s').val() == ''){
		        e.preventDefault();
		    }
		});

		$('#searchformresults').submit(function(e){
		    if($('#sr').val() == ''){
		        e.preventDefault();
		    }
		});

		$('#searchformmobile').submit(function(e){
		    if($('#sm').val() == ''){
		        e.preventDefault();
		    }
		});

		$('.search-trigger').click(function(){
		    $('.search-top-wrapper').toggleClass('form-active');

		    if ($('.search-top-wrapper').hasClass("form-active")) {
		    	setTimeout(_=> {
			    	$('#s').focus();
		    	}, 20);
		    }
		});

		$('.search-close-button').click(function(){
		    $('.search-top-wrapper').removeClass('form-active');
		});

		document.onkeydown = function(evt) {
		    evt = evt || window.event;
		    var isEscape = false;
		    if ("key" in evt) {
		        isEscape = (evt.key === "Escape" || evt.key === "Esc");
		    } else {
		        isEscape = (evt.keyCode === 27);
		    }
		    if (isEscape) {
		    	$('.search-top-wrapper').removeClass('form-active');
		    }
		};
	}

	/**
	 * Hide navbar after scrolling down / show on scroll up
	 * @param  node-element
	 * @return bool
	 */
	hideNavbar(element) {
	    if (element != null) {
	       var lastposition = 0;
	       var delta = 5;
	       var hasScrolled = false;

	        window.onscroll = function() {
	           hasScrolled = true;
	        };

	        setInterval((function(){
           		if (hasScrolled) {
					let doc = document.documentElement;
					let top = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);

					if (top < this.elementOffset) {
				   		document.body.classList.remove('scrolled');
					} else {
				   		document.body.classList.add('scrolled');
					}

		            hasScrolled = false;
		        }
	        }).bind(this), 15);

	    }
	}

	bodyScrolled(element) {
       var lastposition = 0;
       var delta = 5;
       var hasScrolled = false;

        window.onscroll = function() {
           hasScrolled = true;
        };

        setInterval((function(){
       		if (hasScrolled) {
       			this.changeBodyScrollClass();
	            hasScrolled = false;
	        }
        }).bind(this), 250);
    }

    changeBodyScrollClass() {
		let doc = document.documentElement;
		let top = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);

		if (top < 45) {
	   		document.body.classList.remove('scrolled');
		} else {
	   		document.body.classList.add('scrolled');
		}
    }

}

export default Navigation;