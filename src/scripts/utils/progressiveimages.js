class Progressiveimages {
	constructor() {
		const placeholders = document.querySelectorAll('.progressive-image .progressive-image__placeholder');
		[].forEach.call(placeholders, function(placeholder) {

		    var image = new Image();

		    image.src = placeholder.dataset.large; 
		    image.alt = placeholder.dataset.alt; 

		    image.onload = function () {
		        image.classList.add('loaded');
		    };

		    placeholder.appendChild(image);
		});
	}
}

export default Progressiveimages;