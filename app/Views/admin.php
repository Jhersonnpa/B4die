<?php $session = session();?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B4die - Admin</title>
    <link rel="icon" href="<?= base_url('img/logo.png')?>">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url('css/ranking.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css')?>">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?=  base_url('js/js.js')?>"></script>
</head>
<body onload="getLocation()" class="body">
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


    <!-- Admin -->
    <h1 class="h2">ADMIN</h1>
    
    <div class="container-pers">
        <?php 
        if (isset($session->msg)) {
            echo "<h2 style='color: #fff;'><i class='bx bxs-info-square' style='color:#FFDB49'  ></i>".$session->msg."</h2>";
        }
        ?>
        <h2 class="h2">Experiencias registradas</h2>
        
        <div class="tabla-pers">
            <div class="scrolling">
                <table class="table table-hover table-responsive" id="table_id">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th>Subcategoria</th>
                            <th>Pais</th>
                            <th>Ciudad</th>
                            <th>Longitud</th>
                            <th>Latitud</th>
                            <th>Dificultad</th>
                            <th>Precio</th>
                            <th>URL Empresa</th>
                            <th>Img</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($activitats as $key => $value) {
                            echo "
                            <tr>
                                <td>".$value['id']."</td>
                                <td>".$value['nom']."</td>
                                <td>".$value['descripcio']."</td>
                                <td>".$value['categoria']."</td>
                                <td>".$value['subcategoria']."</td>
                                <td>".$value['pais']."</td>
                                <td>".$value['ciutat']."</td>
                                <td>".$value['longitud']."</td>
                                <td>".$value['latitud']."</td>
                                <td>".$value['dificultat']."</td>
                                <td>".$value['precio']."</td>
                                <td>".$value['url_empresa']."</td>
                                <td><img src='data:".$value['tipo_img'].";base64,".base64_encode($value['img'])."'/></td>
                                <td><a href='". base_url('/editarActivitat').'?id='.$value['id']."' style='color: #333;font-size: 1.5rem;'><i class='bx bx-edit' ></i></a></td>
                                <td><a href='". base_url('/eliminarActivitat').'?id='.$value['id']."' style='color: red;font-size: 1.5rem;'><i class='bx bxs-x-square' ></i></a></td>
                            </tr>
                            ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>


            <a href="#" id="mySizeChart" class="estilo-a??adir">A??adir Actividad</a>
            <div id="mySizeChartModal" class="ebcf_modal">
                <div class="ebcf_modal-content">
                    <span class="ebcf_close">&times;</span>
                    <form action='<?=base_url('/a??adirActivitat')?>' method='post' enctype='multipart/form-data'>
                    <?= csrf_field() ?>
                        <input type="text" name="nom" id="nom" placeholder="Nombre actividad">
                        <input type="text" name="descripcio" id="descripcio" placeholder="Descripci??n">
                        <label for="categoria">Categoria</label>
                        <select name="categoria" id="categoria">
                        <?php
                            foreach ($categorias as $key => $value) {
                                echo "<option value='".$value['nom']."'>".$value['nom']."</option>";
                            } 
                        ?>   
                        </select>
                        <label for="subcategoria">Subcategoria</label>
                        <select name="subcategoria" id="subcategoria">
                        <?php
                            foreach ($subcategorias as $key => $value) {
                                echo "<option value='".$value['nom']."'>".$value['nom']."</option>";
                            } 
                        ?> 
                        </select>
                        <label for="pais">Pais</label>
                        <select name="pais" id="pais">
                            <option value="Elegir" id="AF">Elegir opci??n</option>
                            <option value="Afganist??n" id="AF">Afganist??n</option>
                            <option value="Albania" id="AL">Albania</option>
                            <option value="Alemania" id="DE">Alemania</option>
                            <option value="Andorra" id="AD">Andorra</option>
                            <option value="Angola" id="AO">Angola</option>
                            <option value="Anguila" id="AI">Anguila</option>
                            <option value="Ant??rtida" id="AQ">Ant??rtida</option>
                            <option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
                            <option value="Antillas holandesas" id="AN">Antillas holandesas</option>
                            <option value="Arabia Saud??" id="SA">Arabia Saud??</option>
                            <option value="Argelia" id="DZ">Argelia</option>
                            <option value="Argentina" id="AR">Argentina</option>
                            <option value="Armenia" id="AM">Armenia</option>
                            <option value="Aruba" id="AW">Aruba</option>
                            <option value="Australia" id="AU">Australia</option>
                            <option value="Austria" id="AT">Austria</option>
                            <option value="Azerbaiy??n" id="AZ">Azerbaiy??n</option>
                            <option value="Bahamas" id="BS">Bahamas</option>
                            <option value="Bahrein" id="BH">Bahrein</option>
                            <option value="Bangladesh" id="BD">Bangladesh</option>
                            <option value="Barbados" id="BB">Barbados</option>
                            <option value="B??lgica" id="BE">B??lgica</option>
                            <option value="Belice" id="BZ">Belice</option>
                            <option value="Ben??n" id="BJ">Ben??n</option>
                            <option value="Bermudas" id="BM">Bermudas</option>
                            <option value="Bhut??n" id="BT">Bhut??n</option>
                            <option value="Bielorrusia" id="BY">Bielorrusia</option>
                            <option value="Birmania" id="MM">Birmania</option>
                            <option value="Bolivia" id="BO">Bolivia</option>
                            <option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
                            <option value="Botsuana" id="BW">Botsuana</option>
                            <option value="Brasil" id="BR">Brasil</option>
                            <option value="Brunei" id="BN">Brunei</option>
                            <option value="Bulgaria" id="BG">Bulgaria</option>
                            <option value="Burkina Faso" id="BF">Burkina Faso</option>
                            <option value="Burundi" id="BI">Burundi</option>
                            <option value="Cabo Verde" id="CV">Cabo Verde</option>
                            <option value="Camboya" id="KH">Camboya</option>
                            <option value="Camer??n" id="CM">Camer??n</option>
                            <option value="Canad??" id="CA">Canad??</option>
                            <option value="Chad" id="TD">Chad</option>
                            <option value="Chile" id="CL">Chile</option>
                            <option value="China" id="CN">China</option>
                            <option value="Chipre" id="CY">Chipre</option>
                            <option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
                            <option value="Colombia" id="CO">Colombia</option>
                            <option value="Comores" id="KM">Comores</option>
                            <option value="Congo" id="CG">Congo</option>
                            <option value="Corea" id="KR">Corea</option>
                            <option value="Corea del Norte" id="KP">Corea del Norte</option>
                            <option value="Costa del Marf??l" id="CI">Costa del Marf??l</option>
                            <option value="Costa Rica" id="CR">Costa Rica</option>
                            <option value="Croacia" id="HR">Croacia</option>
                            <option value="Cuba" id="CU">Cuba</option>
                            <option value="Dinamarca" id="DK">Dinamarca</option>
                            <option value="Djibouri" id="DJ">Djibouri</option>
                            <option value="Dominica" id="DM">Dominica</option>
                            <option value="Ecuador" id="EC">Ecuador</option>
                            <option value="Egipto" id="EG">Egipto</option>
                            <option value="El Salvador" id="SV">El Salvador</option>
                            <option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
                            <option value="Eritrea" id="ER">Eritrea</option>
                            <option value="Eslovaquia" id="SK">Eslovaquia</option>
                            <option value="Eslovenia" id="SI">Eslovenia</option>
                            <option value="Espa??a" id="ES">Espa??a</option>
                            <option value="Estados Unidos" id="US">Estados Unidos</option>
                            <option value="Estonia" id="EE">Estonia</option>
                            <option value="c" id="ET">Etiop??a</option>
                            <option value="Ex-Rep??blica Yugoslava de Macedonia" id="MK">Ex-Rep??blica Yugoslava de Macedonia</option>
                            <option value="Filipinas" id="PH">Filipinas</option>
                            <option value="Finlandia" id="FI">Finlandia</option>
                            <option value="Francia" id="FR">Francia</option>
                            <option value="Gab??n" id="GA">Gab??n</option>
                            <option value="Gambia" id="GM">Gambia</option>
                            <option value="Georgia" id="GE">Georgia</option>
                            <option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
                            <option value="Ghana" id="GH">Ghana</option>
                            <option value="Gibraltar" id="GI">Gibraltar</option>
                            <option value="Granada" id="GD">Granada</option>
                            <option value="Grecia" id="GR">Grecia</option>
                            <option value="Groenlandia" id="GL">Groenlandia</option>
                            <option value="Guadalupe" id="GP">Guadalupe</option>
                            <option value="Guam" id="GU">Guam</option>
                            <option value="Guatemala" id="GT">Guatemala</option>
                            <option value="Guayana" id="GY">Guayana</option>
                            <option value="Guayana francesa" id="GF">Guayana francesa</option>
                            <option value="Guinea" id="GN">Guinea</option>
                            <option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
                            <option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
                            <option value="Hait??" id="HT">Hait??</option>
                            <option value="Holanda" id="NL">Holanda</option>
                            <option value="Honduras" id="HN">Honduras</option>
                            <option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
                            <option value="Hungr??a" id="HU">Hungr??a</option>
                            <option value="India" id="IN">India</option>
                            <option value="Indonesia" id="ID">Indonesia</option>
                            <option value="Irak" id="IQ">Irak</option>
                            <option value="Ir??n" id="IR">Ir??n</option>
                            <option value="Irlanda" id="IE">Irlanda</option>
                            <option value="Isla Bouvet" id="BV">Isla Bouvet</option>
                            <option value="Isla Christmas" id="CX">Isla Christmas</option>
                            <option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
                            <option value="Islandia" id="IS">Islandia</option>
                            <option value="Islas Caim??n" id="KY">Islas Caim??n</option>
                            <option value="Islas Cook" id="CK">Islas Cook</option>
                            <option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
                            <option value="Islas Faroe" id="FO">Islas Faroe</option>
                            <option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
                            <option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
                            <option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
                            <option value="Islas Marshall" id="MH">Islas Marshall</option>
                            <option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
                            <option value="Islas Palau" id="PW">Islas Palau</option>
                            <option value="Islas Salom??n" d="SB">Islas Salom??n</option>
                            <option value="Islas Tokelau" id="TK">Islas Tokelau</option>
                            <option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
                            <option value="Islas V??rgenes EE.UU." id="VI">Islas V??rgenes EE.UU.</option>
                            <option value="Islas V??rgenes Reino Unido" id="VG">Islas V??rgenes Reino Unido</option>
                            <option value="Israel" id="IL">Israel</option>
                            <option value="Italia" id="IT">Italia</option>
                            <option value="Jamaica" id="JM">Jamaica</option>
                            <option value="Jap??n" id="JP">Jap??n</option>
                            <option value="Jordania" id="JO">Jordania</option>
                            <option value="Kazajist??n" id="KZ">Kazajist??n</option>
                            <option value="Kenia" id="KE">Kenia</option>
                            <option value="Kirguizist??n" id="KG">Kirguizist??n</option>
                            <option value="Kiribati" id="KI">Kiribati</option>
                            <option value="Kuwait" id="KW">Kuwait</option>
                            <option value="Laos" id="LA">Laos</option>
                            <option value="Lesoto" id="LS">Lesoto</option>
                            <option value="Letonia" id="LV">Letonia</option>
                            <option value="L??bano" id="LB">L??bano</option>
                            <option value="Liberia" id="LR">Liberia</option>
                            <option value="Libia" id="LY">Libia</option>
                            <option value="Liechtenstein" id="LI">Liechtenstein</option>
                            <option value="Lituania" id="LT">Lituania</option>
                            <option value="Luxemburgo" id="LU">Luxemburgo</option>
                            <option value="Macao R. A. E" id="MO">Macao R. A. E</option>
                            <option value="Madagascar" id="MG">Madagascar</option>
                            <option value="Malasia" id="MY">Malasia</option>
                            <option value="Malawi" id="MW">Malawi</option>
                            <option value="Maldivas" id="MV">Maldivas</option>
                            <option value="Mal??" id="ML">Mal??</option>
                            <option value="Malta" id="MT">Malta</option>
                            <option value="Marruecos" id="MA">Marruecos</option>
                            <option value="Martinica" id="MQ">Martinica</option>
                            <option value="Mauricio" id="MU">Mauricio</option>
                            <option value="Mauritania" id="MR">Mauritania</option>
                            <option value="Mayotte" id="YT">Mayotte</option>
                            <option value="M??xico" id="MX">M??xico</option>
                            <option value="Micronesia" id="FM">Micronesia</option>
                            <option value="Moldavia" id="MD">Moldavia</option>
                            <option value="M??naco" id="MC">M??naco</option>
                            <option value="Mongolia" id="MN">Mongolia</option>
                            <option value="Montserrat" id="MS">Montserrat</option>
                            <option value="Mozambique" id="MZ">Mozambique</option>
                            <option value="Namibia" id="NA">Namibia</option>
                            <option value="Nauru" id="NR">Nauru</option>
                            <option value="Nepal" id="NP">Nepal</option>
                            <option value="Nicaragua" id="NI">Nicaragua</option>
                            <option value="N??ger" id="NE">N??ger</option>
                            <option value="Nigeria" id="NG">Nigeria</option>
                            <option value="Niue" id="NU">Niue</option>
                            <option value="Norfolk" id="NF">Norfolk</option>
                            <option value="Noruega" id="NO">Noruega</option>
                            <option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
                            <option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
                            <option value="Om??n" id="OM">Om??n</option>
                            <option value="Panam??" id="PA">Panam??</option>
                            <option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
                            <option value="Paquist??n" id="PK">Paquist??n</option>
                            <option value="Paraguay" id="PY">Paraguay</option>
                            <option value="Per??" id="PE">Per??</option>
                            <option value="Pitcairn" id="PN">Pitcairn</option>
                            <option value="Polinesia francesa" id="PF">Polinesia francesa</option>
                            <option value="Polonia" id="PL">Polonia</option>
                            <option value="Portugal" id="PT">Portugal</option>
                            <option value="Puerto Rico" id="PR">Puerto Rico</option>
                            <option value="Qatar" id="QA">Qatar</option>
                            <option value="Reino Unido" id="UK">Reino Unido</option>
                            <option value="Rep??blica Centroafricana" id="CF">Rep??blica Centroafricana</option>
                            <option value="Rep??blica Checa" id="CZ">Rep??blica Checa</option>
                            <option value="Rep??blica de Sud??frica" id="ZA">Rep??blica de Sud??frica</option>
                            <option value="Rep??blica Democr??tica del Congo Zaire" id="CD">Rep??blica Democr??tica del Congo Zaire</option>
                            <option value="Rep??blica Dominicana" id="DO">Rep??blica Dominicana</option>
                            <option value="Reuni??n" id="RE">Reuni??n</option>
                            <option value="Ruanda" id="RW">Ruanda</option>
                            <option value="Rumania" id="RO">Rumania</option>
                            <option value="Rusia" id="RU">Rusia</option>
                            <option value="Samoa" id="WS">Samoa</option>
                            <option value="Samoa occidental" id="AS">Samoa occidental</option>
                            <option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
                            <option value="San Marino" id="SM">San Marino</option>
                            <option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
                            <option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
                            <option value="Santa Helena" id="SH">Santa Helena</option>
                            <option value="Santa Luc??a" id="LC">Santa Luc??a</option>
                            <option value="Santo Tom?? y Pr??ncipe" id="ST">Santo Tom?? y Pr??ncipe</option>
                            <option value="Senegal" id="SN">Senegal</option>
                            <option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
                            <option value="Sychelles" id="SC">Seychelles</option>
                            <option value="Sierra Leona" id="SL">Sierra Leona</option>
                            <option value="Singapur" id="SG">Singapur</option>
                            <option value="Siria" id="SY">Siria</option>
                            <option value="Somalia" id="SO">Somalia</option>
                            <option value="Sri Lanka" id="LK">Sri Lanka</option>
                            <option value="Suazilandia" id="SZ">Suazilandia</option>
                            <option value="Sud??n" id="SD">Sud??n</option>
                            <option value="Suecia" id="SE">Suecia</option>
                            <option value="Suiza" id="CH">Suiza</option>
                            <option value="Surinam" id="SR">Surinam</option>
                            <option value="Svalbard" id="SJ">Svalbard</option>
                            <option value="Tailandia" id="TH">Tailandia</option>
                            <option value="Taiw??n" id="TW">Taiw??n</option>
                            <option value="Tanzania" id="TZ">Tanzania</option>
                            <option value="Tayikist??n" id="TJ">Tayikist??n</option>
                            <option value="Territorios brit??nicos del oc??ano Indico" id="IO">Territorios brit??nicos del oc??ano Indico</option>
                            <option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
                            <option value="Timor Oriental" id="TP">Timor Oriental</option>
                            <option value="Togo" id="TG">Togo</option>
                            <option value="Tonga" id="TO">Tonga</option>
                            <option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
                            <option value="T??nez" id="TN">T??nez</option>
                            <option value="Turkmenist??n" id="TM">Turkmenist??n</option>
                            <option value="Turqu??a" id="TR">Turqu??a</option>
                            <option value="Tuvalu" id="TV">Tuvalu</option>
                            <option value="Ucrania" id="UA">Ucrania</option>
                            <option value="Uganda" id="UG">Uganda</option>
                            <option value="Uruguay" id="UY">Uruguay</option>
                            <option value="Uzbekist??n" id="UZ">Uzbekist??n</option>
                            <option value="Vanuatu" id="VU">Vanuatu</option>
                            <option value="Venezuela" id="VE">Venezuela</option>
                            <option value="Vietnam" id="VN">Vietnam</option>
                            <option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
                            <option value="Yemen" id="YE">Yemen</option>
                            <option value="Zambia" id="ZM">Zambia</option>
                            <option value="Zimbabue" id="ZW">Zimbabue</option>
                        </select>
                        <input type="text" name="ciutat" id="ciutat" placeholder="Ciudad">
                        <input type="number" step="any" name="latitud" placeholder="Latitud"/>
                        <input type="number" step="any" name="longitud" placeholder="Longitud"/>
                        <input type="number" step="any" name="dificultat" placeholder="Dificultat"/>
                        <label for="img">Imagen</label>
                        <input type="file" name="img" id="img">
                        <label for="precio">Precio</label>
                        <input type="text" name="precio" id="precio">
                        <label for="url_empresa">URL Empresa</label>
                        <input type="text" name="url_empresa" id="url_empresa">
                        <button type="submit">A??adir actividad</button>
                    </form>
                </div>
            </div>

        </div>



        
        <h2 class="h2">Usuarios registrados</h2>
        <div class="tabla-pers">
            <div class="scrolling">
                <table class="table table-hover table-responsive" id="table_id2">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Fecha Nacimiento</th>
                            <th>Pais</th>
                            <th>Telefono</th>
                            <th>Avatar</th>
                            <th>Puntuacion</th>
                            <th>Rango</th>
                            <!-- <th>Editar</th> -->
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($usuaris as $key => $value) {
                            echo "
                            <tr>
                                <td>".$value['id']."</td>
                                <td>".$value['nom_usuari']."</td>
                                <td>".$value['nom']."</td>
                                <td>".$value['cognom']."</td>
                                <td>".$value['email']."</td>
                                <td>".$value['data_naixament']."</td>
                                <td>".$value['pais']."</td>
                                <td>".$value['telefon']."</td>
                                <td><img src='data:".$value['tipo_img'].";base64,".base64_encode($value['img'])."'/></td>
                                <td>".$value['puntuacion']."</td>
                                <td>".$value['rango']."</td>
                                <td><a href='". base_url('/eliminarUsuario').'?id='.$value['id']."' style='color: red;font-size: 1.5rem;'><i class='bx bxs-x-square' ></i></a></td>
                            </tr>
                            ";
                        }
                        ?>
                    </tbody>
                </table>
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
        $(document).ready( function () {
            $('#table_id2').DataTable();
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