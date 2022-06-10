<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Activitat;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Usuari;

class Admin extends BaseController
{
    public function __construct(){
		helper(['form']);
        $this->db=db_connect();
	}

    public function index()
    {
        $session = session();
        if ($session->logged_in == false && $session->tipo_usuari == 0) {
            return redirect()->to('/');
        }
        $model = new Usuari();
        $modelActivitat = new Activitat();
        $modelCategoria = new Categoria();
        $modelSubcategoria = new Subcategoria();
        $activitats = $modelActivitat->findAll();
        $usuaris = $model->findAll();
        $categorias = $modelCategoria->findAll();
        $subcategorias = $modelSubcategoria->findAll();
        $data = ["usuaris" => $usuaris, "activitats" => $activitats, "categorias" => $categorias, "subcategorias" => $subcategorias, 'aerea' => $modelSubcategoria->where('id_categoria', 1)->findAll(), 'terrestre' => $modelSubcategoria->where('id_categoria', 2)->findAll(), 'acuatica' => $modelSubcategoria->where('id_categoria', 3)->findAll(), 'viajes' => $modelSubcategoria->where('id_categoria', 4)->findAll()];
        return view('admin',$data);
    } 

    public function save()
    {
        $session = session();
        $img = $this->request->getFile('img');
        if (!empty($_FILES['img']['tmp_name'])) {
            $imgData = file_get_contents($_FILES['img']['tmp_name']);
        }
        if (isset($imgData)) {            
            $dades = [
                'nom'     => $this->request->getVar('nom'),
                'descripcio'    => $this->request->getVar('descripcio'),
                'categoria' 	=> $this->request->getVar('categoria'),
                'subcategoria' => $this->request->getVar('subcategoria'),
                'pais' => $this->request->getVar('pais'),
                'ciutat' => $this->request->getVar('ciutat'),
                'longitud' => $this->request->getVar('longitud'),
                'latitud' => $this->request->getVar('latitud'),
                'dificultat' 	=> $this->request->getVar('dificultat'),
                'img' => $imgData,
                'tipo_img' => $img->getClientMimeType(),
                'precio' => $this->request->getVar('precio'),
                'url_empresa' => $this->request->getVar('dificultat'),
                'msg' 		=> "Registro exitoso.",
            ];
        } else {
            $imgData = file_get_contents(base_url('img/imagen-defecto.jpg'));
            $dades = [
                'nom'     => $this->request->getVar('nom'),
                'descripcio'    => $this->request->getVar('descripcio'),
                'categoria' 	=> $this->request->getVar('categoria'),
                'subcategoria' => $this->request->getVar('subcategoria'),
                'pais' => $this->request->getVar('pais'),
                'ciutat' => $this->request->getVar('ciutat'),
                'longitud' => $this->request->getVar('longitud'),
                'latitud' => $this->request->getVar('latitud'),
                'dificultat' 	=> $this->request->getVar('dificultat'),
                'img' => $imgData,
                'tipo_img' => 'image/jpg',
                'precio' => $this->request->getVar('precio'),
                'url_empresa' => $this->request->getVar('dificultat'),
                'msg' 		=> "Registro exitoso.",
            ];
        }

    	$regles = [
			"nom" => "required",
			"descripcio" => "required",
			"categoria" => "required",
			"subcategoria" => "required",
            "pais" => "required",
            "ciutat" => "required",
            "longitud" => "required",
            "latitud" => "required",
			"dificultat" => "required",
            "img" => "mime_in[image,image/jpg,image/gif,image/png]",
            "precio" => "required",
            "url_empresa" => "required",
		];

		$missatges = [
			"nom" => [
				"required" => "Nombre obligatorio",
			],
			"descripcio" => [
				"required" => "Descripcion obligatorio",
				],
			"categoria" => [
				"required" => "Categoria obligatoria",
				],
			"subcategoria" => [
				"required" => "Subcategoria obligatoria",
				],
            "dificultat" => [
                "required" => "Dificultat obligatorio",
            ],
            "ciutat" => [
                "required" => "Ciudad obligatorio",
            ],
            "pais" => [
                "required" => "Pais obligatorio",
            ],
            "longitud" => [
                "required" => "Longitud obligatoria.",
            ],
			"latitud" => [
                "required" => "Latitud obligatoria.",
            ],
            "img" => [
                "mime_in" => "El archivo subido no es una imagen.",
            ]
            ,"precio" => [
                "required" => "Precio obligatorio.",
            ],
            "url_empresa" => [
                "required" => "URL obligatoria.",
            ],
		];

		if($this->validate($regles,$missatges)){
			$model = new Activitat();
            $model->save($dades);
            $session->set('msg', 'Se ha añadido la actividad correctamente!');
            return redirect()->to('/admin');
			
		}
		else {
            $session->set('msg', 'No se ha podido añadir la actividad.');
            return redirect()->to('/admin');
		}
          
    }

    public function editarActVista()
    {
        $session = session();
        if ($session->logged_in == false && $session->tipo_usuari == 0) {
            return redirect()->to('/');
        }
        $model = new Subcategoria();
        $modelActivitat = new Activitat();
        $modelCategoria = new Categoria();
        $dades = ['activitat' => $modelActivitat->find($this->request->getVar('id')),'categorias' => $modelCategoria->findAll(),'subcategorias' => $model->findAll(),'aerea' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatica' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll()];
        return view('editarAct', $dades);
    }

    public function editarAct()
    {
        $session = session();
        $img = $this->request->getFile('img');
        if (!empty($_FILES['img']['tmp_name'])) {
            $imgData = file_get_contents($_FILES['img']['tmp_name']);
        }
        if (isset($imgData)) {            
            $dades = [
                'nom'     => $this->request->getVar('nom'),
                'descripcio'    => $this->request->getVar('descripcio'),
                'categoria' 	=> $this->request->getVar('categoria'),
                'subcategoria' => $this->request->getVar('subcategoria'),
                'pais' => $this->request->getVar('pais'),
                'ciutat' => $this->request->getVar('ciutat'),
                'longitud' => $this->request->getVar('longitud'),
                'latitud' => $this->request->getVar('latitud'),
                'dificultat' 	=> $this->request->getVar('dificultat'),
                'img' => $imgData,
                'tipo_img' => $img->getClientMimeType(),
                'precio' => $this->request->getVar('precio'),
                'url_empresa' => $this->request->getVar('dificultat'),
                'msg' 		=> "Registro exitoso.",
            ];

            $regles = [
                "nom" => "required",
                "descripcio" => "required",
                "categoria" => "required",
                "subcategoria" => "required",
                "pais" => "required",
                "ciutat" => "required",
                "longitud" => "required",
                "latitud" => "required",
                "dificultat" => "required",
                "img" => "mime_in[image,image/jpg,image/gif,image/png]",
                "precio" => "required",
                "url_empresa" => "required",
            ];
        } else {
            $query = $this->db->query("SELECT * FROM activitat WHERE id = ".$this->request->getVar('id')." LIMIT 1");
            $row   = $query->getRow();
            $dades = [
                'nom'     => $this->request->getVar('nom'),
                'descripcio'    => $this->request->getVar('descripcio'),
                'categoria' 	=> $this->request->getVar('categoria'),
                'subcategoria' => $this->request->getVar('subcategoria'),
                'pais' => $this->request->getVar('pais'),
                'ciutat' => $this->request->getVar('ciutat'),
                'longitud' => $this->request->getVar('longitud'),
                'latitud' => $this->request->getVar('latitud'),
                'dificultat' 	=> $this->request->getVar('dificultat'),
                'img' => $row->img,
                'tipo_img' => $this->request->getVar('tipo_img'),
                'precio' => $this->request->getVar('precio'),
                'url_empresa' => $this->request->getVar('dificultat'),
                'msg' 		=> "Registro exitoso.",
            ];
            $regles = [
                "nom" => "required",
                "descripcio" => "required",
                "categoria" => "required",
                "subcategoria" => "required",
                "pais" => "required",
                "ciutat" => "required",
                "longitud" => "required",
                "latitud" => "required",
                "dificultat" => "required",
                "precio" => "required",
                "url_empresa" => "required",
            ];
        }

    	

		$missatges = [
			"nom" => [
				"required" => "Nombre obligatorio",
			],
			"descripcio" => [
				"required" => "Descripcion obligatorio",
				],
			"categoria" => [
				"required" => "Categoria obligatoria",
				],
			"subcategoria" => [
				"required" => "Subcategoria obligatoria",
				],
            "dificultat" => [
                "required" => "Dificultat obligatorio",
            ],
            "ciutat" => [
                "required" => "Ciudad obligatorio",
            ],
            "pais" => [
                "required" => "Pais obligatorio",
            ],
            "longitud" => [
                "required" => "Longitud obligatoria.",
            ],
			"latitud" => [
                "required" => "Latitud obligatoria.",
            ],
            "img" => [
                "mime_in" => "El archivo subido no es una imagen.",
            ],
            "precio" => [
                "required" => "Precio obligatorio.",
            ],
            "url_empresa" => [
                "required" => "URL obligatoria.",
            ],
		];

		if($this->validate($regles,$missatges)){
			$model = new Activitat();
            $model->update(intval($this->request->getVar('id')), $dades);
            $session->setFlashdata('msg', 'Se ha editado la actividad correctamente!');
            return redirect()->to('/admin');
			
		}
		else {
            $model = new Subcategoria();
            $modelCategoria = new Categoria();
            $modelAct = new Activitat();
            $dades['activitat'] = $modelAct->where('id', $this->request->getVar('id'))->findAll();
            $dades['aerea'] = $model->where('id_categoria', 1)->findAll();
            $dades['terrestre'] = $model->where('id_categoria', 2)->findAll();
            $dades['acuatica'] = $model->where('id_categoria', 3)->findAll();
            $dades['viajes'] = $model->where('id_categoria', 4)->findAll();
            $dades['categorias'] = $modelCategoria->findAll();
            $dades['subcategorias'] = $model->findAll();
            $dades['validation'] = $this->validator;
            $session->setFlashdata('msg', 'No se ha podido editar la actividad.');
            return view('editarAct',$dades);
		}
    }

    public function editarUser()
    {
        $modelUser = new Usuari();
        $user = $modelUser->find($this->request->getVar('id'));
        $session = session();
        if ($session->logged_in == false && $session->tipo_usuari == 0) {
            return redirect()->to('/');
        }
        $img = $this->request->getFile('img');
        if (!empty($_FILES['img']['tmp_name'])) {
            $imgData = file_get_contents($_FILES['img']['tmp_name']);
        }
        if (isset($imgData)) {            
            $dadesU = [
                'nom_usuari'     => $this->request->getVar('nom_usuari'),
                'email'    => $this->request->getVar('email'),
                'contrasenya' 	=> $this->request->getVar('contrasenya'),
                'contrasenyaC' => $this->request->getVar('contrasenyaC'),
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
            $dadesU = [
                'nom_usuari'     => $this->request->getVar('nom_usuari'),
                'email'    => $this->request->getVar('email'),
                'contrasenya' 	=> $this->request->getVar('contrasenya'),
                'contrasenyaC' => $this->request->getVar('contrasenyaC'),
                'nom' => $this->request->getVar('nom'),
                'cognom' => $this->request->getVar('cognom'),
                'data_naixament' => $this->request->getVar('data_naixament'),
                'pais' => $this->request->getVar('pais'),
                'telefon' 	=> $this->request->getVar('telefon'),
                'img' => $user['img'],
                'tipo_img' => $user['tipo_img'],
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
			
            $queryEmail=$this->db->query("SELECT count(email)as contEmail, email, nom_usuari FROM usuari WHERE email = '".$this->request->getVar('email')."'");
            $queryNomUser=$this->db->query("SELECT count(nom_usuari) as contNomUsuari FROM usuari WHERE nom_usuari='".$this->request->getVar('nom_usuari')."'");
            $emailValid = $queryEmail->getRow();
            $nomUserValid = $queryNomUser->getRow();
            if (intval($emailValid->contEmail) >= 1) {
                if ($emailValid->email == $this->request->getVar('email')) {
                    if (intval($nomUserValid->contNomUsuari) >= 1) {
                        if ($emailValid->nom_usuari == $this->request->getVar('nom_usuari')) {
                            $modelUser->update(intval($this->request->getVar('id')), $dadesU);
                            $query = $this->db->query("SELECT TIMESTAMPDIFF(YEAR,data_naixament,CURDATE()) AS edad FROM usuari where id = ".$this->request->getVar('id'));
                            $row = $query->getRow();
                            $user = $modelUser->find($this->request->getVar('id'));
                            $ses_data = [
                                'id' => $this->request->getVar('id'),
                                'nom_usuari'       => $this->request->getVar('nom_usuari'),
                                'nom' => $this->request->getVar('nom'),
                                'cognom' => $this->request->getVar('cognom'),
                                'email'     => $this->request->getVar('email'),
                                'data_naixament'  => $this->request->getVar('data_naixament'),
                                'pais' => $this->request->getVar('pais'),
                                'telefon'    => $this->request->getVar('telefon'),
                                'img' => $user['img'],
                                'edad' => $row->edad,
                                'tipo_img' => $user['tipo_img'],
                                'tipo_usuari' => $user['tipo_usuari'],
                                'puntuacion' => $user['puntuacion'],
                                'rango' => $user['rango'],
                                'logged_in'     => TRUE
                            ];
                            $session->set($ses_data);
                            $session->setFlashdata('msg', 'Perfil editado.');
                            return redirect()->to('/perfil');
                        }
                        else {
                           $session->setFlashdata('msg', 'Ya existe una cuenta con este nombre de usuario, intenta con otro.');
                            return redirect()->to('/perfil'); 
                        }
                    }
                    else {
                        $modelUser->update(intval($this->request->getVar('id')), $dadesU);
                        $session->setFlashdata('msg', 'Perfil editado.');
                        return redirect()->to('/perfil');
                    }
                }
                else {
                    $session->setFlashdata('msg', 'Ya existe una cuenta con este correo, intenta con otro.1');
                    return redirect()->to('/perfil');    
                }
            }else {
                if (intval($nomUserValid->contNomUsuari) >= 1) {
                    $session->setFlashdata('msg', 'Ya existe una cuenta con este nombre de usuario, intenta con otro.');
                    return redirect()->to('/perfil');
                }
                else {
                    $modelUser->update(intval($this->request->getVar('id')), $dadesU);
                    $session->setFlashdata('msg', 'Perfil editado.');
                    return redirect()->to('/perfil');
                }
            }
		}
		else {
            $session->setFlashdata('msg', 'No se ha podido actualizar, comprueba los datos.');
			$dades['validation'] = $this->validator;
            return redirect()->to('/perfil');
		}
    }

    public function eliminarActivitat()
    {
        $session = session();
        $model = new Activitat();
        $model->where('id', $this->request->getVar('id'))->delete();
        $session->setFlashdata('msg', 'Se ha eliminado la actividad correctamente!');
        return redirect()->to('/admin');
    }

    public function eliminarUsuario()
    {
        $session = session();
        $model = new Usuari();
        $model->where('id', $this->request->getVar('id'))->delete();
        $session->setFlashdata('msg', 'Se ha eliminado el usuario.');
        return redirect()->to('/admin');
    }
}