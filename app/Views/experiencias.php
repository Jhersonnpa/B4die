<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B4die - Experiencias</title>
    <link rel="icon" href="<?= base_url('img/logo.png')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/css/ol.css" type="text/css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= base_url('css/experiencias.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css')?>">
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
            <a href="<?= base_url()?>"><img src="<?= base_url('img/logo.png')?>" class="logo"></a>
            <ul class="navbar">
                <li class="dropdown">
                    <a href="<?= base_url().'/experiencias'?>" target="__blank" id="experiencias" class="dropbtn">Experiencias</a>
                    <div class="dropdown-content" id="nav-experiencias">
                        <div class="transparent"></div>
                        <div class="nav-experiencias">
                            <ul>
                                <li><a href="#" class="subcategoria">aereo</a></li>
                                <li><a href="#">Paracaidismo</a></li>
                                <li><a href="#">Aeromodelismo</a></li>
                                <li><a href="#">Ala delta</a></li>
                                <li><a href="#">Parapente</a></li>
                                <li><a href="#">Acrobacia aérea</a></li>
                                <li><a href="#">Parafoil</a></li>
                                <li><a href="#">Parasailing</a></li>
                                <li><a href="#">Globo aeroestatico</a></li>
                                <li><a href="#">Wingfly</a></li>
                                <li><a href="#">Salto base</a></li>
                                <li><a href="#">Puenting</a></li>
                                <li><a href="#">Vuelta en Helicóptero</a></li>
                            </ul>
                            <ul>
                                <li><a href="#" class="subcategoria">terrestre</a></li>
                                <li><a href="#">Senderismo</a></li>
                                <li><a href="#">Alpinismo</a></li>
                                <li><a href="#">Rapel</a></li>
                                <li><a href="#">Escalada</a></li>
                                <li><a href="#">Parkour</a></li>
                                <li><a href="#">Zorbing</a></li>
                                <li><a href="#">Bubble Football</a></li>
                                <li><a href="#">Tobogan Alpino</a></li>
                                <li><a href="#">Esquí / Snow (Heliesquí)</a></li>
                                <li><a href="#">Street Luge</a></li>
                                <li><a href="#">Slackline</a></li>
                                <li><a href="#">Tirolina</a></li>
                            </ul>
                            <ul>
                                <li><a href="#" class="subcategoria">acuatico</a></li>
                                <li><a href="#">Surf</a></li>
                                <li><a href="#">Kitesurf</a></li>
                                <li><a href="#">Wakesurf</a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                            </ul>
                            <ul>
                                <li><a href="#" class="subcategoria">viajes</a></li>
                                <li><a href="#">culo</a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li><a href="<?=base_url().'/ranking'?>" target="__blank">Ranking</a></li>
                <li><a href="#" target="__blank">Mapa</a></li>
                <li><a href="#" class="btn" id="btn-modal">Contacto</a></li>
            </ul>
        </div>
    </nav>
    
<section id="scroll">
    <h2>Experiencias</h2>   
        <div class="main-scroll-div">
            <div>
                <button class="icon icon-left" onclick="scrollL()"><i class='bx bx-chevron-left'></i></button>
            </div>
                <div class="cover">
                    <div class="scroll-cartitas snaps-inline">
                        <div class="child">
                            <div class="card">
                                <img src="<?= base_url('img/caida-libre.jpg')?>" alt="caida libre card">
                                <span class="card-title">Card Title</span>
                                <span>More details about card</span>
                                <span>Even more details about the card</span>
                                <a href="#">View details</a>
                                <span class="new">new</span>
                            </div>
                        </div>
                        <div class="child">
                            <div class="card">
                                <img src="<?= base_url('img/slider-surf.jpg')?>" alt="caida libre card">
                                <span class="card-title">Card Title</span>
                                <span>More details about card</span>
                                <span>Even more details about the card</span>
                                <a href="#">View details</a>
                                <span class="new">new</span>
                            </div>
                        </div>
                        <div class="child">
                            <div class="card">
                                <img src="<?= base_url('img/caida-libre.jpg')?>" alt="caida libre card">
                                <span class="card-title">Card Title</span>
                                <span>More details about card</span>
                                <span>Even more details about the card</span>
                                <a href="#">View details</a>
                                <span class="new">new</span>
                            </div>
                        </div>
                        <div class="child">
                            <div class="card">
                                <img src="<?= base_url('img/slider-surf.jpg')?>" alt="caida libre card">
                                <span class="card-title">Card Title</span>
                                <span>More details about card</span>
                                <span>Even more details about the card</span>
                                <a href="#">View details</a>
                                <span class="new">new</span>
                            </div>
                        </div>
                        <div class="child">
                            <div class="card">
                                <img src="<?= base_url('img/caida-libre.jpg')?>" alt="caida libre card">
                                <span class="card-title">Card Title</span>
                                <span>More details about card</span>
                                <span>Even more details about the card</span>
                                <a href="#">View details</a>
                                <span class="new">new</span>
                            </div>
                        </div>
                        <div class="child">
                            <div class="card">
                                <img src="<?= base_url('img/slider-surf.jpg')?>" alt="caida libre card">
                                <span class="card-title">Card Title</span>
                                <span>More details about card</span>
                                <span>Even more details about the card</span>
                                <a href="#">View details</a>
                                <span class="new">new</span>
                            </div>
                        </div>
                        <div class="child">
                            <div class="card">
                                <img src="<?= base_url('img/caida-libre.jpg')?>" alt="caida libre card">
                                <span class="card-title">Card Title</span>
                                <span>More details about card</span>
                                <span>Even more details about the card</span>
                                <a href="#">View details</a>
                                <span class="new">new</span>
                            </div>
                        </div>
                        <div class="child">
                            <div class="card">
                                <img src="<?= base_url('img/slider-surf.jpg')?>" alt="caida libre card">
                                <span class="card-title">Card Title</span>
                                <span>More details about card</span>
                                <span>Even more details about the card</span>
                                <a href="#">View details</a>
                                <span class="new">new</span>
                            </div>
                        </div>
                        <div class="child">
                            <div class="card">
                                <img src="<?= base_url('img/caida-libre.jpg')?>" alt="caida libre card">
                                <span class="card-title">Card Title</span>
                                <span>More details about card</span>
                                <span>Even more details about the card</span>
                                <a href="#">View details</a>
                                <span class="new">new</span>
                            </div>
                        </div>
                        <div class="child">
                            <div class="card">
                                <img src="<?= base_url('img/slider-surf.jpg')?>" alt="caida libre card">
                                <span class="card-title">Card Title</span>
                                <span>More details about card</span>
                                <span>Even more details about the card</span>
                                <a href="#">View details</a>
                                <span class="new">new</span>
                            </div>
                        </div>
                    </div>
                </div>
            <div>
                <button class="icon icon-right" onclick="scrollR()"><i class='bx bx-chevron-right'></i></button>
            </div>
        </div>

</section>

<section id="mapa">
    <h2>Mapa</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium deleniti facere ut officia ea hic porro adipisci, nemo in vitae provident corrupti minima perferendis! Quia praesentium ab voluptatibus eveniet nam, repudiandae sint quaerat pariatur ducimus tempora dolorem ipsa doloremque neque animi illum, voluptatum possimus iure dolores! Vitae totam voluptas aliquam.</p>
            
    <div id="map" class="map"></div>
</section>



<!-- Footer -->
<footer>
    <div class="logo-footer">
        <a href="<?= base_url()?>"><img src="<?= base_url('img/logo.png')?>"></a>
        <p>&copy;</p>
    </div>
    <ul>
        <li><a href="#">Sobre nosotros</a></li>
        <li><a href="#">Terminos de privacidad</a></li>
        <li><a href="#">Ayuda</a></li>
    </ul>
    <div class="media-footer">
        <div>
            <a href="#"><i class='bx bxl-instagram' id="insta"></i></a>
            <a href="#"><i class='bx bxl-facebook-square' style="color: #1A6ED8;"></i></a>
        </div>
        <div>
            <a href="#"><i class='bx bxs-up-arrow-square' ></i></a>
        </div>
    </div>
</footer>

<!-- JAVASCRIPT -->
<script  type="text/javascript">
        window.onload = function(){
            getMap();
        }
</script>


</body>
</html>