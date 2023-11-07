<?php
namespace App\Controllers;
Use App\Models\usuario_Model;
use CodeIgniter\Controller;

class login_controller extends BaseController
{
	public function index()
	{
		helper(['form', 'url']);

	$data['titulo']='login';
        echo view ('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('back/usuario/user_login');
        echo view('front/footer_view');
	}

	public function auth()
	{
		$session =session();
		$model = new usuario_Model();

	/*traemos los datos del formulario*/
	$email = $this->request->getVar('email');
	$password = $this->request->getVar('password');

		$data = $model->where('email', $email)->first();

		if($data){
		$pass = $data['password'];
		$ba = $data['baja'];
		if($ba == 'SI'){
		$session->setFlashdata('msg', 'Usuario dado de baja');
		return redirect()->to('/login_controller');
		}

		$verify_pass = password_verify($password, $pass);


		if($verify_pass){
		$ses_data = [
		'id_usuario' => $data['id_usuario'],
		'nombre' => $data['nombre'],
		'apellido' => $data['apellido'],
		'username' => $data['username'],
		'email' => $data['email'],
		'perfil_id' => $data['perfil_id'],
		'logged_in' => TRUE
		];

		$session->set($ses_data);

		session()->setFlashdata('msg', 'Bienvenido!!');
		return redirect()->to('/panel');
		}else{

		$session-> setFlashdata('msg', 'Password incorrecto');
        return redirect()->to('/login_controller');

		}
		}else{
		$session-> setFlashdata('msg', 'No existe email o es incorrecto');
        return redirect()->to('/login_controller');

		}
	}

	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('/');
	}
}