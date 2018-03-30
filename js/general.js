var map;
function openMenu(evt, menuName) {
    $('#portada').hide();
	//$('#todotabcontent').show();
	var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
	/*tabcontent = $(".tabcontent"); lo mismo q arriba pero en jQueryu*/
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(menuName).style.display = "block";
    evt.currentTarget.className += " active";
	if (menuName=='nosotros'){
		initMap();
		google.maps.event.trigger(map, 'resize');
	}
	if (menuName=='galeria'){
		showSlides(1);
		
	}
}

var slideIndex = 1;
function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

 function initMap() {
		  var pos;
		  
		  map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 0, long:0},
          zoom: 10
        });
		
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('College Time Square.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
		
		map.setCenter(pos);
        var infoWindow = new google.maps.InfoWindow({map: map});
      }

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
		}
function openPortada() {
    var portada = document.getElementById('inicio');
    if (portada.style.display === 'none') {
        portada.style.display = 'block';
    } 
}

function validarForm() {
    var edad = document.forms["myForm"]["edad"].value;
    if (!edad.checkValidity()) {
		alert("edad.validationMessage;");
		return false;
    } 

}

function permite(elEvento, permitidos) {
  // Variables que definen los caracteres permitidos
  var numeros = "0123456789";
  var caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
  var numeros_caracteres = numeros + caracteres;
  var teclas_especiales = [8, 37, 39, 46];
  // 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha
 
  // Seleccionar los caracteres a partir del parámetro de la función
  switch(permitidos) {
    case 'num':
      permitidos = numeros;
      break;
    case 'car':
      permitidos = caracteres;
      break;
    case 'num_car':
      permitidos = numeros_caracteres;
      break;
  }
 
  // Obtener la tecla pulsada 
  var evento = elEvento || window.event;
  var codigoCaracter = evento.charCode || evento.keyCode;
  var caracter = String.fromCharCode(codigoCaracter).toUpperCase();
 
  // Comprobar si la tecla pulsada es alguna de las teclas especiales
  // (teclas de borrado y flechas horizontales)
  var tecla_especial = false;
  for(var i in teclas_especiales) {
    if(codigoCaracter == teclas_especiales[i]) {
      tecla_especial = true;
      break;
    }

  }
 
  // Comprobar si la tecla pulsada se encuentra en los caracteres permitidos o si es una tecla especial
  return permitidos.indexOf(caracter) != -1 || tecla_especial;
  
}

  function letraMayuscula(e,myForm) {
	
    key = e.keyCode || e.which;
	
	letras = /[\D\s]/;
	tecla = String.fromCharCode(key);
    
   
    // Convertir 1° letra a mayuscula
		txt = myForm.value;
		
		 if (txt.length==0 || txt.substr(txt.length-1,1)==' ') {
		 myForm.value = txt+tecla.toUpperCase();
                 return false;
                 }
		 return true;
}

/*<form action="/action_page.php">
Password: <input type="password" name="pw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
<input type="submit">
E-mail: <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
</form>*/