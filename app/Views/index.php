<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B4die</title>
    <link rel="icon" href="<?= base_url('img/icon-b4die.ico')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/css/ol.css" type="text/css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= base_url('css/style.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/index.css')?>">
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>
    <script src="<?=  base_url('js/js.js')?>"></script>
</head>
<body onload="getLocation()">
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
            <div class="jumbo-slider">
                <span>Lorem, ipsum.</span>
                <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, rem!</span>
                <button>Ir</button>
            </div>
        </div>

        <div class="mySlides fade" id="slide-2">
            <div class="jumbo-slider">
                <span>Lorem, ipsum.</span>
                <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, rem!</span>
                <button>Ir</button>
            </div>
        </div>

        <div class="mySlides fade" id="slide-3">
            <div class="jumbo-slider">
                <span>Lorem, ipsum.</span>
                <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, rem!</span>
                <button>Ir</button>
            </div>
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
            <div class="busca">
                <button>Busca</button>
            </div>
            <div id="map" class="map">
            </div>
        </div>
    </div>

    <div class="container2">
        <div class="idea">

        </div>
        <div class="texto-idea">
            <p>Hola</p>
        </div>
    </div>

    
    <!-- Animación Sliders -->
    <script  type="text/javascript">
        window.onload = function(){
            showSlides(1);
             getMap();
        }
       
    </script>
</body>
</html>