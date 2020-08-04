import iziModal from 'izimodal';
import { tns } from 'tiny-slider/src/tiny-slider';
import isMobile from '../utils/isMobile';

class Banner {
    constructor() {
        $.fn.iziModal = iziModal; // use IziModal
        this.bannerSelector = '.banner';
        this.videoModalSelector = '#modal-banner-video';
        this.carouselSelector = '.banner__carousel';
        this.slider = null;
        this.autoplay = true;

        if (document.querySelector(this.carouselSelector)) {
            this.videoModal = document.querySelector(this.videoModalSelector);

            this.initSlider();

            if (this.videoModal) {
                this.initVideo();
            } else {
                console.warn('Element with selector ' + this.videoModalSelector + ' not found. Video won\'t be initialized');
            }

        }
    }

    initSlider() {
        this.slider = tns({
            container: this.carouselSelector,
            items: 1,
            slideBy: 'page',
            autoplay: this.autoplay,
            mode: 'gallery',
            controlsPosition: 'bottom',
            navPosition: 'bottom',
            speed: '800',
            autoplayTimeout: '5000',
            autoplayButton: false,
            autoplayButtonOutput: false,
            autoHeight: false,
            controlsText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
            onInit: this.setBannerThemeColor.bind(this)
        });

        this.slider.events.on('indexChanged', this.setBannerThemeColor.bind(this));
    }

    setBannerThemeColor(info, eventName) {
        let currentColor = info.slideItems.item(info.index).dataset.slidecolor;
        document.querySelector(this.bannerSelector).dataset.bannercolor = currentColor;
    }

    getIzimodalSize() {
        let videoModalWidth = 1320;
        let radius = '0.56333';

        if (videoModalWidth > document.body.clientWidth) {
            videoModalWidth = parseInt(document.body.clientWidth - 30);
        }

        if (isMobile()) {
            videoModalWidth = parseInt(document.body.clientWidth - 30);
        }

        let videoModalHeight = parseInt(videoModalWidth * radius);


        let sizes = {
            'width': videoModalWidth,
            'height': videoModalHeight
        };

        return sizes;
    }

    initVideo() {
        let iziModalSize = this.getIzimodalSize();

        $('#modal-banner-video').iziModal({
            history: false,
            iframe: true,
            fullscreen: false,
            borderBottom: false,
            headerColor: '#000000',
            iframeURL: 'https://www.youtube.com/embed/1G4isv_Fylg?autoplay=1',
            autoopen: 0,
            background: '#000000',
            width: iziModalSize.width,
            iframeHeight: iziModalSize.height,
        });

        $(document).on('click', '.modal-video-trigger', e => {
            e.preventDefault();
            let url = e.currentTarget.href;
            $(e.currentTarget).attr("href", url );
            $('#modal-banner-video').iziModal("open", e);
        });
    }
}

export default Banner;