const reloj = document.getElementById('clock');
var dialLines = document.getElementsByClassName('diallines');
var clockEl = document.getElementsByClassName('reloj')[0];

for (var i = 1; i < 60; i++) {
  clockEl.innerHTML += "<div class='diallines'></div>";
  dialLines[i].style.transform = "rotate(" + 6 * i + "deg)";
}

function fijarAgujas() {
	
	const ahora = new Date();
	
	var hora = ahora.getHours();
	const minutos = ahora.getMinutes();
	const segundos = ahora.getSeconds();
	const horario = document.querySelector('.horario');
	const minutero = document.querySelector('.minutero');
	const segundero = document.querySelector('.segundero');
	if (hora >= 12) {
		hora = hora - 12;
	}
	//var cm=-180; //Constante maldita, algo de css que inicia ahí en +180º, para que no afecte le quitamos
	var gradosHora = 90 + (hora * 30 + minutos/2); // * 360 / 12
	
	horario.style.transform = `rotate(${gradosHora}deg)`; //gira en sentido anti-horario el positivo, lo normal
	const gradosMinutos = 90 + (minutos*6 + segundos/10) ; // *360 / 60
	minutero.style.transform = `rotate(${gradosMinutos}deg)`; //gira en sentido horario el positivo, raro
	const gradosSegundos =90 + segundos * 6;
	if(gradosSegundos === 90) {
        segundero.style.transition = 'none'
    } else {
        segundero.style.transition = ''
    }
	segundero.style.transform = `rotate(${gradosSegundos}deg)`;
	reloj.style.display = "block";
}

setInterval(fijarAgujas, 1000);
