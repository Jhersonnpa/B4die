<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B4die - Jhersonnpa</title>
    
    <link rel="icon" href="<?= base_url('img/icon-b4die.ico')?>">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= base_url('css/style.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/perfil.css')?>">
    <script src="<?= base_url('js/js.js')?>"></script>
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
            <a href="<?= base_url()?>" target="__blank"><img src="<?= base_url('img/logo.png')?>"></a>
            <ul>
                <li><a href="#" target="__blank">Experiencias</a></li>
                <li><a href="<?=base_url().'/ranking'?>">Ranking</a></li>
                <li><a href="#" target="__blank">Mapa</a></li>
                <li><a href="#" target="__blank">Contacto</a></li>
            </ul>
        </div>
    </nav>
    
    <div class="flex">
        <div class="perfil">
            <img src="<?= base_url('img/foto1.jpg')?>" alt="Imagen perfil" class="fotoPerfil">
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
                <div class="cartitasGuardadas">
                    <div class="cartitaSaved"></div>
                    <div class="cartitaSaved"></div>
                    <div class="cartitaSaved"></div>

                    <a class="prev" onclick="arrow(-1)">❮</a>
                    <a class="next" onclick="arrow(1)">❯</a>
                </div>
            </section>
            
            <section id="realizadas">
                <h2>Realizadas</h2>
                <div class="cartitasRealizadas">

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



</body>
</html>