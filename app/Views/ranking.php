<?php $session = session();?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B4die</title>
    <link rel="icon" href="<?= base_url('img/logo.png')?>">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url('css/ranking.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css')?>">
    <script src="<?=  base_url('js/js.js')?>"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
                    echo '<span class="nomUsu">Usuario</span>';
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
                                        <li><a href="#" class="subcategoria">aerea</a></li>
                                        <?php
                                        foreach ($aerea as $key => $value) {
                                            echo "<li><a href='#'>".$value['nom']."</a></li>";
                                        }
                                        ?>
                                    </ul>
                                    <ul>
                                        <li><a href="#" class="subcategoria">terrestre</a></li>
                                        <?php
                                        foreach ($terrestre as $key => $value) {
                                            echo "<li><a href='#'>".$value['nom']."</a></li>";
                                        }
                                        ?>
                                    </ul>
                                    <ul>
                                        <li><a href="#" class="subcategoria">acuatica</a></li>
                                        <?php
                                        foreach ($acuatica as $key => $value) {
                                            echo "<li><a href='#'>".$value['nom']."</a></li>";
                                        }
                                        ?>
                                    </ul>
                                    <ul>
                                        <li><a href="#" class="subcategoria">viajes</a></li>
                                        <?php
                                        foreach ($viajes as $key => $value) {
                                            echo "<li><a href='#'>".$value['nom']."</a></li>";
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

    <div class="container">
        <h1 class="header-ranking">Ranking Global</h1>

        <?php 
        $top1 = $top[0];
        foreach ($top as $key => $value) {
            if ($key == 0) {
                echo "
                <a href='".base_url('/perfil?id='.$top[$key]['id'])."' class='color-text'>
                    <div class='cartaTop1'>
                        <div class='crown'><i class='bx bxs-crown'></i></div>
                        <img src='data:".$top[$key]['tipo_img'].";base64,".base64_encode($top[$key]['img'])."' class='img-top1' alt='Imagen usuario en primer lugar'/>
                        <div class='divInfoTop1'>
                            <p class='username1'><b>".$top[$key]['nom_usuari']."</b></p>
                            <div class='divRango'><img src='" .base_url('img/rango.png')."' alt='rango' class='logoRango'><p class='textoRango'>".$top[$key]['rango']."</p></div>
                            <p class='tituloExpeTop'><b>Puntuación</b> <p class='nombreExpeTop'>".$top[$key]['puntuacion']."</p></p>
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
                </a>
                ";
            }
        }
        ?>
        
        <div class="cartasTop">
        <?php
        foreach ($top as $key => $value) {
            if ($key >= 1 && $key <= 4) {
                echo "
                    <a href='".base_url('/perfil?id='.$top[$key]['id'])."' class='color-text'>
                        <div class='carta'>
                            <div class='nums'>".($key+1)."</div>
                            <img src='data:".$top[$key]['tipo_img'].";base64,".base64_encode($top[$key]['img'])."' class='imgPerfilTop'>
                            <div class='divInfoTops'>
                                <p class='username'>".$top[$key]['nom_usuari']."</p>
                                <div class='divRange'><img src='". base_url('img/rango.png')."' alt='rango' class='logoRange'><p class='textRange'>".$top[$key]['rango']."</p></div>
                                <p class='tituloExpe'><b>Puntuación</b> <p class='nombreExpe'>".$top[$key]['puntuacion']."</p></p>
                            </div>
                            <div class='divLogros'>
                                <img src='". base_url('img/rango.png')."' alt='logro1' class='logoLogros'>
                                <img src='". base_url('img/rango.png')."' alt='logro1' class='logoLogros'>
                                <img src='". base_url('img/rango.png')."' alt='logro1' class='logoLogros'>
                                <img src='". base_url('img/rango.png')."' alt='logro1' class='logoLogros'>
                            </div>
                        </div>
                    </a>
                ";
            }
        }
        ?>

        </div>


        <div class="tabla">
            <table class="table table-hover table-responsive" id="table_id">
                <thead>
                    <tr>
                        <th>Top</th>
                        <th>Usuario</th>
                        <th>Rango</th>
                        <th>Logros</th>
                        <th>Puntuación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($top as $key => $value) {
                        if ($key >= 5) {
                            echo "                            
                                <tr>
                                    <td class='bold'><a href='".base_url('/perfil?id='.$top[$key]['id'])."'>".($key+1)."</td>
                                    <td><a href='".base_url('/perfil?id='.$top[$key]['id'])."'>".$top[$key]['nom_usuari']."</a></td>
                                    <td><a href='".base_url('/perfil?id='.$top[$key]['id'])."'>".$top[$key]['rango']."</a></td>
                                    <td><a href='".base_url('/perfil?id='.$top[$key]['id'])."'><img src='". base_url('img/rango.png')."' alt='logro1' class='logoLogros'></a></td>
                                    <td><a href='".base_url('/perfil?id='.$top[$key]['id'])."'>".$top[$key]['puntuacion']."</a></td>
                                </tr>                            
                            ";
                        }
                    }
                    ?>
                </tbody>
            </table>
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

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
        </script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
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