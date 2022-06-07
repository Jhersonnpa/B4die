<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\Usuari;
use App\Models\Subcategoria;
  
class Login extends BaseController
{
    public function index()
    {
        helper(['form']);
        $model = new Subcategoria();
        $dades = ['aereo' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatico' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll()];
        return view('login', $dades);
    } 

    public function __construct(){
		helper(['form', 'url', 'html']);
		$this->db = db_connect();
	}
  
    public function auth()
    {
        $session = session();
        $dades=$this->request->getVar();
        $model = new Subcategoria();
        $dades = ['aereo' => $model->where('id_categoria', 1)->findAll(), 'terrestre' => $model->where('id_categoria', 2)->findAll(), 'acuatico' => $model->where('id_categoria', 3)->findAll(), 'viajes' => $model->where('id_categoria', 4)->findAll()];
    	$regles = [
			"nom_usuari" => "required",
			"contrasenya" => "required",
		];

		$missatges = [
			"nom_usuari" => [
				"required" => "Introduce un nombre de usuario",
				],
			"contrasenya" => [
				"required" => "Contraseña vacia",
				],
		];

        if($this->validate($regles,$missatges)){
            
            $model = new Usuari();
            $nom_usuari = $this->request->getVar('nom_usuari');
            $contrasenya = md5($this->request->getVar('contrasenya'));
            $data = $model->where('nom_usuari', $nom_usuari)->first();
            if($data){
                $query = $this->db->query("SELECT TIMESTAMPDIFF(YEAR,data_naixament,CURDATE()) AS edad FROM usuari where id = ".$data['id']);
                $row = $query->getRow();
                $pass = $data['contrasenya'];
                if($pass == $contrasenya){
                    $ses_data = [
                        'id' => $data['id'],
                        'nom_usuari'       => $data['nom_usuari'],
                        'nom' => $data['nom'],
                        'cognom' => $data['cognom'],
                        'email'     => $data['email'],
                        'data_naixament'  => $data['data_naixament'],
                        'pais' => $data['pais'],
                        'telefon'    => $data['telefon'],
                        'img' => $data['img'],
                        'edad' => $row->edad,
                        'tipo_img' => $data['tipo_img'],
                        'tipo_usuari' => $data['tipo_usuari'],
                        'puntuacion' => $data['puntuacion'],
                        'rango' => $data['rango'],
                        'logged_in'     => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to('/');
                }else{
                    $session->setFlashdata('msg', 'Contraseña erronea.');
                    return redirect()->to('/login');
                }
            }else{
                $session->setFlashdata('msg', 'No existe el usuario.');
                return redirect()->to('/login');
            }
        }
        else {
            $dades["validation"]=$this->validator;
    		return view('login',$dades);
        }
        
        
    }
  
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}