function scrollTo (element, to, duration, paramFunc){
    if (duration <= 0) return;
    var difference = to - element.scrollTop;
    var perTick = difference / duration * 5;

    setTimeout(function() {
        element.scrollTop = element.scrollTop + perTick;
        
        if (Math.ceil(element.scrollTop) >= to) {
        	if (paramFunc && (typeof paramFunc == "function")) {
	      		paramFunc();
	    	}
        	return;
        }

        scrollTo(element, to, duration - 5, paramFunc);

    }, 5);
}


export default scrollTo;