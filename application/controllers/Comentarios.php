<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Comentarios extends CI_Controller
{
    
     function __construct( )
     {
           parent:: __construct( );
           $this->load->model("comentarios_model","coment"); 
     }

     public function comentarios()
     {
         $resultado = $this->coment->mostrarComentarios();
         echo json_encode($resultado);
     }

     public function postComent()//($coment,$postId,$usuario_id)
     { 
            $postComent = $this->coment->criarComent();//($coment,$postId,$usuario_id);

            $msg['success'] = false;
            $msg['type'] = 'add';

            if ( $postComent )
            {
                 $msg['success'] = true;
            }
            echo json_encode($msg);
     }
}
