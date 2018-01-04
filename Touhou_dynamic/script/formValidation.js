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
  var descrizione = document.forms["addnewsform"]["imgdescrform"].value;
  var testo = document.forms["addnewsform"]["textform"].value;
	var validate = validateString("titolo",titolo) & validateStringc("titolo", "immagine", imgCopertina) & validateString("descrizione", descrizione) & validateString("testo", testo);
	if(validate==0) {
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
    switch (tipo) {
      case "descrizione":
        document.getElementById(errore).innerHTML="*inserire una ".concat(tipo);
        break;
        case "testo":
          document.getElementById(errore).innerHTML="*inserire del ".concat(tipo);
          break;
      default:
          document.getElementById(errore).innerHTML="*inserire un ".concat(tipo);
    }
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
