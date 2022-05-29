/* This script supports IE9+ */
(function() {
  /* Opening modal window function */
  function openModal() {
      /* Get trigger element */
      var modalTrigger = document.getElementsByClassName('jsModalTrigger');

      /* Set onclick event handler for all trigger elements */
      for(var i = 0; i < modalTrigger.length; i++) {
          modalTrigger[i].onclick = function() {
            var target = this.getAttribute('href').substr(1);
            var modalWindow = document.getElementById(target);

            modalWindow.classList ? modalWindow.classList.add('open') : modalWindow.className += ' ' + 'open'; 
          }
      }   
  }

  function closeModal(){
    /* Get close button */
    var closeButton = document.getElementsByClassName('jsModalClose');
    var closeOverlay = document.getElementsByClassName('jsOverlay');

    /* Set onclick event handler for close buttons */
      for(var i = 0; i < closeButton.length; i++) {
        closeButton[i].onclick = function() {
          var modalWindow = this.parentNode.parentNode;

          modalWindow.classList ? modalWindow.classList.remove('open') : modalWindow.className = modalWindow.className.replace(new RegExp('(^|\\b)' + 'open'.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
        }
      }   

    /* Set onclick event handler for modal overlay */
      for(var i = 0; i < closeOverlay.length; i++) {
        closeOverlay[i].onclick = function() {
          var modalWindow = this.parentNode;

          modalWindow.classList ? modalWindow.classList.remove('open') : modalWindow.className = modalWindow.className.replace(new RegExp('(^|\\b)' + 'open'.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
        }
      }  

  }

  /* Handling domready event IE9+ */
  function ready(fn) {
    if (document.readyState != 'loading'){
      fn();
    } else {
      document.addEventListener('DOMContentLoaded', fn);
    }
  }

  /* Triggering modal window function after dom ready */
  ready(openModal);
  ready(closeModal);
}());

let slideIndex = 1;
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("experiencias").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
setInterval(function() {
    showSlides(slideIndex);
    slideIndex++;
    if (slideIndex > 3) {
        slideIndex = 1;
    }
}, 10000);

function plusSlides(n) {
showSlides(slideIndex += n);
}

function currentSlide(n) {
showSlides(slideIndex = n);
}

function showSlides(n) {
let i;
let slides = document.getElementsByClassName("mySlides");
if (n > slides.length) {slideIndex = 1}    
if (n < 1) {slideIndex = slides.length}
for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
}

slides[slideIndex-1].style.display = "flex";  
}




// ----- Coger la ubicación del navegador
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
    else {
        x.innerHTML = "Geolocalización desactivada";
    }
}
// ------- Mostrar nuestra posición segun el navegador
function showPosition(position) {
    var lat = position.coords.latitude;
    var long = position.coords.longitude;
    localStorage.setItem('lat', JSON.stringify(lat));
    localStorage.setItem('long', JSON.stringify(long));
}

function getMap() {
let ultimaCapa;
var long = localStorage.getItem('long');
var lat = localStorage.getItem('lat');

var map = new ol.Map({
    target: 'map',
    layers: [
        new ol.layer.Tile({
            source: new ol.source.OSM()
        })
    ],
    view: new ol.View({
        center: ol.proj.fromLonLat([2.096726, 41.544223]),
        zoom: 16
    })
});
if (ultimaCapa) {
    mapa.removeLayer(ultimaCapa);
}
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
}
else {
    alert("Geolocalización desactivada");
}

var posicion1 = { "longitud": 2.096726, "latitud": 41.544223};
console.log(posicion1);
console.log(lat + long);
var coordenadas = [];
coordenadas.push(posicion1);
const marcadores = [];
coordenadas.forEach(coordenada => {
    let marcador = new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.fromLonLat([coordenada.longitud, coordenada.latitud])),
    });
    marcador.setStyle(new ol.style.Style({
        image: new ol.style.Icon(({
            src: coordenada.foto,
            crossOrigin: null
        }))
    }));
    marcadores.push(marcador);
});
ultimaCapa = new ol.layer.Vector({
    source: new ol.source.Vector({
        features: marcadores,
    }),
});
map.addLayer(ultimaCapa);
}
// ------   PINTAR MAPA CON OPENSTREET MAPS
function getMapa() {
var map = new OpenLayers.Map("mapDiv");
map.addLayer(new OpenLayers.Layer.OSM());
var epsg4326 = new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
var projectTo = map.getProjectionObject(); //The map projection (Spherical Mercator)
var lonLat = new OpenLayers.LonLat(2.096726, 41.544223).transform(epsg4326, projectTo);
var zoom = 16;
map.setCenter(lonLat, zoom);
var vectorLayer = new OpenLayers.Layer.Vector("Overlay");
// Define an array. This could be done in a seperate js file.
// This tidy formatted section could even be generated by a server-side script (jsonp)
var markers = [
    [2.095496, 41.544748],
    [2.096120, 41.544257],
    [2.098046, 41.543910],
    [2.097578, 41.545920]
];
//Loop through the markers array
for (var i = 0; i < markers.length; i++) {
    var lon = markers[i][0];
    var lat = markers[i][1];
    var feature = new OpenLayers.Feature.Vector(new OpenLayers.Geometry.Point(lon, lat).transform(epsg4326, projectTo), { description: "marker number " + i }, { externalGraphic: 'images/tux' + i + '.jpg', graphicHeight: 30, graphicWidth: 30, graphicXOffset: -12, graphicYOffset: -25 });
    vectorLayer.addFeatures(feature);
}
map.addLayer(vectorLayer);
}


// SLIDER PERFIL
// cartas guardadas
function scrollL(){
    var left = document.querySelector(".scroll-cartitas");
    left.scrollBy(-350, 0);
}
function scrollR(){
    var right = document.querySelector(".scroll-cartitas");
    right.scrollBy(350, 0);
}

// cartas logros
function scrollL2(){
    var left = document.querySelector(".scroll-cartitas2");
    left.scrollBy(-350, 0);
}
function scrollR2(){
    var right = document.querySelector(".scroll-cartitas2");
    right.scrollBy(350, 0);
}
