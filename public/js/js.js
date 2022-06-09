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

// Mapa Google Maps
function initMap() {
  let long = document.getElementById('long');
  let lati = document.getElementById('lat');
  long = long.value;
  lati = lati.value;
  
  var myLatLng = {lat: parseFloat(lati), lng: parseFloat(long)};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    center: myLatLng
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
  });
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



// SCROLL EXPERIENCIAS
function scrollLCAT1(){
  var left = document.querySelector(".CAT1");
  left.scrollBy(-350, 0);
}
function scrollRCAT1(){
  var right = document.querySelector(".CAT1");
  right.scrollBy(350, 0);
}

function scrollLCAT2(){
  var left = document.querySelector(".CAT2");
  left.scrollBy(-350, 0);
}
function scrollRCAT2(){
  var right = document.querySelector(".CAT2");
  right.scrollBy(350, 0);
}

function scrollLCAT3(){
  var left = document.querySelector(".CAT3");
  left.scrollBy(-350, 0);
}
function scrollRCAT3(){
  var right = document.querySelector(".CAT3");
  right.scrollBy(350, 0);
}

function scrollLCAT4(){
  var left = document.querySelector(".CAT4");
  left.scrollBy(-350, 0);
}
function scrollRCAT4(){
  var right = document.querySelector(".CAT4");
  right.scrollBy(350, 0);
}




// FUNCION MENU LATERAL PERFIL EN PANTALLA PEQUEÑA
function FuntionResize() {
  var widthBrowser = window.outerWidth;
  // var heightBrowser = window.outerHeight;
  
  if(widthBrowser < 600){
    let img_click = document.getElementById("img-click");
    img_click.setAttribute("onclick", "mostrarPerfil()");
  }
}
function mostrarPerfil(){
  var perfil = document.querySelector(".perfil");
  perfil.style.width = "100%";
  perfil.style.padding = "0";
  perfil.style.gap = "1.5em;"
  perfil.style.height= "120vh";

  var divFoto = document.querySelector(".divFoto");
  divFoto.style.height = "320px";
  divFoto.style.marginTop = "5%"

  var info = document.querySelector(".infoPerfil");
  info.style.display = "flex";
  info.style.justifyContent = "center";
  info.style.padding = "0";

  var datos = document.querySelector(".datos");
  datos.style.display = "flex";
  datos.style.flexDirection = "column";
  datos.style.alignItems = "center";

  var logros = document.querySelector(".divLogros");
  logros.style.display = "grid";
  logros.style.gridTemplateColumns = "40px 40px 40px 40px";
  logros.style.gridTemplateRows = "40px 40px 40px";
  logros.style.columnGap = "20px";
  logros.style.marginBottom = "30px";
  logros.style.marginTop = "0";

  var general = document.querySelector(".general");
  general.style.display = "none";

  var icono = document.createElement("span");
  var flex = document.querySelector(".perfil");
  flex.appendChild(icono);
  icono.style.position = "absolute";
  icono.style.width = "50px";
  icono.style.height = "50px";
  icono.style.right = "5px";
  icono.style.top = "5px";
  icono.style.backgroundColor = "transparent";
  icono.setAttribute("class", "bx bx-x");
  icono.setAttribute("id", "cruz");
  icono.style.color = "white";
  icono.style.fontSize = "3em";
  

  icono.addEventListener('click', () =>{
    var perfil = document.querySelector(".perfil");
    perfil.style.width = "20%";
    perfil.style.padding = "0";
    perfil.style.gap = "3em;";
    perfil.style.height= "100vh";

    var divFoto = document.querySelector(".divFoto");
    divFoto.style.height = "100px";
    divFoto.style.marginTop = "0"

    var info = document.querySelector(".infoPerfil");
    info.style.display = "none";

    var logros = document.querySelector(".divLogros");
    logros.style.display = "none";

    var general = document.querySelector(".general");
    general.style.display = "block";
    general.style.width = "80%";
    general.style.padding = "0";
    
    cruz.remove("#cruz");
  });
}




// Funcion javascript para redimensionar el perfil en pantalla grande

function FuntionResize2() {
  var widthBrowser = window.outerWidth;
  if(widthBrowser > 600){
    let img_click = document.getElementById("img-click");
    img_click.setAttribute("onclick", "mostrarPerfil2()");
  }
}

function mostrarperfil2(){
  
  var perfil = document.querySelector(".perfil");
    perfil.style.padding = "4rem 0 !important";
    perfil.style.height= "120vh";

    var divFoto = document.querySelector(".divFoto");
    divFoto.style.height = "200px";
    divFoto.style.marginTop = "25%";

    var info = document.querySelector(".infoPerfil");
    info.style.display = "flex";
    info.style.justifyContent = "center";
    info.style.padding = "2rem";

    var datos = document.querySelector(".datos");
    datos.style.display = "flex";
    datos.style.flexDirection = "column";
    datos.style.alignItems = "center";

    var logros = document.querySelector(".divLogros");
    logros.style.display = "grid";
    logros.style.gridTemplateColumns = "40px 40px 40px 40px";
    logros.style.gridTemplateRows = "40px 40px 40px";
    logros.style.columnGap = "20px";
    logros.style.marginBottom = "30px";
    logros.style.marginTop = "0";

  
  // var perfil = document.querySelector(".perfil");
  // perfil.style.width = "20%";
  // perfil.style.padding = "4rem 0";
  // perfil.style.gap = "3rem;"
  // perfil.style.height= "120vh";

  // var divFoto = document.querySelector(".divFoto");
  // divFoto.style.height = "200px";
  // divFoto.style.marginTop = "5%";

  // var info = document.querySelector(".infoPerfil");
  // info.style.display = "flex";
  // info.style.justifyContent = "center";
  // info.style.padding = "2rem";

  // var datos = document.querySelector(".datos");
  // datos.style.display = "flex";
  // datos.style.flexDirection = "column";
  // datos.style.alignItems = "center";

  // var logros = document.querySelector(".divLogros");
  // logros.style.display = "grid";
  // logros.style.gridTemplateColumns = "40px 40px 40px 40px";
  // logros.style.gridTemplateRows = "40px 40px 40px";
  // logros.style.columnGap = "20px";
  // logros.style.marginBottom = "30px";
  // logros.style.marginTop = "0";

  // var general = document.querySelector(".general");
  // general.style.display = "flex";

  // var icono = document.createElement("span");
  // var flex = document.querySelector(".perfil");
  // flex.appendChild(icono);
  // icono.style.position = "absolute";
  // icono.style.width = "50px";
  // icono.style.height = "50px";
  // icono.style.right = "5px";
  // icono.style.top = "5px";
  // icono.style.backgroundColor = "transparent";
  // icono.setAttribute("class", "bx bx-x");
  // icono.setAttribute("id", "cruz");
  // icono.style.color = "white";
  // icono.style.fontSize = "3em";
  

  // icono.addEventListener('click', () =>{
  //   var perfil = document.querySelector(".perfil");
  //   perfil.style.width = "20%";
  //   perfil.style.padding = "0";
  //   perfil.style.gap = "3em;";
  //   perfil.style.height= "100vh";

  //   var divFoto = document.querySelector(".divFoto");
  //   divFoto.style.height = "100px";
  //   divFoto.style.marginTop = "0"

  //   var info = document.querySelector(".infoPerfil");
  //   info.style.display = "none";

  //   var logros = document.querySelector(".divLogros");
  //   logros.style.display = "none";

  //   var general = document.querySelector(".general");
  //   general.style.display = "block";
  //   general.style.width = "80%";
  //   general.style.padding = "0";
    
  //   cruz.remove("#cruz");
  // });
}