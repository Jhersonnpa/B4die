<?php $session = session();?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B4die - <?= $usuari['nom_usuari']?></title>
    <link rel="icon" href="<?= base_url('img/logo.png')?>">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url('css/perfil.css')?>">
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

    <div class="flex">
        <div class="perfil" id="perfil">
            <div class="divFoto">
                <?php echo "<img alt='Imagen perfil' class='fotoPerfil' id='img-click'  src='data:".$usuari['tipo_img'].";base64,".base64_encode($usuari['img'])."'/>"?>
            </div>
            <div class="infoPerfil">
                <div class="nombreUsuario"><?= $usuari['nom_usuari']?></div>
                <div class="datos">
                    <p class="nombre"><?= $usuari['nom']?>  <?= $usuari['cognom']?></p>
                    <p class="rango"><?= $usuari['rango']?></p>
                    <p class="edad"><?= $edad?> a??os</p>
                    <p class="pais"><?= $usuari['pais']?></p>
                    <p class="puntuacion">Puntuaci??n: <?= $usuari['puntuacion']?> pts</p>
                </div>
                <?php
                if ($usuari['id'] == $session->id) {
                    echo "<div class='btn'><button id='mySizeChart' class='btnEditar'>Editar Perfil</button></div>";
                    echo "
                    <div id='mySizeChartModal' class='ebcf_modal'>
                        <div class='ebcf_modal-content'>
                            <span class='ebcf_close'>&times;</span>
                            <form action='".base_url('/editarUser')."' method='post' enctype='multipart/form-data' class='formEditar'>
                            <?= csrf_field() ?>";
                                echo "<input type='hidden' name='id' value='".$usuari['id']."'/>";
                                if (!empty($validation)) {
                                    if ($validation->getError('email')) {
                                        echo $validation->getError('email');
                                    }    
                                }
                                echo"<label for='email'>Correo</label>";
                                echo "<input type='email' name='email' id='email' value='".$usuari['email']."'/>";
                                if (!empty($validation)) {
                                    if ($validation->getError('nom_usuari')) {
                                        echo $validation->getError('nom_usuari');
                                    }    
                                }
                                echo"<label for='nom_usuari'>Nom usuari</label>";
                                echo "<input type='text' name='nom_usuari' id='nom_usuari' value='".$usuari['nom_usuari']."'/>";
                                if (!empty($validation)) {
                                    if ($validation->getError('contrasenya')) {
                                        echo $validation->getError('contrasenya');
                                    }    
                                }
                                echo"<label for='contrasenya'>Contrasenya</label>";
                                echo "<input type='password' name='contrasenya' id='contrasenya' value='".$usuari['contrasenya']."'/>";
                                if (!empty($validation)) {
                                    if ($validation->getError('contrasenyaC')) {
                                        echo $validation->getError('contrasenyaC');
                                    }    
                                }
                                echo"<label for='contrasenyaC'>Contrasenya repetida</label>";
                                echo "<input type='password' name='contrasenyaC' id='contrasenyaC' value='".$usuari['contrasenya']."'/>";
                                if (!empty($validation)) {
                                    if ($validation->getError('nom')) {
                                        echo $validation->getError('nom');
                                    }    
                                }
                                echo"<label for='nom'>Nom</label>";
                                echo "<input type='text' name='nom' id='nom' value='".$usuari['nom']."'/>";
                                if (!empty($validation)) {
                                    if ($validation->getError('cognom')) {
                                        echo $validation->getError('cognom');
                                    }    
                                }
                                echo"<label for='cognom'>Cognoms</label>";
                                echo "<input type='text' name='cognom' id='cognom' value='".$usuari['cognom']."'/>";
                                if (!empty($validation)) {
                                    if ($validation->getError('data_naixament')) {
                                        echo $validation->getError('data_naixament');
                                    }    
                                }
                                echo "
                                <div>
                                    <label for='data_naixament'>Fecha de Nacimiento</label>
                                    <input type='date' name='data_naixament' id='data_naixament' value='".$usuari['data_naixament']."'/>
                                </div>
                                ";
                                if (!empty($validation)) {
                                    if ($validation->getError('pais')) {
                                        echo $validation->getError('pais');
                                    }    
                                }
                                echo "
                                <div>
                                    <label for='pais'>Pais</label>
                                    <select name='pais' name='pais' id='pais''>
                                        <option value='".$usuari['pais']."' selected>".$usuari['pais']."</option>
                                        <option value='Afganist??n' id='AF'>Afganist??n</option>
                                        <option value='Albania' id='AL'>Albania</option>
                                        <option value='Alemania' id='DE'>Alemania</option>
                                        <option value='Andorra' id='AD'>Andorra</option>
                                        <option value='Angola' id='AO'>Angola</option>
                                        <option value='Anguila' id='AI'>Anguila</option>
                                        <option value='Ant??rtida' id='AQ'>Ant??rtida</option>
                                        <option value='Antigua y Barbuda' id='AG'>Antigua y Barbuda</option>
                                        <option value='Antillas holandesas' id='AN'>Antillas holandesas</option>
                                        <option value='Arabia Saud??' id='SA'>Arabia Saud??</option>
                                        <option value='Argelia' id='DZ'>Argelia</option>
                                        <option value='Argentina' id='AR'>Argentina</option>
                                        <option value='Armenia' id='AM'>Armenia</option>
                                        <option value='Aruba' id='AW'>Aruba</option>
                                        <option value='Australia' id='AU'>Australia</option>
                                        <option value='Austria' id='AT'>Austria</option>
                                        <option value='Azerbaiy??n' id='AZ'>Azerbaiy??n</option>
                                        <option value='Bahamas' id='BS'>Bahamas</option>
                                        <option value='Bahrein' id='BH'>Bahrein</option>
                                        <option value='Bangladesh' id='BD'>Bangladesh</option>
                                        <option value='Barbados' id='BB'>Barbados</option>
                                        <option value='B??lgica' id='BE'>B??lgica</option>
                                        <option value='Belice' id='BZ'>Belice</option>
                                        <option value='Ben??n' id='BJ'>Ben??n</option>
                                        <option value='Bermudas' id='BM'>Bermudas</option>
                                        <option value='Bhut??n' id='BT'>Bhut??n</option>
                                        <option value='Bielorrusia' id='BY'>Bielorrusia</option>
                                        <option value='Birmania' id='MM'>Birmania</option>
                                        <option value='Bolivia' id='BO'>Bolivia</option>
                                        <option value='Bosnia y Herzegovina' id='BA'>Bosnia y Herzegovina</option>
                                        <option value='Botsuana' id='BW'>Botsuana</option>
                                        <option value='Brasil' id='BR'>Brasil</option>
                                        <option value='Brunei' id='BN'>Brunei</option>
                                        <option value='Bulgaria' id='BG'>Bulgaria</option>
                                        <option value='Burkina Faso' id='BF'>Burkina Faso</option>
                                        <option value='Burundi' id='BI'>Burundi</option>
                                        <option value='Cabo Verde' id='CV'>Cabo Verde</option>
                                        <option value='Camboya' id='KH'>Camboya</option>
                                        <option value='Camer??n' id='CM'>Camer??n</option>
                                        <option value='Canad??' id='CA'>Canad??</option>
                                        <option value='Chad' id='TD'>Chad</option>
                                        <option value='Chile' id='CL'>Chile</option>
                                        <option value='China' id='CN'>China</option>
                                        <option value='Chipre' id='CY'>Chipre</option>
                                        <option value='Ciudad estado del Vaticano' id='VA'>Ciudad estado del Vaticano</option>
                                        <option value='Colombia' id='CO'>Colombia</option>
                                        <option value='Comores' id='KM'>Comores</option>
                                        <option value='Congo' id='CG'>Congo</option>
                                        <option value='Corea' id='KR'>Corea</option>
                                        <option value='Corea del Norte' id='KP'>Corea del Norte</option>
                                        <option value='Costa del Marf??l' id='CI'>Costa del Marf??l</option>
                                        <option value='Costa Rica' id='CR'>Costa Rica</option>
                                        <option value='Croacia' id='HR'>Croacia</option>
                                        <option value='Cuba' id='CU'>Cuba</option>
                                        <option value='Dinamarca' id='DK'>Dinamarca</option>
                                        <option value='Djibouri' id='DJ'>Djibouri</option>
                                        <option value='Dominica' id='DM'>Dominica</option>
                                        <option value='Ecuador' id='EC'>Ecuador</option>
                                        <option value='Egipto' id='EG'>Egipto</option>
                                        <option value='El Salvador' id='SV'>El Salvador</option>
                                        <option value='Emiratos Arabes Unidos' id='AE'>Emiratos Arabes Unidos</option>
                                        <option value='Eritrea' id='ER'>Eritrea</option>
                                        <option value='Eslovaquia' id='SK'>Eslovaquia</option>
                                        <option value='Eslovenia' id='SI'>Eslovenia</option>
                                        <option value='Espa??a' id='ES'>Espa??a</option>
                                        <option value='Estados Unidos' id='US'>Estados Unidos</option>
                                        <option value='Estonia' id='EE'>Estonia</option>
                                        <option value='c' id='ET'>Etiop??a</option>
                                        <option value='Ex-Rep??blica Yugoslava de Macedonia' id='MK'>Ex-Rep??blica Yugoslava de Macedonia</option>
                                        <option value='Filipinas' id='PH'>Filipinas</option>
                                        <option value='Finlandia' id='FI'>Finlandia</option>
                                        <option value='Francia' id='FR'>Francia</option>
                                        <option value='Gab??n' id='GA'>Gab??n</option>
                                        <option value='Gambia' id='GM'>Gambia</option>
                                        <option value='Georgia' id='GE'>Georgia</option>
                                        <option value='Georgia del Sur y las islas Sandwich del Sur' id='GS'>Georgia del Sur y las islas Sandwich del Sur</option>
                                        <option value='Ghana' id='GH'>Ghana</option>
                                        <option value='Gibraltar' id='GI'>Gibraltar</option>
                                        <option value='Granada' id='GD'>Granada</option>
                                        <option value='Grecia' id='GR'>Grecia</option>
                                        <option value='Groenlandia' id='GL'>Groenlandia</option>
                                        <option value='Guadalupe' id='GP'>Guadalupe</option>
                                        <option value='Guam' id='GU'>Guam</option>
                                        <option value='Guatemala' id='GT'>Guatemala</option>
                                        <option value='Guayana' id='GY'>Guayana</option>
                                        <option value='Guayana francesa' id='GF'>Guayana francesa</option>
                                        <option value='Guinea' id='GN'>Guinea</option>
                                        <option value='Guinea Ecuatorial' id='GQ'>Guinea Ecuatorial</option>
                                        <option value='Guinea-Bissau' id='GW'>Guinea-Bissau</option>
                                        <option value='Hait??' id='HT'>Hait??</option>
                                        <option value='Holanda' id='NL'>Holanda</option>
                                        <option value='Honduras' id='HN'>Honduras</option>
                                        <option value='Hong Kong R. A. E' id='HK'>Hong Kong R. A. E</option>
                                        <option value='Hungr??a' id='HU'>Hungr??a</option>
                                        <option value='India' id='IN'>India</option>
                                        <option value='Indonesia' id='ID'>Indonesia</option>
                                        <option value='Irak' id='IQ'>Irak</option>
                                        <option value='Ir??n' id='IR'>Ir??n</option>
                                        <option value='Irlanda' id='IE'>Irlanda</option>
                                        <option value='Isla Bouvet' id='BV'>Isla Bouvet</option>
                                        <option value='Isla Christmas' id='CX'>Isla Christmas</option>
                                        <option value='Isla Heard e Islas McDonald' id='HM'>Isla Heard e Islas McDonald</option>
                                        <option value='Islandia' id='IS'>Islandia</option>
                                        <option value='Islas Caim??n' id='KY'>Islas Caim??n</option>
                                        <option value='Islas Cook' id='CK'>Islas Cook</option>
                                        <option value='Islas de Cocos o Keeling' id='CC'>Islas de Cocos o Keeling</option>
                                        <option value='Islas Faroe' id='FO'>Islas Faroe</option>
                                        <option value='Islas Fiyi' id='FJ'>Islas Fiyi</option>
                                        <option value='Islas Malvinas Islas Falkland' id='FK'>Islas Malvinas Islas Falkland</option>
                                        <option value='Islas Marianas del norte' id='MP'>Islas Marianas del norte</option>
                                        <option value='Islas Marshall' id='MH'>Islas Marshall</option>
                                        <option value='Islas menores de Estados Unidos' id='UM'>Islas menores de Estados Unidos</option>
                                        <option value='Islas Palau' id='PW'>Islas Palau</option>
                                        <option value='Islas Salom??n' d='SB'>Islas Salom??n</option>
                                        <option value='Islas Tokelau' id='TK'>Islas Tokelau</option>
                                        <option value='Islas Turks y Caicos' id='TC'>Islas Turks y Caicos</option>
                                        <option value='Islas V??rgenes EE.UU.' id='VI'>Islas V??rgenes EE.UU.</option>
                                        <option value='Islas V??rgenes Reino Unido' id='VG'>Islas V??rgenes Reino Unido</option>
                                        <option value='Israel' id='IL'>Israel</option>
                                        <option value='Italia' id='IT'>Italia</option>
                                        <option value='Jamaica' id='JM'>Jamaica</option>
                                        <option value='Jap??n' id='JP'>Jap??n</option>
                                        <option value='Jordania' id='JO'>Jordania</option>
                                        <option value='Kazajist??n' id='KZ'>Kazajist??n</option>
                                        <option value='Kenia' id='KE'>Kenia</option>
                                        <option value='Kirguizist??n' id='KG'>Kirguizist??n</option>
                                        <option value='Kiribati' id='KI'>Kiribati</option>
                                        <option value='Kuwait' id='KW'>Kuwait</option>
                                        <option value='Laos' id='LA'>Laos</option>
                                        <option value='Lesoto' id='LS'>Lesoto</option>
                                        <option value='Letonia' id='LV'>Letonia</option>
                                        <option value='L??bano' id='LB'>L??bano</option>
                                        <option value='Liberia' id='LR'>Liberia</option>
                                        <option value='Libia' id='LY'>Libia</option>
                                        <option value='Liechtenstein' id='LI'>Liechtenstein</option>
                                        <option value='Lituania' id='LT'>Lituania</option>
                                        <option value='Luxemburgo' id='LU'>Luxemburgo</option>
                                        <option value='Macao R. A. E' id='MO'>Macao R. A. E</option>
                                        <option value='Madagascar' id='MG'>Madagascar</option>
                                        <option value='Malasia' id='MY'>Malasia</option>
                                        <option value='Malawi' id='MW'>Malawi</option>
                                        <option value='Maldivas' id='MV'>Maldivas</option>
                                        <option value='Mal??' id='ML'>Mal??</option>
                                        <option value='Malta' id='MT'>Malta</option>
                                        <option value='Marruecos' id='MA'>Marruecos</option>
                                        <option value='Martinica' id='MQ'>Martinica</option>
                                        <option value='Mauricio' id='MU'>Mauricio</option>
                                        <option value='Mauritania' id='MR'>Mauritania</option>
                                        <option value='Mayotte' id='YT'>Mayotte</option>
                                        <option value='M??xico' id='MX'>M??xico</option>
                                        <option value='Micronesia' id='FM'>Micronesia</option>
                                        <option value='Moldavia' id='MD'>Moldavia</option>
                                        <option value='M??naco' id='MC'>M??naco</option>
                                        <option value='Mongolia' id='MN'>Mongolia</option>
                                        <option value='Montserrat' id='MS'>Montserrat</option>
                                        <option value='Mozambique' id='MZ'>Mozambique</option>
                                        <option value='Namibia' id='NA'>Namibia</option>
                                        <option value='Nauru' id='NR'>Nauru</option>
                                        <option value='Nepal' id='NP'>Nepal</option>
                                        <option value='Nicaragua' id='NI'>Nicaragua</option>
                                        <option value='N??ger' id='NE'>N??ger</option>
                                        <option value='Nigeria' id='NG'>Nigeria</option>
                                        <option value='Niue' id='NU'>Niue</option>
                                        <option value='Norfolk' id='NF'>Norfolk</option>
                                        <option value='Noruega' id='NO'>Noruega</option>
                                        <option value='Nueva Caledonia' id='NC'>Nueva Caledonia</option>
                                        <option value='Nueva Zelanda' id='NZ'>Nueva Zelanda</option>
                                        <option value='Om??n' id='OM'>Om??n</option>
                                        <option value='Panam??' id='PA'>Panam??</option>
                                        <option value='Papua Nueva Guinea' id='PG'>Papua Nueva Guinea</option>
                                        <option value='Paquist??n' id='PK'>Paquist??n</option>
                                        <option value='Paraguay' id='PY'>Paraguay</option>
                                        <option value='Per??' id='PE'>Per??</option>
                                        <option value='Pitcairn' id='PN'>Pitcairn</option>
                                        <option value='Polinesia francesa' id='PF'>Polinesia francesa</option>
                                        <option value='Polonia' id='PL'>Polonia</option>
                                        <option value='Portugal' id='PT'>Portugal</option>
                                        <option value='Puerto Rico' id='PR'>Puerto Rico</option>
                                        <option value='Qatar' id='QA'>Qatar</option>
                                        <option value='Reino Unido' id='UK'>Reino Unido</option>
                                        <option value='Rep??blica Centroafricana' id='CF'>Rep??blica Centroafricana</option>
                                        <option value='Rep??blica Checa' id='CZ'>Rep??blica Checa</option>
                                        <option value='Rep??blica de Sud??frica' id='ZA'>Rep??blica de Sud??frica</option>
                                        <option value='Rep??blica Democr??tica del Congo Zaire' id='CD'>Rep??blica Democr??tica del Congo Zaire</option>
                                        <option value='Rep??blica Dominicana' id='DO'>Rep??blica Dominicana</option>
                                        <option value='Reuni??n' id='RE'>Reuni??n</option>
                                        <option value='Ruanda' id='RW'>Ruanda</option>
                                        <option value='Rumania' id='RO'>Rumania</option>
                                        <option value='Rusia' id='RU'>Rusia</option>
                                        <option value='Samoa' id='WS'>Samoa</option>
                                        <option value='Samoa occidental' id='AS'>Samoa occidental</option>
                                        <option value='San Kitts y Nevis' id='KN'>San Kitts y Nevis</option>
                                        <option value='San Marino' id='SM'>San Marino</option>
                                        <option value='San Pierre y Miquelon' id='PM'>San Pierre y Miquelon</option>
                                        <option value='San Vicente e Islas Granadinas' id='VC'>San Vicente e Islas Granadinas</option>
                                        <option value='Santa Helena' id='SH'>Santa Helena</option>
                                        <option value='Santa Luc??a' id='LC'>Santa Luc??a</option>
                                        <option value='Santo Tom?? y Pr??ncipe' id='ST'>Santo Tom?? y Pr??ncipe</option>
                                        <option value='Senegal' id='SN'>Senegal</option>
                                        <option value='Serbia y Montenegro' id='YU'>Serbia y Montenegro</option>
                                        <option value='Sychelles' id='SC'>Seychelles</option>
                                        <option value='Sierra Leona' id='SL'>Sierra Leona</option>
                                        <option value='Singapur' id='SG'>Singapur</option>
                                        <option value='Siria' id='SY'>Siria</option>
                                        <option value='Somalia' id='SO'>Somalia</option>
                                        <option value='Sri Lanka' id='LK'>Sri Lanka</option>
                                        <option value='Suazilandia' id='SZ'>Suazilandia</option>
                                        <option value='Sud??n' id='SD'>Sud??n</option>
                                        <option value='Suecia' id='SE'>Suecia</option>
                                        <option value='Suiza' id='CH'>Suiza</option>
                                        <option value='Surinam' id='SR'>Surinam</option>
                                        <option value='Svalbard' id='SJ'>Svalbard</option>
                                        <option value='Tailandia' id='TH'>Tailandia</option>
                                        <option value='Taiw??n' id='TW'>Taiw??n</option>
                                        <option value='Tanzania' id='TZ'>Tanzania</option>
                                        <option value='Tayikist??n' id='TJ'>Tayikist??n</option>
                                        <option value='Territorios brit??nicos del oc??ano Indico' id='IO'>Territorios brit??nicos del oc??ano Indico</option>
                                        <option value='Territorios franceses del sur' id='TF'>Territorios franceses del sur</option>
                                        <option value='Timor Oriental' id='TP'>Timor Oriental</option>
                                        <option value='Togo' id='TG'>Togo</option>
                                        <option value='Tonga' id='TO'>Tonga</option>
                                        <option value='Trinidad y Tobago' id='TT'>Trinidad y Tobago</option>
                                        <option value='T??nez' id='TN'>T??nez</option>
                                        <option value='Turkmenist??n' id='TM'>Turkmenist??n</option>
                                        <option value='Turqu??a' id='TR'>Turqu??a</option>
                                        <option value='Tuvalu' id='TV'>Tuvalu</option>
                                        <option value='Ucrania' id='UA'>Ucrania</option>
                                        <option value='Uganda' id='UG'>Uganda</option>
                                        <option value='Uruguay' id='UY'>Uruguay</option>
                                        <option value='Uzbekist??n' id='UZ'>Uzbekist??n</option>
                                        <option value='Vanuatu' id='VU'>Vanuatu</option>
                                        <option value='Venezuela' id='VE'>Venezuela</option>
                                        <option value='Vietnam' id='VN'>Vietnam</option>
                                        <option value='Wallis y Futuna' id='WF'>Wallis y Futuna</option>
                                        <option value='Yemen' id='YE'>Yemen</option>
                                        <option value='Zambia' id='ZM'>Zambia</option>
                                        <option value='Zimbabue' id='ZW'>Zimbabue</option>
                                    </select>
                                </div>
                                ";
                                if (!empty($validation)) {
                                    if ($validation->getError('telefon')) {
                                        echo $validation->getError('telefon');
                                    }    
                                }
                                echo"<label for='telefon'>Telefon</label>";
                                echo "<input type='tel' name='telefon' id='telefon' value='".$usuari['telefon']."'/>";
                                if (!empty($validation)) {
                                    if ($validation->getError('img')) {
                                        echo $validation->getError('img');
                                    }    
                                }
                                echo "
                                <div>
                                    <label for='img'>Foto/Avatar</label>
                                    <input type='file' name='img' id='img'/>
                                </div>
                                ";
                                echo "<button type='submit'>Actualizar informaci??n</button>
                            </form>
                        </div>
                    </div>
                    ";
                }
                ?>
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
            <?php
            if (isset($session->msg)) {
                echo $session->msg;
            }
            ?>
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
        functionResize();
        window.onload = function(){
            modal();
        }
        window.onresize = function(){
            functionResize();
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
</body>
</html>