function validateForm() {
        var x = document.forms["leavecommentform"]["nameinput"].value;
        if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}
