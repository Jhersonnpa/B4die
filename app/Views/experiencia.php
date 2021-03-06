<?php $session = session();?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B4die - <?= $experiencia['nom']?></title>
    <link rel="icon" href="<?= base_url('img/logo.png')?>">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url('css/experiencia.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css')?>">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?=  base_url('js/js.js')?>"></script>
</head>
<body onload="getLocation()">
    <nav class="navbar">
        <div class="nav-top">
            <div id="search">
                <form action="<?= base_url('/buscador')?>" method="POST" role="search" id="searchform">
                    <label for="s">
                        <i class='bx bx-search-alt-2'></i>
                    </label>
                    <input type="text" placeholder="Busca tu experiencia" id="s" name="inputBuscador"/>
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
                                        <li><a href="<?= base_url('/categoria').'?id=1'?>" class="subcategoria">a??rea</a></li>
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
                                        <li><a href="<?= base_url('/categoria').'?id=3'?>" class="subcategoria">acu??tica</a></li>
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
                        echo "<li class='menu-item'><a href='".base_url('/logout')."' class='menu-link'>Cerrar sesi??n<i class='bx bx-log-out' ></i></a></li>";
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
            <h3>Cont??ctanos</h3>
            <input type="text" name="Email" id="Email" placeholder="Email">
            <input type="text" name="Asunto" id="Asunto" placeholder="Asunto">
            <label for="msj"><i class='bx bx-envelope'></i> Mensaje</label>
            <textarea name="msj" id="msj" cols="30" rows="10"></textarea>
            <input type="submit" value="Enviar mensaje" name="submit">
        </form>
        <button class="modal__close jsModalClose"><i class='bx bx-x-circle' style='color:#feaf26'  ></i></button>
    </div>
    </div>

<section id="expe">
    <h2>Experiencia</h2> 
        <input type="hidden" id="long" value="<?= $experiencia['longitud']=isset($experiencia['longitud'])? $experiencia['longitud']:"";?>">
        <input type="hidden" id="lat" value="<?= $experiencia['latitud']=isset($experiencia['latitud'])? $experiencia['latitud']:"";?>">
        <div class="card">
            <?= "<img src='data:".$experiencia['tipo_img'].";base64,".base64_encode($experiencia['img'])."' class='img'/>"?>
                <div class="flexbox">
                    <span class="card-title"><?php $experiencia['nom']=isset($experiencia['nom'])? $experiencia['nom']:"Card title"; echo $experiencia['nom'];?></span>
                    
                    <div class="info">
                        <span class="colorCat">Categoria: <span class="nomCat"><?php $experiencia['categoria']=isset($experiencia['categoria'])? $experiencia['categoria']:"Category of the activity"; echo $experiencia['categoria'];?></span></span>
                        
                        <span class="bold">Subcategoria: <span class="nomCat"><?php $experiencia['subcategoria']=isset($experiencia['subcategoria'])? $experiencia['subcategoria']:"Subcategory of the activity"; echo $experiencia['subcategoria'];?></span></span>

                        <span class="bold">Descripci??n: <span class="nomCat"><?php $experiencia['descripcio']=isset($experiencia['descripcio'])? $experiencia['descripcio']:"Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio maxime architecto nemo quibusdam neque voluptatum commodi magnam nulla vero. Hic, voluptates fugiat. Sunt, quaerat quis inventore deserunt velit aliquid! Dolorem?"; echo $experiencia['descripcio'];?></span></span>
                        
                        <span class="bold">Pa??s: <span class="nomCat"><?php $experiencia['pais']=isset($experiencia['pais'])? $experiencia['pais']:"Country of the activity"; echo $experiencia['pais'];?></span></span>

                        <span class="bold">Ciudad: <span class="nomCat"><?php $experiencia['ciutat']=isset($experiencia['ciutat'])? $experiencia['ciutat']:"City of the activity"; echo $experiencia['ciutat'];?></span></span>

                        <span class="bold">Precio: <span class="nomCat"><?php $experiencia['precio']=isset($experiencia['precio'])? $experiencia['precio']:"Price of the activity"; echo $experiencia['precio'];?> ???</span></span>

                        <span class="bold">URL: <span class="nomCat"><?php $experiencia['url_empresa']=isset($experiencia['url_empresa'])? $experiencia['url_empresa']:"URL of the activity"; echo "<a href='$experiencia[url_empresa]'>" . $experiencia['url_empresa']."</a>";?></span></span>
                        
                        <span class="new">new</span>
                </div>
                </div>
                
        </div> 

</section>

<section id="mapa">
    <h2>Ubicaci??n de la actividad</h2>            
    <div id="map" class="map"></div>
</section>




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
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfkONw5olbb8Rpc6wg9_CPshlXTVmOMug&callback=initMap">
    </script>

    <script  type="text/javascript">
        window.onload = function(){
            initMap();
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