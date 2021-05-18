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

               $sqlQuery = "SELECT timelinef.nome, timelinef.sobrenome, timelinef.id, timelinef.descricao, pedidos_amizade.req_from_id, pedidos_amizade.req_to_id FROM timelinef 
                            INNER JOIN pedidos_amizade ON pedidos_amizade.req_from_id = timelinef.id_usuario 
                            OR pedidos_amizade.req_to_id = timelinef.id_usuario 
                            WHERE (pedidos_amizade.req_from_id = '".$usuarioId."' OR pedidos_amizade.req_to_id = '".$usuarioId."') 
                            AND pedidos_amizade.status_req = 'Aceito' 
                            GROUP BY timelinef.descricao 
                            ORDER BY pedidos_amizade.requestId DESC";

               $query = $this->db->query($sqlQuery);        

               if ( $query->num_rows() == 0 )
               {
                    $this->db->where("id_usuario", $usuarioId);
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
               //print_r($query->result_array());

               return $query->result_array();
          }

}