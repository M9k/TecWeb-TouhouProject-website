var fixedHeader;

window.onload = function() {
	var menudiv = document.getElementById("menudiv");
	var header = document.getElementById("header");
	var menu = document.getElementById("menu");
	var mq2 = window.matchMedia('handheld, screen and (max-width: 680px), only screen and (max-device-width:600px)');
	mq2.addListener(CheckFixedHeader);
	function CheckFixedHeader() {
		fixedHeader = !mq2.matches;
	}
	fixedHeader = !mq2.matches;
}

window.onscroll = function() {
	if(fixedHeader) {
		if (window.pageYOffset > 1 + header.clientHeight - menu.clientHeight ) {
			menudiv.classList.add("sticky");
			header.style.borderWidth = "0";
		}
		else {
			menudiv.classList.remove("sticky");
			header.style.borderWidth = "2pt";
		}
	}
}
