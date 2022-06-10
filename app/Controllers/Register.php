<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\Usuari;
use App\Models\Subcategoria;

class Register extends BaseController
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        return view('login', $data);
    }

    public function __construct(){
		helper(['form', 'url', 'html']);
		$this->db = db_connect();
	}
  
    public function save()
    {
        $img = $this->request->getFile('img');
        if (!empty($_FILES['img']['tmp_name'])) {
            $imgData = file_get_contents($_FILES['img']['tmp_name']);
        }
        if (isset($imgData)) {            
            $dades = [
                'nom_usuari'     => $this->request->getVar('nom_usuari'),
                'email'    => $this->request->getVar('email'),
                'contrasenya' 	=> md5($this->request->getVar('contrasenya')),
                'contrasenyaC' => md5($this->request->getVar('contrasenyaC')),
                'nom' => $this->request->getVar('nom'),
                'cognom' => $this->request->getVar('cognom'),
                'data_naixament' => $this->request->getVar('data_naixament'),
                'pais' => $this->request->getVar('pais'),
                'telefon' 	=> $this->request->getVar('telefon'),
                'img' => $imgData,
                'tipo_img' => $img->getClientMimeType(),
                'msg' 		=> "Registro exitoso.",
            ];
        } else {
            $imgData = file_get_contents(base_url('img/user-icon.png'));
            $dades = [
                'nom_usuari'     => $this->request->getVar('nom_usuari'),
                'email'    => $this->request->getVar('email'),
                'contrasenya' 	=> md5($this->request->getVar('contrasenya')),
                'contrasenyaC' => md5($this->request->getVar('contrasenyaC')),
                'nom' => $this->request->getVar('nom'),
                'cognom' => $this->request->getVar('cognom'),
                'data_naixament' => $this->request->getVar('data_naixament'),
                'pais' => $this->request->getVar('pais'),
                'telefon' 	=> $this->request->getVar('telefon'),
                'img' => $imgData,
                'tipo_img' => 'image/png',
                'msg' 		=> "Registro exitoso.",
            ];
        }

    	$regles = [
			"nom_usuari" => "required|max_length[15]",
			"email" => "required|valid_email",
			"contrasenya" => "required|min_length[6]",
			"contrasenyaC" => "matches[contrasenya]",
            "nom" => "required",
            "cognom" => "required",
            "data_naixament" => "required",
            "pais" => "required",
			"telefon" => "required|min_length[9]|max_length[9]",
            "img" => "mime_in[image,image/jpg,image/gif,image/png]",
		];

		$missatges = [
			"nom_usuari" => [
				"required" => "Codigo usuario obligatorio",
				"max_length" => "Máximo 10 cáracteres",
			],
			"email" => [
				"required" => "Correo obligatorio",
				"valid_email" => "Correo invalido",
				],
			"contrasenya" => [
				"required" => "Contraseña obligatoria",
				],
			"contrasenyaC" => [
				"required" => "Confirmar la contraseña obligatoria",
				"matches" => "Las contraseñas no coinciden",
				],
            "nom" => [
                "required" => "Nombre obligatorio",
            ],
            "cognom" => [
                "required" => "Apellidos obligatorio",
            ],
            "pais" => [
                "required" => "Pais obligatorio",
            ],
            "data_naixament" => [
                "required" => "Fecha de nacimiento obligatoria.",
            ],
			"telefon" => [
				"required" => "Telefono obligatorio",
				"min_length" => "Formato invalido del telefono. Ej: 666333111",
				"max_length" => "Formato invalido del telefono. Ej: 666333111",
			],
            "img" => [
                "mime_in" => "El archivo subido no es una imagen.",
            ],
		];
        $model = new Subcategoria();
        $dades['aerea'] = $model->where('id_categoria', 1)->findAll();
        $dades['terrestre'] = $model->where('id_categoria', 2)->findAll();
        $dades['acuatica'] = $model->where('id_categoria', 3)->findAll();
        $dades['viajes'] = $model->where('id_categoria', 4)->findAll();
		if($this->validate($regles,$missatges)){
			$modelUser = new Usuari();
            $queryEmail=$this->db->query("SELECT count(email)as contEmail FROM usuari WHERE email = '".$this->request->getVar('email')."'");
            $queryNomUser=$this->db->query("SELECT count(nom_usuari) as contNomUsuari FROM usuari WHERE nom_usuari='".$this->request->getVar('nom_usuari')."'");
            $emailValid = $queryEmail->getRow();
            $nomUserValid = $queryNomUser->getRow();
            if (intval($emailValid->contEmail) >= 1) {
                $dades['nom_usuari'] = '';
                $dades['msg'] = 'Ya existe una cuenta con este correo, intenta con otro.';
                return view('login', $dades);
            }else {
                if (intval($nomUserValid->contNomUsuari) >= 1) {
                    $dades['nom_usuari'] = '';
                    $dades['msg'] = 'Ya existe una cuenta con este nombre de usuario, intenta con otro.';
                    return view('login', $dades);
                }
                else {
                    $modelUser->save($dades);
                    return view('login',$dades);
                }
            }
		}
		else {
            $dades['msg'] = 'No se ha podido registrar, comprueba los datos.';
			$dades['validation'] = $this->validator;
            return view('login', $dades);
		}
          
    }
  
}