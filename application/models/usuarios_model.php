<?php
class usuarios_model extends CI_Model 
{
		public function salvar($usuario) 
		{
			$this->db->insert("usr_invs", $usuario);
			if($this->db->affected_rows() > 0 ){
				return true;
			}else{
				return false;
			}			
		}

		public function logarUsuarios($email, $senha) {
			$this->db->where("email", $email);
			$this->db->where("senha", $senha);
			$usuario = $this->db->get("usr_invs")->row_array();
			return $usuario;
		}

		public function criarConta()
		{	
			//$this->load->model("usuarios_model");
			// $usuario = array(
			// 	"nome" => $this->input->post("nomeinvsca"),
			// 	"sobrenome" => $this->input->post("sobrenomeinvsca"),
			// 	"email" => $this->input->post("emlivnsca"),
			// 	"data_nasc" => $dataFormatada,
			// 	"sexo" => $this->input->post("sexo"),
			// 	"senha" => md5($this->input->post("pswdinvsca") . "thesecretkeyinvsnetwork2747")
			// );

			$errors = array();
			$dataNasc = DateTime::CreateFromFormat('d/m/yy', $this->input->post("dataAnivinvsca"));
			$dataFormatada = $dataNasc->format('Y-m-d');

			htmlspecialchars($this->input->post('com'), ENT_QUOTES);

			$usuario = array(
				"nome" => htmlspecialchars($this->input->post("nomeinvsca"), ENT_QUOTES),
				"sobrenome" => htmlspecialchars($this->input->post("sobrenomeinvsca"), ENT_QUOTES),
				"email" => htmlspecialchars($this->input->post("emlivnsca"), ENT_QUOTES),
				"data_nasc" => $dataFormatada,
				"sexo" => $this->input->post("sexo"),
				"senha" => md5($this->input->post("pswdinvsca") . "thesecretkeyinvsnetwork2747")
			);
	
			if ( ! $this->validateEmail($usuario['email']) )
			{
				 $errors['error'] = 2;
				 return $errors;
			}
			else if ( $this->verifyEmail($usuario['email']) )
			{
				 $errors['error'] = 3;
				 return $errors;	
			}
			else
			{
				$salvar = $this->salvar($usuario);
				$response['error'] = 0;
	
				if ( $salvar )
				{
					 $response['success'] = true;
					 return $response;
				}
				else
				{
					 $response['success'] = false;
					 return $response;
				}	
			}

			// $errors = array();

			// $dataNasc = DateTime::createFromFormat('d/m/yy',$this->input->post("dataAnivinvsca"));
			// $dataFormatada = $dataNasc->format('Y-m-d');
			// $usuario = array (
			// 	"nome" => $this->input->post("nomeinvsca"),
			// 	"sobrenome" => $this->input->post("sobrenomeinvsca"),
			// 	"email" => $this->input->post("emlivnsca"),
			// 	"data_nasc" => $dataFormatada,
			// 	"sexo" => $this->input->post("sexo"),
			// 	"senha" => md5($this->input->post("pswdinvsca") . "thesecretkeyinvsnetwork2747")
			// );

			// if ( ! $this->validateEmail($usuario['email']) )
			// {
			// 	 $errors['error'] = 2;	
			// 	 return $errors;
			// }

			// $this->db->where('email',$usuario['email']);
			// $query = $this->db->get('usr_invs');
			// $cadastrados = $query->num_rows();

			// if ( $cadastrados > 0 )
			// {
			// 	$errors['error'] = 3;	
			// 	return $errors;
			// }

			// $this->db->insert("usr_invs", $usuario);
			// $usr = $this->logarUsuarios($usuario['email'], $usuario['senha']);

			// if ( $usr )
			// {	
			// 	$this->session->set_userdata("usuario_logado", $usuario);
			// 	$this->session->set_flashdata("success", "Conta criada com sucesso!" ); 
			// 	$response['error'] = 0;

			// 	if ( $this->db->affected_rows() > 0 )
			// 	{
			// 		$response['success'] = true;
			// 			return $response;
			// 	}
			// 	else
			// 	{
			// 		$response['success'] = false;  	
			// 			return $response;
			// 	}				
			// } 

			// $response = array();

			// if ( ! $this->validateEmail($this->input->post("emlivnsca")) )
			// {	
			// 	 $response['error'] = 2;
			// 	 $response['success'] = false;
			// }
			// if ( $this->verifyEmail($this->input->post("emlinvsca")) )
			// {
			// 	 $response['error'] = 3;
			// 	 $response['success'] = false;
			// }
			// if ( $response['success'] == false )
			// {
			// 	return $response;
			// }
			// else
			// {	



		}

		public function verifyEmail($email)
		{
			$this->db->where('email',$email);
			$query = $this->db->get('usr_invs');
			
			if ($query->num_rows() > 0 ){
				return true;
			}
			else{
				return false;
			}
		}

		public function validateEmail ($email)
		{
			if ( filter_var($email, FILTER_VALIDATE_EMAIL) )
			{
				 return true;
			}
			else
			{
				$this->session->set_flashdata("danger", "Email Inválido!" );
				return false;
			}
		}

}