<?php

namespace App\Controllers;

use App\Models\Activitat;
use CodeIgniter\Controller;
use App\Models\Usuari;

class Index extends BaseController
{
    public function __construct(){
		helper(['form', 'url', 'html']);
		$db = \Config\Database::connect();
	}

    public function index()
    {
        $db = \Config\Database::connect();
        // $session = session();
        $query   = $db->query('SELECT * FROM activitat LIMIT 4');
        $results = $query->getResultArray();
        $dades = ['activitat' => $results];
        return view('index', $dades);
    } 

    public function ranking()
    {
        return view('ranking');
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
}
