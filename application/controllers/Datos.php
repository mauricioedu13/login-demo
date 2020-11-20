<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model("datosmodel");
		$this->load->helper(array('form', "url"));
	}

	// no hay index :v
	public function index()
	{
		return $this->login();
	}

	public function registro()
	{
		$info["titulo"] = "Registra datos";
		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('datos/registro', $info);
		$this->load->view('footer');
	}

	public function registrar()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('correo', 'correo', 'required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('nombre', 'nombre', 'required');
		$this->form_validation->set_rules('telefono', 'teléfono', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			return $this->registro();
		}
		
		$resultado = $this->datosmodel->registro([
			'correo' => $this->input->post('correo'),
			'password' => $this->input->post('password'),
			'nombre' => $this->input->post('nombre'),
			'telefono' => $this->input->post('telefono')
		]);

		if ($resultado){
			redirect("datos/login");
		} else {
			$this->registro();
		}
	}

	public function login()
	{
		// si el usuario ya está loggeado, lo redirigimos
		if ( $this->session->userdata('logged_user') )
		{
			redirect('/datos/user_panel');
		}

		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('login');
		$this->load->view('footer');
	}
	
	public function validar()
	{
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('id-usuario', 'Correo electrónico', 'trim|required');
		$this->form_validation->set_rules('contra', 'Correo electrónico', 'trim|required');
	
		if ($this->form_validation->run() == FALSE)
		{
			// Opcional. Se puede usar validation_errors() y un $this->load->view('vista')
			/* $this->session->set_flashdata('login_error', array(
				'type' => 'missing_fields',
				'message' => 'Hay errores en los campos. Verifique e intente de nuevo.'
			));
			redirect('/login', 'refresh'); */
			echo 'Error de validacion';
		}
		else
		{
			$login_id = $this->input->post('id-usuario');
			$pass = $this->input->post('contra');
	
			// El modelo de usuario no parece estar cargado... .
			if ( $user_data = $this->datosmodel->get_login($login_id, $pass) )
			{
				$this->session->set_userdata('logged_user', $user_data);
				redirect('/datos/user_panel', 'refresh');
			}
			else
			{
				echo 'Error de credenciales';
				// Opcional. Se puede usar validation_errors() y un $this->load->view('vista')
				/* $this->_result(array(
					'type' => 'danger',
					'message' => 'Credenciales incorrectas, verifique e intente de nuevo',
					'allow_back' => TRUE
				)); */
			}
		}
	}

	public function user_panel()
	{
		$data = ['user' => $this->session->logged_user];
		$this->load->view('head');
		$this->load->view('navbar');
		$this->load->view('user_panel', $data);
		$this->load->view('footer');
	}


	public function logout()
	{
		$this->session->sess_destroy();
		return redirect('datos/login');	
	}
}

// wtf con esto de abajo? ah es lo mio weno

/* class Miembros extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		if ( !$this->session->userdata('logged_user') )
		{
			redirect('/login');
		}
	}
	public function logout()
		{
			$this->session->sess_destroy();
			return redirect('/login');	
		}
	// ... todos los métodos ya no necesitan validar al usuario, porque lo hace el constructor
}
 */