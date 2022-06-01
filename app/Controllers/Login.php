<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\Usuari;
  
class Login extends BaseController
{
    public function index()
    {
        helper(['form']);
        $session = session();
        // if ($session->has('nom_usuari')) {
        //     return redirect()->to('/dashboard');
        // }
        return view('login');
    } 

    public function __construct(){
		helper(['form', 'url', 'html']);
		$this->db = db_connect();
		$db = \Config\Database::connect();
	}
  
    public function auth()
    {
        $session = session();
        $dades=$this->request->getVar();
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
                $pass = $data['contrasenya'];
                if($pass == $contrasenya){
                    $ses_data = [
                        'id' => $data['id'],
                        'nom_usuari'       => $data['nom_usuari'],
                        'email'     => $data['email'],
                        'telefon'    => $data['telefon'],
                        'img' => $data['img'],
                        'tipo_img' => $data['tipo_img'],
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