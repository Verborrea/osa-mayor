window.onload = function(){
	let form_elements = Array.from(document.forms[0].elements);
	for (let i = 0; i < form_elements.length - 1; i++) {
		form_elements[i].oninput = muestraAlerta;
	}
}

function muestraAlerta(evento) {
	let orginial_id = evento.target.id;
	let label = document.getElementById(orginial_id + "-l");
	if (evento.target.value == "")
		label.style.color="white";
	else
		label.style.color="black";
}