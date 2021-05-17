<?php
class Comentarios_model extends CI_Model
{
        public function mostrarComentarios( )
        {
            $postId = $this->input->get('id');
            
            $this->db->where("post_id", $postId);

            $query = $this->db->get('coment_invs');

            if ( $query->num_rows() > 0 )
            {
                 return $query->result( );
            }
            else
            {
                 return false;
            }
        }


        public function criarComent( ) //( $coment, $postId, $usuario_id )
        {      
             $Usuario = $this->session->userdata("usuario_logado");

             $postId = $this->input->post('id');
             $Comentario = htmlspecialchars($this->input->post('com'), ENT_QUOTES);
             
             $this->db->where("id",$postId);
             $query = $this->db->get("timelinef");

             if ( ! $query->num_rows() > 0 )
             {
                  echo 'Erro: publicação não encontrada';
                  return false;
             }
             else
             {
                  $campo = array
                  (
                         "post_id" => $postId,
                         "usuario_id" => $Usuario['id'],
                         "comentario" => $Comentario,
                         "autor_coment" => $Usuario['nome'] . ' ' . $Usuario['sobrenome']
                  );

                  $this->db->insert("coment_invs", $campo);

                  if ( $this->db->affected_rows() > 0 )
                  {
                       return true;  
                  }
                  else
                  {
                       return false;
                  }
                  
                  
             }
        }
}