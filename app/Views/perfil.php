<?php 
    // $session = session();
    // if ($session->logged_in == false) {
    //     $session->set('msg', 'No te has logueado');
    //     return redirect()->to('/');
    // }
?>
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
    <link rel="stylesheet" href="<?= base_url('css/perfil.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css')?>">
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>
    <script src="<?=  base_url('js/js.js')?>"></script>
</head>
<body onload="getLocation()">
<nav class="navbar">
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
                <a href="<?= base_url('/login')?>"><i class='bx bxs-user-circle dropbtn-user'></i></a>
                <!-- <div class="dropdown-content-user">
                    <a href="#">Registrate</a>
                    <a href="#">Inicia Sesión</a>
                    <hr>
                    <a href="#">Ayuda</a>
                </div> -->
            </div>
        </div>
        <div class="nav-bottom wrapper">
            <a href="<?= base_url()?>"><img src="<?= base_url('img/logo.png')?>" class="logo"></a>
            <!-- Res -->
            <button type="button" class="burger" id="burger">
            <i class='bx bx-menu'></i>
            </button>
            <div class="menu" id="menu">
                <ul class="menu-inner">
                    <li class="dropdown menu-item">
                        <a href="<?= base_url().'/experiencias'?>" id="experiencias" class="dropbtn menu-link">Experiencias</a>
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
                    <li class="menu-item"><a href="<?=base_url().'/ranking'?>" target="__blank" class="menu-link">Ranking</a></li>
                    <li class="menu-item"><a href="#jsModal" id="popup" class="jsModalTrigger menu-link">Contacto</a></li>
                </ul>
            </div>
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

    <div class="flex">
        <div class="perfil" id="perfil">
            <div class="divFoto">
                <img src="<?= base_url('img/MARC_MORELL.jpg')?>" alt="Imagen perfil" class="fotoPerfil" id="img-click" onclick="mostrarPerfil()">
            </div>
            <div class="infoPerfil">
                <div class="nombreUsuario">Jhersonnpa</div>
                <div class="datos">
                    <p class="nombre">Jherson</p>
                    <p class="apellidos">Navir Pabon</p>
                    <p class="edad">22</p>
                    <p class="direccion">Sabadell, España</p>
                </div>
                <div class="btn"><button class="btnEditar">EDITAR</button></div>
            </div>
            <div class="divLogros">
                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                
                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">

                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">

                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">

                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                <img src="<?= base_url('img/rango.png')?>" alt="logro1" class="logoLogros">
                
            </div>
        </div>


        <div class="general">
            <section id="guardadas">
                <h2>Guardadas</h2>
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
            
            <section id="realizadas">
                <h2>Realizadas</h2>
                    <div class="main-scroll-div">
                        <div>
                            <button class="icon icon-left2" onclick="scrollL2()"><i class='bx bx-chevron-left'></i></button>
                        </div>
                            <div class="cover">
                                <div class="scroll-cartitas2 snaps-inline">
                                    <div class="childLogros">
                                        <div class="card">
                                            <img src="<?= base_url('img/caida-libre.jpg')?>" alt="caida libre card">
                                            <span class="card-title">Card Title</span>
                                            <span>More details about card</span>
                                            <span>Even more details about the card</span>
                                            <a href="#">View details</a>
                                            <span class="new">new</span>
                                        </div>
                                    </div>
                                    <div class="childLogros">
                                        <div class="card">
                                            <img src="<?= base_url('img/slider-surf.jpg')?>" alt="caida libre card">
                                            <span class="card-title">Card Title</span>
                                            <span>More details about card</span>
                                            <span>Even more details about the card</span>
                                            <a href="#">View details</a>
                                            <span class="new">new</span>
                                        </div>
                                    </div>
                                    <div class="childLogros">
                                        <div class="card">
                                            <img src="<?= base_url('img/caida-libre.jpg')?>" alt="caida libre card">
                                            <span class="card-title">Card Title</span>
                                            <span>More details about card</span>
                                            <span>Even more details about the card</span>
                                            <a href="#">View details</a>
                                            <span class="new">new</span>
                                        </div>
                                    </div>
                                    <div class="childLogros">
                                        <div class="card">
                                            <img src="<?= base_url('img/slider-surf.jpg')?>" alt="caida libre card">
                                            <span class="card-title">Card Title</span>
                                            <span>More details about card</span>
                                            <span>Even more details about the card</span>
                                            <a href="#">View details</a>
                                            <span class="new">new</span>
                                        </div>
                                    </div>
                                    <div class="childLogros">
                                        <div class="card">
                                            <img src="<?= base_url('img/caida-libre.jpg')?>" alt="caida libre card">
                                            <span class="card-title">Card Title</span>
                                            <span>More details about card</span>
                                            <span>Even more details about the card</span>
                                            <a href="#">View details</a>
                                            <span class="new">new</span>
                                        </div>
                                    </div>
                                    <div class="childLogros">
                                        <div class="card">
                                            <img src="<?= base_url('img/slider-surf.jpg')?>" alt="caida libre card">
                                            <span class="card-title">Card Title</span>
                                            <span>More details about card</span>
                                            <span>Even more details about the card</span>
                                            <a href="#">View details</a>
                                            <span class="new">new</span>
                                        </div>
                                    </div>
                                    <div class="childLogros">
                                        <div class="card">
                                            <img src="<?= base_url('img/caida-libre.jpg')?>" alt="caida libre card">
                                            <span class="card-title">Card Title</span>
                                            <span>More details about card</span>
                                            <span>Even more details about the card</span>
                                            <a href="#">View details</a>
                                            <span class="new">new</span>
                                        </div>
                                    </div>
                                    <div class="childLogros">
                                        <div class="card">
                                            <img src="<?= base_url('img/slider-surf.jpg')?>" alt="caida libre card">
                                            <span class="card-title">Card Title</span>
                                            <span>More details about card</span>
                                            <span>Even more details about the card</span>
                                            <a href="#">View details</a>
                                            <span class="new">new</span>
                                        </div>
                                    </div>
                                    <div class="childLogros">
                                        <div class="card">
                                            <img src="<?= base_url('img/caida-libre.jpg')?>" alt="caida libre card">
                                            <span class="card-title">Card Title</span>
                                            <span>More details about card</span>
                                            <span>Even more details about the card</span>
                                            <a href="#">View details</a>
                                            <span class="new">new</span>
                                        </div>
                                    </div>
                                    <div class="childLogros">
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
                            <button class="icon icon-right2" onclick="scrollR2()"><i class='bx bx-chevron-right'></i></button>
                        </div>
                    </div>

            </section>
            
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

    <!-- JS -->
    <script  type="text/javascript">
        window.onload = function(){
            modal();
        }

        const burgerMenu = document.getElementById("burger");
        const navbarMenu = document.getElementById("menu");

        // Show and Hide Navbar Menu
        burgerMenu.addEventListener("click", () => {
            burgerMenu.classList.toggle("is-active");
            navbarMenu.classList.toggle("is-active");

            if (navbarMenu.classList.contains("is-active")) {
                navbarMenu.style.maxHeight = navbarMenu.scrollHeight + "px";
            } else {
                navbarMenu.removeAttribute("style");
            }
        });
       
    </script>

</body>
</html>