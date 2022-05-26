<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B4die - Ranking</title>
    
    <link rel="icon" href="<?= base_url('img/icon-b4die.ico')?>">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= base_url('css/style.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/ranking.css')?>">
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

    <div class="container">
        <h1 class="header-ranking">Ranking Global</h1>

        <div class="cartaTop1">
            <div class="crown"><i class='bx bxs-crown'></i></div>
            <img class="img-top1" src="<?= base_url('img/foto1.jpg')?>" alt="Imagen usuario en primer lugar">
            <div class="divInfoTop1">
                <p class="username1"><b>Jhersonnpa</b></p>
                <div class="divRango"><img src="<?= base_url('img/rango.png')?>" alt="rango" class="logoRango"><p class="textoRango">Leyenda</p></div>
                <p class="tituloExpeTop"><b>Experiencia top</b> <p class="nombreExpeTop">Salto en paracaidas</p></p>
            </div>
            <div class="divLogrosTop">
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