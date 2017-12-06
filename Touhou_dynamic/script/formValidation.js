function validateForm() {
        var nome = document.forms["leavecommentform"]["nameinput"].value;
	var email = document.forms["leavecommentform"]["emailinput"].value;
	var commento = document.forms["leavecommentform"]["commentoinput"].value;

	return validateString("nome",nome) && validateString("commento",commento) && validateEmail(email); 
}

function validateString(tipo, stringa) {
	if (stringa == "") {
		alert("il "+ tipo + " non può essere vuoto");
		return false;
	}
	else
		return true;
}


function validateEmail(email) {
	var regExpMail = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
	if(email.match(regExpMail)) {
		alert("match");
		return false;
	}
	else {
		alert("no match");
		return false;
	}
}

/*
function validateEmail(email) {
	
	if(email == "") {
		alert("l'email non può essere vuota");
		return false;
	}
	else if(!email.match()) {
		alert("email non valida");
		return false;
	}
	else
		return true; 
}
*/
















