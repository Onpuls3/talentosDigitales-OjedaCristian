<?php
namespace App\Controllers;
Use App\Models\usuario_Model;
use CodeIgniter\Controller;

class usuario_controller extends Controller{

	public function __construct(){
		helper(['form', 'url']);
	}

	public function create() {

	$data['titulo']='registrarse';
        echo view ('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/registrarse');
        echo view('front/footer_view');
	}

	public function formValidation() {

		$input = $this->validate([
    'nombre'   => 'required|min_length[3]',
    'apellido' => 'required|min_length[3]|max_length[25]',
    'username' => 'required|min_length[3]',
    'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
    'password' => 'required|min_length[3]|max_length[10]'
    ]);

		$formModel = new usuario_Model();

		if (!$input) {
		$data['titulo']='registrarse';
        echo view ('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/registrarse', ['validation' => $this->validator]);
        echo view('front/footer_view');
	
		} else {
        $formModel->save([
            'nombre'   => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ]);

        session()->setFlashdata('success', 'Usuario registrado con éxito');
        return redirect()->to(base_url('user_login'));

    }

    
}

}