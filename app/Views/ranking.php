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
    <link rel="stylesheet" href="<?= base_url('css/ranking.css')?>">
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

    <div class="container">
        <h1 class="header-ranking">Ranking Global</h1>

        <?php 
        $top1 = $top[0];
        echo "
        <div class='cartaTop1'>
            <div class='crown'><i class='bx bxs-crown'></i></div>
            <img class='img-top1' src='" .base_url('img/foto1.jpg')."' alt='Imagen usuario en primer lugar'>
            <div class='divInfoTop1'>
                <p class='username1'><b>".$top1['nom_usuari']."</b></p>
                <div class='divRango'><img src='" .base_url('img/rango.png')."' alt='rango' class='logoRango'><p class='textoRango'>Leyenda</p></div>
                <p class='tituloExpeTop'><b>Experiencia top</b> <p class='nombreExpeTop'>Salto en paracaidas</p></p>
            </div>
            <div class='divLogrosTop'>
                <img src='".base_url('img/rango.png')."' alt='logro1' class='logoLogros'>
                <img src='".base_url('img/rango.png')."' alt='logro1' class='logoLogros'>
                <img src='".base_url('img/rango.png')."' alt='logro1' class='logoLogros'>
                <img src='".base_url('img/rango.png')."' alt='logro1' class='logoLogros'>
                <img src='".base_url('img/rango.png')."' alt='logro1' class='logoLogros'>
                <img src='".base_url('img/rango.png')."' alt='logro1' class='logoLogros'>
                <img src='".base_url('img/rango.png')."' alt='logro1' class='logoLogros'>
                <img src='".base_url('img/rango.png')."' alt='logro1' class='logoLogros'>
                <img src='".base_url('img/rango.png')."' alt='logro1' class='logoLogros'>
                <img src='".base_url('img/rango.png')."' alt='logro1' class='logoLogros'>
                <img src='".base_url('img/rango.png')."' alt='logro1' class='logoLogros'>
                <img src='".base_url('img/rango.png')."' alt='logro1' class='logoLogros'>
            </div>
        </div>
        ";
        ?>

        <div class="cartasTop">
            <div class="carta">
                <div class="nums second">2</div>
                <img src="<?= base_url('img/foto1.jpg')?>" alt="" class="imgPerfilTop">
                <div class="divInfoTops">
                    <p class="username">MarcMuu</p>
                    <div class="divRange"><img src="<?= base_url('img/rango.png')?>" alt="rango" class="logoRange"><p class="textRange">Leyenda</p></div>
                    <p class="tituloExpe"><b>Experiencia top</b> <p class="nombreExpe">Moto acuatica</p></p>
                </div>
                <div class="divLogros">
                    <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                    <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                    <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                    <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                </div>
            </div>

            <div class="">
                <div class="nums third">3</div>
            </div>
            <div class="">
                <div class="nums">4</div>
            </div>
            <div class="">
                <div class="nums">5</div>
            </div>
        </div>


        <div class="tabla">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Rango</th>
                        <th>Logros</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="bold">6</td>
                        <td>Jhersonnpa</td>
                        <td>Leyenda</td>
                        <td>1 2 3 4 5</td>
                    </tr>

                    <tr>
                        <td class="bold">7</td>
                        <td>Marcmuu</td>
                        <td>Leyenda</td>
                        <td>6 7 8 9 10</td>
                    </tr>

                    <tr>
                        <td class="bold">8</td>
                        <td>Sabater</td>
                        <td>Pelele</td>
                        <td>1 2 3 4 5</td>
                    </tr>

                    <tr>
                        <td class="bold">9</td>
                        <td>Elhombre</td>
                        <td>pinpin</td>
                        <td>6 7 8 9 10</td>
                    </tr>

                    <tr>
                        <td class="bold">10</td>
                        <td>Freixes</td>
                        <td>tucan</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

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
   
</body>
</html>