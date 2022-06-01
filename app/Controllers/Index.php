<?php

namespace App\Controllers;

use App\Models\Activitat;
use CodeIgniter\Controller;
use App\Models\Usuari;

class Index extends BaseController
{
    public function __construct(){
		helper(['form', 'url', 'html']);
        $this->db=db_connect();
	}

    public function index()
    {
        $session = session();
        if ($session->logged_in == false) {
            $query = $this->db->query("SELECT * FROM usuari WHERE id = ".$session->id);
            $results = $query->getRowArray();
            $dades['usuari'] = $results;
        }
        $query   = $this->db->query('SELECT * FROM activitat LIMIT 6');
        $results = $query->getResultArray();
        $dades = ['activitat' => $results];
        return view('index', $dades);
    } 

    public function ranking()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM usuari ORDER BY puntuacion DESC');
        $dades['top'] = $query->getResultArray();
        return view('ranking', $dades);
    }

    public function perfil()
    {
        return view('perfil');
    }

    public function experiencias()
    {
        return view('experiencias');
    }

    public function experiencia(){
        return view('experiencia');
    }

    public function login(){
        return view('login');
    }
}
