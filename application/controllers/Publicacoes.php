<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publicacoes extends CI_Controller
{    
     function __construct()
     {
            parent::__construct();
            $this->load->model("publicacoes_model", "pb");
     }
     public function addPub() 
     {
          $pub = $this->pb->addPub();
          $msg['success'] = false;
          $msg['type'] = 'add';

          if ( $pub )
          {
               $msg['success'] = true;
          }
          echo json_encode($msg);
     }

     public function updatePub()
     {
          $result = $this->pb->updatePub();
          $msg['success'] = false;
          $msg['type'] = 'update';
          
          if ( $result )
          {
               $msg['success'] = true;
          }
          echo json_encode($msg);
     }

     public function editarPub()
     {
          $result = $this->pb->editarPub();
          echo json_encode($result);
     }

     public function deletarPub( )
     {
          $resultado = $this->pb->deletarPub( );
          $msg['success'] = false;

          if ( $resultado )
          {
               $msg['success'] = true;
          }
          echo json_encode($msg);
     }
}