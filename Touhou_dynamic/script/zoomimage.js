window.onload = function() {
	[].forEach.call(document.getElementById("contenuto").getElementsByTagName("img"), makezoomable);
}

function makezoomable(image) {
	image.classList.add('zoomable');
	image.classList.remove('zoomableout');
	image.addEventListener("click", function () {zoom(image);} );
}

function zoom(image){
	image.style.width = "95%";
	image.style.float = "none";
	image.classList.remove('zoomable');
	image.classList.add('zoomableout');
	image.removeEventListener("click", function () {zoom(image);} );
	image.addEventListener("click", function () {zoomout(image);} );
}

function zoomout(image){
	if (image.style.removeProperty) {
    	image.style.removeProperty('width');
    	image.style.removeProperty('float');
	}
	else {
		//IE < 9
    	image.style.removeAttribute('width');
    	image.style.removeAttribute('float');
	}
	image.classList.add('zoomable');
	image.classList.remove('zoomableout');
	image.addEventListener("click", function () {zoom(image);} );
	image.removeEventListener("click", function () {zoomout(image);} );
}
