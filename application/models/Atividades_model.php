<?php
class Atividades_model extends CI_Model
{
		public function mostrarAtividades()
          {    
               $usuarioId = $this->session->userdata("usuario_logado")['id'];

               $this->db->where("id_usuario", $usuarioId); //get_where("usr_invs", array('id', $usuarioId) );

               $query = $this->db->get('timelinef');

               if ( $query->num_rows() > 0 )
               {
                    return $query->result();
               }
               else
               {
                    return false;
               }
          }

          public function showAtividades()
          {
               $usuarioId = $this->session->userdata("usuario_logado")['id'];

               $sqlQuery = "SELECT p.id, p.nome, p.sobrenome, p.descricao FROM timelinef p JOIN pedidos_amizade f 
                            ON p.id_usuario = f.req_to_id OR p.id_usuario = f.req_from_id
                            WHERE f.req_to_id = 161 OR f.req_from_id = 161
                            GROUP BY p.id DESC";

               $query = $this->db->query($sqlQuery);        

               //print_r($query->result_array());

               return $query->result_array();
          }

}