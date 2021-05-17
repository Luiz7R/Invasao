<?php
class publicacoes_model extends CI_Model
{
		public function addPub()
		{
			//$this->input->post('txtpubarr')
			$usuario = $this->session->userdata("usuario_logado");
			$campo = array
			(
					'id_usuario' => $usuario['id'],
					'nome' => $usuario['nome'],
					'sobrenome' => $usuario['sobrenome'],
					'descricao' => htmlspecialchars($this->input->post('txtpubarr'), ENT_QUOTES)
					
			);
			$this->db->insert("timelinef", $campo);

			if ( $this->db->affected_rows() > 0 )
			{
				 return true;
			}
			else
			{
				 return false;
			}
		}

		public function updatePub()
		{
			//$this->input->post('txtPubEditAR'),
			$id = $this->input->post('txtIdPB');
			$usuario = $this->session->userdata("usuario_logado");
			$campo = array
			(
				'descricao' => htmlspecialchars($this->input->post('txtPubEditAR'), ENT_QUOTES),
				'id_usuario' => $usuario['id']
			);
			
			$this->db->where('id',$id);
			$this->db->update('timelinef',$campo);

			if ( $this->db->affected_rows() > 0 )
			{
				 return true;
			}
			else
			{
				 return false;
			}
		}

		public function editarPub()
		{
			$id = $this->input->get('id');
			$this->db->where('id',$id);
			$query = $this->db->get('timelinef');

			if ( $query->num_rows() > 0 )
			{
				 return $query->row();
			}
			else
			{
				 return false;
			}
		}

		public function deletarPub( )
		{
			$id = $this->input->get('id');
			$this->db->where('id',$id);
			$this->db->delete('timelinef');

			if ( $this->db->affected_rows( ) > 0 )
			{
				 return true;
			}
			else
			{
				 return false;
			}
		}
}