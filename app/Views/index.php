<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B4die</title>
    <link rel="icon" href="<?= base_url('img/logo.png')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/css/ol.css" type="text/css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= base_url('css/index.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css')?>">
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>
    <script src="<?=  base_url('js/js.js')?>"></script>
</head>
<body onload="getLocation()">
    <nav>
        <div class="nav-top">
            <div id="search">
                <form action="" role="search" id="searchform">
                    <label for="s">
                        <i class='bx bx-search-alt-2'></i>
                    </label>
                    <input type="text" placeholder="Buscar" id="s" />
                </form>
            </div>
            <div class="dropdown-user">
                <i class='bx bxs-user-circle dropbtn-user'></i>
                <div class="dropdown-content-user">
                    <a href="#">Registrate</a>
                    <a href="#">Inicia Sesión</a>
                    <hr>
                    <a href="#">Ayuda</a>
                </div>
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
                <li><a href="#jsModal" id="popup" class="jsModalTrigger">Contacto</a></li>
            </ul>
        </div>
    </nav>

    <!-- Modal -->
    <div id="jsModal" class="modal">
    <div class="modal__overlay jsOverlay"></div>
    <div class="modal__container">
        <form action="" method="post">
            <h3>Contáctanos</h3>
            <input type="text" name="Email" id="Email" placeholder="Email">
            <input type="text" name="Asunto" id="Asunto" placeholder="Asunto">
            <label for="msj"><i class='bx bx-envelope'></i> Mensaje</label>
            <textarea name="msj" id="msj" cols="30" rows="10"></textarea>
            <input type="submit" value="Enviar mensaje" name="submit">
        </form>
        <button class="modal__close jsModalClose"><i class='bx bx-x-circle' style='color:#feaf26'  ></i></button>
    </div>
    </div>

    <div class="slideshow-container">

        <div class="mySlides fade" id="slide-1">
            <div class="jumbo-slider">
                <span>Lorem, ipsum.</span>
                <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, rem!</span>
                <a href="#"><button>Ir</button></a>
            </div>
        </div>

        <div class="mySlides fade" id="slide-2">
            <div class="jumbo-slider">
                <span>Lorem, ipsum.</span>
                <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, rem!</span>
                <a href="#"><button>Ir</button></a>
            </div>
        </div>

        <div class="mySlides fade" id="slide-3">
            <div class="jumbo-slider">
                <span>Lorem, ipsum.</span>
                <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, rem!</span>
                <a href="#"><button>Ir</button></a>
            </div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

    </div>

    <div class="container">
        <h2>Experiencias más visitadas</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium deleniti facere ut officia ea hic porro adipisci, nemo in vitae provident corrupti minima perferendis! Quia praesentium ab voluptatibus eveniet nam, repudiandae sint quaerat pariatur ducimus tempora dolorem ipsa doloremque neque animi illum, voluptatum possimus iure dolores! Vitae totam voluptas aliquam.</p>
        
        <div class="cards">
            <?php foreach ($activitat as $key => $value) {
            echo "
            <div class='card'>
                <img src='data:".$value['tipo_img'].";base64,".base64_encode($value['img'])."'/>
                <span class='card-title'>".$value['nom']."</span>
                <span>".$value['descripcio']."</span>
                <span>".$value['categoria']."</span>
                <a href='#'>Ver más</a>
                <span class='new'><i class='bx bxs-bookmark-heart' ></i></span>
            </div>
            ";
            }?>

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

    <div class="container" id="div-buscador">
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

    

    <div class="container">
        <h2>¿No está tu experiencia deseada?</h2>
        <div class="container2">
            <div class="idea">
            <img src="<?= base_url('img/idea.jpg')?>" alt="">
            </div>
            <div class="texto-idea">
                <div class="jumbotron">
                    <span>Lorem, ipsum. Lorem, ipsum dolor.</span>
                    <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio, rem!</span>
                    <a href="#"><button>Ir</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="logo-footer">
            <a href="<?= base_url()?>"><img src="<?= base_url('img/logo.png')?>" class="logo"></a>
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
    
    <!-- JS -->
    <script  type="text/javascript">
        window.onload = function(){
            showSlides(1);
            getMap();
            modal();
        }
       
    </script>
</body>
</html>