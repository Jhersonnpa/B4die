<?php

namespace App\Controllers;

use App\Models\Activitat;
use CodeIgniter\Controller;
use App\Models\Usuari;
use App\Models\Subcategoria;

class Index extends BaseController
{
    public function __construct(){
		helper(['form']);
        $this->db=db_connect();
	}

    public function index()
    {
        $session = session();
        if ($session->logged_in == false) {
            $query = $this->db->query("SELECT * FROM usuari WHERE id = '$session->id'");
            $results = $query->getRowArray();
            $dades['usuari'] = $results;
        }
        $query   = $this->db->query('SELECT * FROM activitat LIMIT 8');
        $results = $query->getResultArray();
        $model = new Subcategoria();
        $dades = ['aereo' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatico' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll()];
        $dades = ['activitat' => $results];
        return view('index', $dades);
    } 

    public function ranking()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM usuari ORDER BY puntuacion DESC');
        // $dades['top'] = $query->getResultArray();
        $model = new Subcategoria();
        $dades = ['top' => $query->getResultArray(),'aereo' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatico' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll()];
        return view('ranking', $dades);
    }

    public function perfil()
    {
        $session = session();
        $model = new Subcategoria();
        $dades = ['aereo' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatico' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll()];
        if ($session->logged_in == false) {
            return redirect()->to('/');
        }
        else {
            $model = new Usuari();
            $usuari = $model->find($session->id);
            return view('perfil',$usuari);
        }
    }

    public function experiencias()
    {
        $model = new Subcategoria();
        $dades = ['aereo' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatico' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll()];
        return view('experiencias',$dades);
    }

    public function experiencia(){
        $modelAct = new Activitat();
        // $dades['experiencia'] = $model->find($this->request->getVar('id'));
        $model = new Subcategoria();
        $dades = ['experiencia' => $modelAct->find($this->request->getVar('id')),'aereo' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatico' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll()];
        return view('experiencia',$dades);
    }

    public function login(){
        $model = new Subcategoria();
        $dades = ['aereo' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatico' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll()];
        return view('login',$dades);
    }
    
}
