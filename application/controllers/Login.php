<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
		 public function autenticar()
		 {
			 $this->load->model("usuarios_model");
			 $email = $this->input->post("emlinvs");
			 $senha = md5($this->input->post("pswdinvs") . "thesecretkeyinvsnetwork2747");
			 $usuario = $this->usuarios_model->logarUsuarios($email,$senha);

			 if ( $usuario )
			 {
				  $this->session->set_userdata("usuario_logado", $usuario);
				  $this->session->set_flashdata("success", "Logado com sucesso!" );
			 }
			 else
			 {
				  $this->session->set_flashdata("danger", "E-mail ou Senha inválidos! ");
				  redirect('/Login');
				  return false;
			 }
			 redirect('/');
		 }
	//   public function autenticar()
	//   {
	// 		$this->load->model("usuarios_model");
	// 		$email = $this->input->post("emlinvs");
	// 		$senha = md5($this->input->post("pswdinvs") . "thesecretkeyinvsnetwork2747");					 
	// 		$usuario = $this->usuarios_model->logarUsuarios($email, $senha);

	// 		if($usuario){
	// 			$this->session->set_userdata("usuario_logado", $usuario);
	// 			$this->session->set_flashdata("success", "Logado com sucesso!" );
	// 		}else{
	// 			$this->session->set_flashdata("danger", "E-mail ou Senha inválidos! ");
	// 			redirect('/Login');
	// 			return false;
	// 		}
	// 		redirect('/');	  		
	//   }

	  public function logout ()
	  {
			$this->session->unset_userdata("usuario_logado");
		    $this->session->set_flashdata("success", "Deslogado com sucesso!");
	        redirect('/Login');
	  }	 

	 public function index ()
	 {
	 	$this->load->view('templates/headerlogin');
	 	$this->load->view('homepage');
	 	$this->load->view('templates/footer');
	 }   
}
