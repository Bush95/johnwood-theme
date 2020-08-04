import iziModal from 'izimodal';

export default {
    init() {
        $.fn.iziModal = iziModal; // use IziModal
    },
    finalize() {
        $("#product-ask-modal").iziModal({
            borderBottom: false,
            radius: 0,
            padding: 30,
            appendTo: false,
            appendToOverlay: false,
            focusInput: false
        });
    },
}
