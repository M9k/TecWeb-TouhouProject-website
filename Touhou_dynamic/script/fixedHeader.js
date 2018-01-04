
window.onscroll = function() {
  if(screen.width >= "900") {
  let menudiv = document.getElementById("menudiv");
  let header = document.getElementById("header");
  let menu = document.getElementById("menu");
  if (window.pageYOffset > 1 + header.clientHeight - menu.clientHeight ) {
    menudiv.classList.add("sticky");
  } else {
    menudiv.classList.remove("sticky");
  }
}

}
