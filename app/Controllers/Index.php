<?php

namespace App\Controllers;

// use CodeIgniter\HTTP\RequestInterface;
// use CodeIgniter\HTTP\ResponseInterface;
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
        $query   = $this->db->query('SELECT * FROM activitat ORDER BY id ASC LIMIT 8 ');
        // $results = $query->getResultArray();
        $model = new Subcategoria();
        $dades = ['activitat' => $query->getResultArray(),'aerea' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatica' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll()];
        return view('index', $dades);
    }

    public function ranking()
    {
        // $db = \Config\Database::connect();
        $query = $this->db->query('SELECT * FROM usuari ORDER BY puntuacion DESC');
        $model = new Subcategoria();
        $dades = ['top' => $query->getResultArray(),'aerea' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatica' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll()];
        return view('ranking', $dades);
    }

    public function perfil()
    {
        $session = session();
        $model = new Subcategoria();
        $modelUser = new Usuari();
        if (isset($_GET['id'])) {
            $query = $this->db->query("SELECT TIMESTAMPDIFF(YEAR,data_naixament,CURDATE()) AS edad FROM usuari where id = ".$this->request->getVar('id'));
            $row = $query->getRow();
            $dades = ['usuari' => $modelUser->find($this->request->getVar('id')),'edad' => $row->edad,'aerea' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatica' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll()];
        }
        else {
            $query = $this->db->query("SELECT TIMESTAMPDIFF(YEAR,data_naixament,CURDATE()) AS edad FROM usuari where id = ".$session->id);
            $row = $query->getRow();
            $dades = ['usuari' => $modelUser->find($session->id),'edad' => $row->edad,'aerea' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatica' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll()];
        }
        return view('perfil',$dades);
    }

    public function experiencias()
    {
        $model = new Subcategoria();
        $modelAct = new Activitat();
        $dades = [
            'aerea' => $model->where('id_categoria', 1)->findAll(), 
            'terrestre' => $model->where('id_categoria', 2)->findAll(), 
            'acuatica' => $model->where('id_categoria', 3)->findAll(), 
            'viajes' => $model->where('id_categoria', 4)->findAll(),
            'aerea_content' => $modelAct->where('categoria', 'aerea')->findAll(),
            'terrestre_content' => $modelAct->where('categoria', 'terrestre')->findAll(),
            'acuatica_content' => $modelAct->where('categoria', 'acuatica')->findAll(),
            'viajes_content' => $modelAct->where('categoria', 'viajes')->findAll(),
        ];
        return view('experiencias',$dades);
    }

    public function experiencia()
    {
        $modelAct = new Activitat();
        $model = new Subcategoria();
        $dades = ['experiencia' => $modelAct->find($this->request->getVar('id')),'aerea' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatica' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll()];
        return view('experiencia',$dades);
    }

    public function login()
    {
        $session = session();
        if ($session->logged_in == false) {
            $model = new Subcategoria();
            $dades = ['aerea' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatica' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll()];
            return view('login',$dades);
        }
        else {
            return redirect()->to('/');
        }
    }  
    
    public function subcategoria()
    {
        $modelAct = new Activitat();
        $model = new Subcategoria();
        $idSub = $this->request->getVar('id');
        $query = $this->db->query("SELECT nom FROM subcategoria WHERE id=$idSub LIMIT 1");
        $subcategoria = $query->getRow();
        $comprobacion = $this->db->query("SELECT * FROM activitat WHERE subcategoria = '$subcategoria->nom'");
        if (empty($comprobacion->getResult())) {
            $dades = ['aerea' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatica' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll(), 'nomSubCat'=>$model->find($this->request->getVar('id'))];
        }
        else {
            $dades = ['activitat' => $modelAct->where('subcategoria', $subcategoria->nom)->findAll(),'aerea' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatica' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll(), 'nomSubCat'=>$model->find($this->request->getVar('id'))];
        }
        return view('subcategoria', $dades);
    }

    public function categoria()
    {
        $modelAct = new Activitat();
        $model = new Subcategoria();
        $idCat = $this->request->getVar('id');
        $query = $this->db->query("SELECT nom FROM categoria WHERE id=$idCat");
        $categoria = $query->getRow();
        $query = $this->db->query("SELECT * FROM subcategoria WHERE id_categoria=$idCat");
        $subcategoria = $query->getResultArray();
        $comprobacion = $this->db->query("SELECT * FROM activitat WHERE categoria = '$categoria->nom'");
        if (empty($comprobacion->getResult())) {
            $dades = ['aerea' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatica' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll(), 'nomSubCat'=> $subcategoria];
        }
        else {
            $dades = ['activitat' => $modelAct->where('categoria', $categoria->nom)->findAll(),'aerea' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatica' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll(), 'nomCat'=>$model->find($this->request->getVar('id')), 'nomSubCat'=> $subcategoria];
        }
        return view('categoria', $dades);
    }

    public function buscador()
    {
        
    }

}
