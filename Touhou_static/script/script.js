const mq = window.matchMedia('handheld, screen and (max-width: 680px), only screen and (max-device-width:600px)');
var menuIsOpen = false;
var menuIsFixed = false;
window.onscroll = changeHeader;

window.onload = function() {
	//immagini zoommabili
	[].forEach.call(document.getElementById("contenuto").getElementsByTagName("img"), makezoomable);
	
	//menu per i dispositivi mobili, sostituisce il css hover se possibile
	var menuvoice = document.getElementById('menuvoice');
	//per il menu fixed
	var menudiv = document.getElementById("menudiv");
	var header = document.getElementById("header");
	var menu = document.getElementById("menu");

	mq.addListener(ChangeResolutionCheck);

	function ChangeResolutionCheck() {
		if(mq.matches) //solo su mobile
		{
			if(menuIsFixed)
				unFixMenu();
			//blocco il hover
			var siblingstart = menuvoice.nextElementSibling;
			while(siblingstart != null) {
				siblingstart.style.display = 'none';
				siblingstart = siblingstart.nextElementSibling;
			}
			//setto attraverso il click
			menuvoice.onclick = function() {
				var sibling = this.nextElementSibling;
				if(menuIsOpen) {
					while(sibling != null) {
						sibling.style.display = 'none';
						sibling = sibling.nextElementSibling;
					}
					menuIsOpen = false;
				}
				else {
					while(sibling != null) {
						sibling.style.display = 'block';
						sibling = sibling.nextElementSibling;
					}
					menuIsOpen = true;
				}
			}
		}
		else //su pc - se c'è necessità rimuovo lo stile precedentemente settato
		{
			//sblocco il hover
			var siblingstart = menuvoice.nextElementSibling;
			while(siblingstart != null) {
				siblingstart.style.display = 'block';
				siblingstart = siblingstart.nextElementSibling;
			}
			menuopen = true;
			changeHeader();
		}
	}

	ChangeResolutionCheck();
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

function validateFormAddNews() {
	var titolo = document.forms["addnewsform"]["titleform"].value;
	var imgCopertina = document.forms["addnewsform"]["imageform"].value;
	var imgUploadCopertina = document.getElementById("fileupload").files.length;
	var descrizione = document.forms["addnewsform"]["imgdescrform"].value;
	var testo = document.forms["addnewsform"]["textform"].value;
	var validate = validateString("titolo", titolo) & validateStringImage(imgCopertina, imgUploadCopertina) & validateString("descrizione", descrizione) & validateString("testo", testo);
	if(validate == false) {
		document.getElementById("erroreAdd").innerHTML="*impossibile inviare";
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

function validateStringc(tipo1, tipo2, stringa) {
	var errore = "errore".concat(tipo1,tipo2);
	document.getElementById(errore).innerHTML='';
	if (stringa == "") {
		document.getElementById(errore).innerHTML="*inserire un ".concat(tipo1, " per l' ", tipo2);
		return false;
	}
	else
		return true;
}

function validateStringImage(stringa, upload) {
	document.getElementById("erroretitoloimmagine").innerHTML='';
	if (upload == 0 && stringa == "") {
		document.getElementById("erroretitoloimmagine").innerHTML="*inserire il nome di una immagine o caricarne una nuova";
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

function changeHeader() {
	if(!mq.matches)
		if (window.pageYOffset > 2 + header.clientHeight - menu.clientHeight ) //mi serve davvero impostarlo
		{
			if(!menuIsFixed) //e non e' ancora impostato -> imposto
				fixMenu();
		}
		else //se invece non mi serve impostarlo
			if(menuIsFixed) //ma e' impostato -> lo rimuovo
				unFixMenu();
}

function fixMenu() {
	header.style.borderWidth = "0";
	menudiv.style.position = "fixed";
	menudiv.style.top = "0";
	menudiv.style.bottom = "auto";
	menudiv.style.width = header.clientWidth + "px";
	menu.style.top = "0";
	menu.style.bottom = "auto";
	menuIsFixed = true;
}
function unFixMenu() {
	header.style.borderWidth = "1pt";
	menudiv.style.position = "initial";
	menudiv.style.top = "auto";
	menudiv.style.bottom = "0";
	menudiv.style.width = "100%";
	menu.style.top = "auto";
	menu.style.bottom = "0";
	menuIsFixed = false;
}
