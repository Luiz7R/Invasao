<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

	function __construct(){
		parent:: __construct();
		$this->load->model('usuarios_model', 'u_m');
		//$idUsuario = $this->session->userdata('usuario_logado')['id'];
	}

	public function criarConta( )
	{
		   $result = $this->u_m->criarConta();
		   $msg = array();
		   $msg['success'] = false;
		   $msg['type'] = 'add';
		   $msg['error'] = $result['error'];

		   if ( isset($result['success']) )	
		   {
			    $msg['success'] = true;
				$msg['error'] = $result['error']; 
		   }
		   echo json_encode($msg);

		// $result = $this->u_m->criarConta();
		// $msg = array();
		// $msg['success'] = false;
		// $msg['type'] = 'add';
		// $msg['error'] = isset($result['error']) ? $result['error'] : 0;

		// if ( isset($result['success']) )
		// {
		// 	 $msg['success'] = true;
		// 	 $msg['error'] = $result['error'];
		// }
		// echo json_encode($msg);
	}

}	