window.onload = function() {
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
}
