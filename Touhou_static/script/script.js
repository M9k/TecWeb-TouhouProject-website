var fixedHeader;

window.onload = function() {
	//immagini zoommabili
	[].forEach.call(document.getElementById("contenuto").getElementsByTagName("img"), makezoomable);
	//menu per i dispositivi mobili, sostituisce il css hover se possibile
	var menu = document.getElementById('menuvoice');
	const mq = window.matchMedia('handheld, screen and (max-width: 680px), only screen and (max-device-width:600px)');
	mq.addListener(MenuCheck);
	MenuCheck();

	function MenuCheck() {
		if(mq.matches) //solo su mobile
		{
			var menuopen = false;
			//blocco il hover
			var siblingstart = menu.nextElementSibling;
			while(siblingstart != null) {
				siblingstart.style.display = 'none';
				siblingstart = siblingstart.nextElementSibling;
			}
			//setto attraverso il click
			menu.onclick = function() {
				var sibling = this.nextElementSibling;
				if(menuopen) {
					while(sibling != null) {
						sibling.style.display = 'none';
						sibling = sibling.nextElementSibling;
					}
					menuopen = false;
				}
				else {
					while(sibling != null) {
						sibling.style.display = 'block';
						sibling = sibling.nextElementSibling;
					}
					menuopen = true;
				}
			}
		}
		else //su pc - se c'è necessità rimuovo lo stile precedentemente settato
		{
			var siblingstart = menu.nextElementSibling;
			while(siblingstart != null) {
				siblingstart.style.removeProperty("display");
				siblingstart = siblingstart.nextElementSibling;
			}
		}
	}

	//per il menu fixed
	var menudiv = document.getElementById("menudiv");
	var header = document.getElementById("header");
	var menu = document.getElementById("menu");
	mq.addListener(CheckFixedHeader);
	function CheckFixedHeader() {
		fixedHeader = !mq.matches;
		changeHeader();
	}
	fixedHeader = !mq.matches;
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

//validazione form
function validateForm() {
        var nome = document.forms["leavecommentform"]["nameinput"].value;
	var commento = document.forms["leavecommentform"]["commentoinput"].value;
	var validata = validateString("nome",nome) & validateString("commento",commento) & validateEmail();
	if(validata==0) {
		document.getElementById("erroreinvio").innerHTML="*impossibile inviare";
		return false;
	}
	else
		return true;  
}

function validateString(tipo, stringa) {
	var errore = "errore".concat(tipo);
	document.getElementById(errore).innerHTML='';
	if (stringa == "") {
		document.getElementById(errore).innerHTML="*inserire un ".concat(tipo);
		return false;
	}
	else 
		return true;
}


function validateEmail() {
	var email = document.forms["leavecommentform"]["emailinput"].value;
	document.getElementById("erroreemail").innerHTML='';
	var regExpMail = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
	if(email.match(regExpMail)) 
		return true;
	else {
		document.getElementById("erroreemail").innerHTML="*inserire un email valida";
		return false;
	}
}

window.onscroll = changeHeader;

function changeHeader() {
	if(fixedHeader) {
		if (window.pageYOffset > 2 + header.clientHeight - menu.clientHeight ) {
			menu.style.position = "fixed";
			menu.style.top = "0";
			menu.style.bottom = "auto";
			menu.style.paddingLeft = (window.innerWidth - header.clientWidth)/2 + "px";
			header.style.borderWidth = "0";
		}
		else {
			menu.style.position = "absolute";
			menu.style.top = "auto";
			menu.style.bottom = "0";
			menu.style.paddingLeft = "0px";
			header.style.borderWidth = "2pt";
		}
	}
}
