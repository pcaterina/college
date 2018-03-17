
var map;
function openMenu(evt, menuName) {
    //$('#portada').hide();
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
    