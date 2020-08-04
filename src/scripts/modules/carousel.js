import { tns } from 'tiny-slider/src/tiny-slider';

class Carousel {
    constructor() {
        this.accreditationsCarouselSelector = '.accreditations__carousel';
        this.accreditationsCarousel = $(this.accreditationsCarouselSelector);

        this.testimonialsCarouselSelector = '.testimonials__carousel';
        this.testimonialsCarousel = $(this.testimonialsCarouselSelector);

        this.productsCarouselSelector = '.products-carousel__inner';
        this.productsCarousel = $(this.productsCarouselSelector);

        if (this.accreditationsCarousel.length) {
            this.initAccreditationsCarousel();
        }
        if (this.testimonialsCarousel.length) {
            this.initTestimonialsCarousel();
        }
        if (this.productsCarousel.length) {
            this.initProductsCarousel();
        }
    }

    initAccreditationsCarousel() {
        this.accreditationsSlider = tns({
            container: this.accreditationsCarouselSelector,
            items: 3,
            slideBy: 'page',
            autoplay: true,
            controlsPosition: 'bottom',
            navPosition: 'bottom',
            speed: '800',
            autoplayTimeout: '5000',
            autoplayButton: false,
            autoplayButtonOutput: false,
            gutter: 15,
            controls: false,
            controlsText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
            responsive: {
                992: {
                    items: 4,
                    gutter: 30
                }
            }
        });
    }

    initTestimonialsCarousel() {
        this.testimonialsSlider = tns({
            container: this.testimonialsCarouselSelector,
            items: 1,
            slideBy: 'page',
            autoplay: true,
            controlsPosition: 'bottom',
            navPosition: 'bottom',
            speed: '800',
            autoplayTimeout: '5000',
            autoplayButton: false,
            autoplayButtonOutput: false,
            gutter: 0,
            controls: false,
        });
    }

    initProductsCarousel() {
        [].forEach.call(document.querySelectorAll(this.productsCarouselSelector), el => {
            tns({
                container: el,
                items: 2,
                slideBy: 'page',
                autoplay: true,
                controlsPosition: 'bottom',
                navPosition: 'bottom',
                speed: '800',
                autoplayTimeout: '5000',
                autoplayButton: false,
                autoplayButtonOutput: false,
                gutter: 15,
                controls: false,
                responsive: {
                992: {
                    items: 4,
                }
            }
            });
        });
    }
}

export default Carousel;