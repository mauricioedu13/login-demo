<?php
	class datosModel extends CI_model
	{
		public function __construct()
		{
			$this->table = 'datos';
			$this->load->database();
		}

		public function registro($data)
		{

			$hash_pass = password_hash($data['password'], PASSWORD_DEFAULT);

			return $this->db->insert("datos", [
				"correo" => $data['correo'],
				"password"=>$hash_pass,
				"nombre" => $data['nombre'],
				"telefono" => $data['telefono'],
			]);
		}

		// es que no se estaba hasheando... 
		// aunque no sé donde es mejor ponerlo en el modelo o en el controlador :v 
		// lo wa dejar aquí
		public function get_login($correo, $pass)
		{
			$query = $this->db->get_where($this->table, ['correo' => $correo], 1);
			$row = $query->row();
			if( $row && password_verify($pass, $row->password) ){ return $row; }
			return NULL;
		}
	}
