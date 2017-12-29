
window.onscroll = function() {
  var header = document.getElementById("menudiv");
  var sticky = 10;

  if (window.pageYOffset >= sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
