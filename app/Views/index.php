<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B4die</title>
    <link rel="icon" href="<?= base_url('img/icon-b4die.ico')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/css/ol.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= base_url('css/style.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/index.css')?>">
</head>
<body>
    <nav>
        <div class="nav-top">
            <div>
                <i class='bx bx-search-alt-2'></i>
                <i class='bx bxs-user-circle'></i>
            </div>
        </div>
        <div class="nav-bottom">
            <a href="<?= base_url()?>"><img src="<?= base_url('img/logo.png')?>"></a>
            <ul>
                <li><a href="#">Experiencias</a></li>
                <li><a href="<?=base_url().'/ranking'?>">Ranking</a></li>
                <li><a href="#">Mapa</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </div>
    </nav>

    <div class="slideshow-container">

        <div class="mySlides fade" id="slide-1">
        <div class="numbertext">1 / 3</div>
        <div class="text">Caption Text</div>
        </div>

        <div class="mySlides fade" id="slide-2">
        <div class="numbertext">2 / 3</div>
        <div class="text">Caption Two</div>
        </div>

        <div class="mySlides fade" id="slide-3">
        <div class="numbertext">3 / 3</div>
        <div class="text">Caption Three</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

    </div>

    <div class="container">
        <h2>Experiencias más visitadas</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium deleniti facere ut officia ea hic porro adipisci, nemo in vitae provident corrupti minima perferendis! Quia praesentium ab voluptatibus eveniet nam, repudiandae sint quaerat pariatur ducimus tempora dolorem ipsa doloremque neque animi illum, voluptatum possimus iure dolores! Vitae totam voluptas aliquam.</p>
        <div class="cards">
            <div class="card">
                <img src="<?= base_url('img/slider-surf.jpg')?>" alt="caida libre card">
                <span class="card-title">Card Title</span>
                <span>More details about card</span>
                <span>Even more details about the card</span>
                <a href="#">View details</a>
                <span class="new">new</span>
            </div>

            <div class="card">
                <img src="<?= base_url('img/caida-libre.jpg')?>" alt="caida libre card">
                <span class="card-title">Card Title</span>
                <span>More details about card</span>
                <span>Even more details about the card</span>
                <a href="#">View details</a>
                <span class="new">new</span>
            </div>

            <div class="card">
                <img src="<?= base_url('img/kart.jpg')?>" alt="caida libre card">
                <span class="card-title">Card Title</span>
                <span>More details about card</span>
                <span>Even more details about the card</span>
                <a href="#">View details</a>
                <span class="new">new</span>
            </div>

            <div class="card">
                <img src="<?= base_url('img/caida-libre.jpg')?>" alt="caida libre card">
                <span class="card-title">Card Title</span>
                <span>More details about card</span>
                <span>Even more details about the card</span>
                <a href="#">View details</a>
                <span class="new">new</span>
            </div>

            <div class="card">
                <img src="<?= base_url('img/slider-surf.jpg')?>" alt="caida libre card">
                <span class="card-title">Card Title</span>
                <span>More details about card</span>
                <span>Even more details about the card</span>
                <a href="#">View details</a>
                <span class="new">new</span>
            </div>

            <div class="card">
                <img src="<?= base_url('img/caida-libre.jpg')?>" alt="caida libre card">
                <span class="card-title">Card Title</span>
                <span>More details about card</span>
                <span>Even more details about the card</span>
                <a href="#">View details</a>
                <span class="new">new</span>
            </div>

            <div class="card">
                <img src="<?= base_url('img/caida-libre.jpg')?>" alt="caida libre card">
                <span class="card-title">Card Title</span>
                <span>More details about card</span>
                <span>Even more details about the card</span>
                <a href="#">View details</a>
                <span class="new">new</span>
            </div>

            <div class="card">
                <img src="<?= base_url('img/caida-libre.jpg')?>" alt="caida libre card">
                <span class="card-title">Card Title</span>
                <span>More details about card</span>
                <span>Even more details about the card</span>
                <a href="#">View details</a>
                <span class="new">new</span>
            </div>
        </div>
    </div>

    <div class="container">
        <h2>Buscador de actividades</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime quas itaque delectus nostrum fugit ut, id nisi at, natus doloribus aspernatur ipsum officiis vero dignissimos, quasi voluptatibus ea obcaecati vitae!</p>
        <div class="buscador" style="background-color: #202935;">
            <div style="background-color: #fff;">
                <button>Busca</button>
            </div>
            <div id="map" class="map">

            </div>
        </div>
    </div>

    
    <!-- Animación Sliders -->
    <script>
        let slideIndex = 1;
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
        let dots = document.getElementsByClassName("dot");
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
        showSlides(1);

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
        var long = localStorage.getItem('long');
        var lat = localStorage.getItem('lat');
        var posicion1 = { "longitud": long.toString(), "latitud": lat.toString(), "foto": "img/mark.png" };
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
    getMap();
    </script>
</body>
</html>