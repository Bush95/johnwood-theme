import Progressiveimages from '../utils/progressiveimages.js';
import Navigation from '../modules/navigation.js';
// import iziModal from 'izimodal';
import CustomScrollAnimations from 'custom-scroll-animations';
import Banner from '../modules/banner';
import objectFitImages from 'object-fit-images';
import Carousel from '../modules/carousel';

export default {
    init() {
        objectFitImages('.object-fit');
        // $.fn.iziModal = iziModal; // use IziModal
        new Banner();

		const 	navigation = new Navigation(),
				progressiveimages = new Progressiveimages(),
				carousel = new Carousel();
    },
    finalize() {
        this.initCustomScrollAnimations();
        
        if (document.querySelector('.accordion')) {
            this.initAccordions();
        }
    },

    initCustomScrollAnimations() {
        this.scrollAnimations = new CustomScrollAnimations({
            triggerClass: '.scroll-trigger, .post-view main .cms-content > *'
        });
    },

    initAccordions() {
        let $accordions = $('.accordions');

        $('.accordion__title').on('click', function() {
            $(this).parent().toggleClass('active');
            $(this).next('.accordion__content').slideToggle(200);
        });
    }
}
