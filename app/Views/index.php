<?php $session = session();?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B4die - Home</title>
    <link rel="icon" href="<?= base_url('img/logo.png')?>">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url('css/index.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css')?>">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
                    <input type="text" placeholder="Busca tu experiencia" id="s"/>
                </form>
            </div>
            <div class="dropdown-user">
                <?php 
                    if ($session->logged_in == false) {
                        echo "<a href='". base_url('/login')."'><i class='bx bxs-user-circle dropbtn-user'></i></a>";
                    }else {
                        echo "<a href='". base_url('/perfil')."'><div class='divRedondo'><img class='redondita' src='data:".$session->tipo_img.";base64,".base64_encode($session->img)."'/></div></a>";
                    }
                ?>
                <?php
                
                if(isset($session->nom_usuari)){
                    echo "<a href='". base_url('/perfil')."' class='nomUsu'>Hola, ".$session->nom_usuari ."</a>";
                }
                else {
                    echo "<a href='". base_url('/login')."' class='nomUsu'>Usuario</a>";
                }
                ?>
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
                        <a href="<?= base_url().'/experiencias'?>" id="experiencias" class="dropbtn menu-link">Experiencias <i class='bx bxs-chevron-down'></i></a>
                        <div class="dropdown-content" id="nav-experiencias">
                                <div class="transparent"></div>
                                <div class="nav-experiencias">
                                    <ul>
                                        <li><a href="<?= base_url('/categoria').'?id=1'?>" class="subcategoria">aérea</a></li>
                                        <?php
                                        foreach ($aerea as $key => $value) {
                                            echo "<li><a href='".base_url('/subcategoria').'?id='.$value['id']."'>".$value['nom']."</a></li>";
                                        }
                                        ?>
                                    </ul>
                                    <ul>
                                        <li><a href="<?= base_url('/categoria').'?id=2'?>" class="subcategoria">terrestre</a></li>
                                        <?php
                                        foreach ($terrestre as $key => $value) {
                                            echo "<li><a href='".base_url('/subcategoria').'?id='.$value['id']."'>".$value['nom']."</a></li>";
                                        }
                                        ?>
                                    </ul>
                                    <ul>
                                        <li><a href="<?= base_url('/categoria').'?id=3'?>" class="subcategoria">acuática</a></li>
                                        <?php
                                        foreach ($acuatica as $key => $value) {
                                            echo "<li><a href='".base_url('/subcategoria').'?id='.$value['id']."'>".$value['nom']."</a></li>";
                                        }
                                        ?>
                                    </ul>
                                    <ul>
                                        <li><a href="<?= base_url('/categoria').'?id=4'?>" class="subcategoria">viajes</a></li>
                                        <?php
                                        foreach ($viajes as $key => $value) {
                                            echo "<li><a href='".base_url('/subcategoria').'?id='.$value['id']."'>".$value['nom']."</a></li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                        </div>
                    </li>
                    <li class="menu-item"><a href="<?=base_url().'/ranking'?>" class="menu-link">Ranking</a></li>
                    <li class="menu-item"><a href="#jsModal" id="popup" class="jsModalTrigger menu-link">Contacto</a></li>
                    <?php 
                    if ($session->tipo_usuari > 0) {
                        echo "<li class='menu-item'><a href='".base_url('/admin')."' class='menu-link'>Admin</a></li>";
                    }
                    if ($session->logged_in == true) {
                        echo "<li class='menu-item'><a href='".base_url('/logout')."' class='menu-link'>Cerrar sesión<i class='bx bx-log-out' ></i></a></li>";
                    }
                    ?>
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

    <div class="slideshow-container">

        <div class="mySlides fade" id="slide-1">
            <div class="jumbo-slider">
            <span>Viaja por todo el mundo</span>
                <span>Visita los lugares más increíbles e inéditos de este planeta.</span>
                <a href="<?= base_url('/categoria').'?id=1'?>"><button>Ver actividades</button></a>
            </div>
        </div>

        <div class="mySlides fade" id="slide-2">
            <div class="jumbo-slider">
                <span>Actividades emocionantes</span>
                <span>¡Realiza actividades increíbles mientras te das un chapuzón!</span>
                <a href="<?= base_url('/categoria').'?id=2'?>"><button>Ver actividades</button></a>
            </div>
        </div>

        <div class="mySlides fade" id="slide-3">
            <div class="jumbo-slider">
                <span>Adrenalina en estado puro</span>
                <span>¡Siente la emoción recorriendo por tus venas al estar por los aires!</span>
                <a href="<?= base_url('/categoria').'?id=3'?>"><button>Ver actividades</button></a>
            </div>
        </div>

        <div class="mySlides fade" id="slide-4">
            <div class="jumbo-slider">
            <span>Experiencias inolvidables</span>
                <span>¿Quieres vivir experiencias terrestres que te dejaran con la boca abierta?</span>
                <a href="<?= base_url('/categoria').'?id=4'?>"><button>Ver actividades</button></a>
            </div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>

    <div class="container">
        <h2>Experiencias más visitadas</h2>
        <p>Estas són las experiencias más visitadas por los usuarios. Echales un vistazo y guardate las que más te gusten para hacerlas en un futuro.</p>
        
        <div class="cards">
            <?php foreach ($activitat as $key => $value) {
            echo "
            
            <div class='card'>
                <a href='".base_url('/experiencia?id='.$value['id'])."' target='_blank'>
                    <img src='data:".$value['tipo_img'].";base64,".base64_encode($value['img'])."'/>
                    <div class='containerInfo'>
                        <span class='card-title'>".$value['nom']."</span>
                        <div class='tamañoLetra'>
                            <span>".$value['categoria']."</span>
                            <span>".$value['pais']."</span>
                            <span >".$value['subcategoria']."</span>
                            <span>Precio: ".$value['precio']." €</span>
                        </div>
                    </div>
                    <span class='new'><i class='bx bxs-bookmark-heart' ></i></span>
                </a>
            </div>
            
            ";
            }?>
        </div>
    </div>

    <div class="container">
        <h2>Compite con los demás usuarios y consigue premios!</h2>
        <div class="container2">
            <div class="idea">
                <img src="<?= base_url('img/campeon.jpg')?>" alt="campeon ranking" class="imagen-contacto">
            </div>
            <div class="texto-idea">
                <div class="jumbotron">
                    <span>Si quieres entrar en nuestro sistema de ranking y llevarte extraordinarios premios unéte a nuestra comunidad!</span>
                    <a href="<?= base_url('/login')?>"><button>Unete!</button></a>
                </div>
            </div>
            
        </div>
    </div>

    <div class="container">
        <h2>¿No está tu experiencia deseada?</h2>
        <div class="container2">
            <div class="idea">
                <img src="<?= base_url('img/idea.jpg')?>" alt="idea" class="imagen-contacto">
            </div>
            <div class="texto-idea">
                <div class="jumbotron">
                    <span>Si crees que falta alguna experiencia en nuestra web, puedes sugerirnosla aqui!</span>
                    
                    <a href="#mySizeChartModal" id="mySizeChart"><button>Enviar sugerencia</button></a>
                    
                    <div id="mySizeChartModal" class="ebcf_modal">
                        <div class="ebcf_modal-content">
                            <span class="ebcf_close">&times;</span>
                            <form action='#' method='post' enctype='multipart/form-data' class="form">
                                <?= csrf_field() ?>
                                    <label for="nom">Nom</label>
                                        <input type="text" name="nom" id="nom" placeholder="Nombre actividad">
                                    
                                    <label for="descripcio">Descripción</label>    
                                        <textarea name="descripcio" id="descripcio" placeholder="Descripción de la actividad"></textarea>

                                    <button type="submit">Enivar propuesta</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="logo-footer">
            <a href="<?= base_url()?>"><img src="<?= base_url('img/logo.png')?>" class="logo"></a>
        </div>
        <div>
        <p style="color: #fff;">&copy; 2022 Jherson & Marc | Todos los derechos reservados.</p>
        </div>
        <div class="media-footer">
            <!-- <div>
                <a href="#"><i class='bx bxl-instagram' id="insta"></i></a>
                <a href="#"><i class='bx bxl-facebook-square' style="color: #1A6ED8;"></i></a>
            </div> -->
            <div>
                <a href="#"><i class='bx bxs-up-arrow-square' ></i></a>
            </div>
        </div>
    </footer>
    
    <!-- JS -->
    <script  type="text/javascript">
        window.onload = function(){
            showSlides(1);
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


        // Modal ADD
        // Get the modal
        var ebModal = document.getElementById('mySizeChartModal');

        // Get the button that opens the modal
        var ebBtn = document.getElementById("mySizeChart");

        // Get the <span> element that closes the modal
        var ebSpan = document.getElementsByClassName("ebcf_close")[0];

        // When the user clicks the button, open the modal 
        ebBtn.onclick = function() {
            ebModal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        ebSpan.onclick = function() {
            ebModal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == ebModal) {
                ebModal.style.display = "none";
            }
        }

    </script>
    <!-- Google Maps -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>