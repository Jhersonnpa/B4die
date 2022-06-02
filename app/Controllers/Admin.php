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
        $data = ['aereo' => $modelSubcategoria->where('id_categoria', 1)->findAll(), 'terrestre' => $modelSubcategoria->where('id_categoria', 2)->findAll(), 'acuatico' => $modelSubcategoria->where('id_categoria', 3)->findAll(), 'viajes' => $modelSubcategoria->where('id_categoria', 4)->findAll(),"usuaris" => $usuaris, "activitats" => $activitats, "categorias" => $categorias, "subcategorias" => $subcategorias];
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
		];

		if($this->validate($regles,$missatges)){
			$model = new Activitat();
            $model->save($dades);
            $session->set('msg', 'Se ha añadido correctamente!');
            return redirect()->to('/admin');
			
		}
		else {
            $session->set('msg', 'No se ha podido añadir la actividad.');
            return redirect()->to('/admin');
		}
          
    }

    public function eliminarActivitat()
    {
        $model = new Activitat();
        $model->where('id', $this->request->getVar('id'))->delete();
        return redirect()->to('/admin');
    }

    public function eliminarUsuario()
    {
        $model = new Usuari();
        $model->where('id', $this->request->getVar('id'))->delete();
        return redirect()->to('/admin');
    }
}