function validateForm() {
        var nome = document.forms["leavecommentform"]["nameinput"].value;
	var email = document.forms["leavecommentform"]["emailinput"].value;
	var commento = document.forms["leavecommentform"]["commentoinput"].value;
	var validata = validateString("nome",nome) & validateString("commento",commento) & validateEmail(email);
	return validata!=0 ? true : false;  
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


function validateEmail(email) {
	document.getElementById("erroreemail").innerHTML='';
	var regExpMail = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
	if(email.match(regExpMail)) 
		return true;
	else {
		document.getElementById("erroreemail").innerHTML="*inserire un email valida";
		return false;
	}
}















