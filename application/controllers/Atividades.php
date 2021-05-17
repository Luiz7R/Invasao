<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atividades extends CI_Controller
{    
     function __construct()
     {
            parent::__construct();
            $this->load->model("atividades_model", "ativ");
     }
     public function timelinef() 
     {
          $result = $this->ativ->mostrarAtividades();
          echo json_encode($result);
     }

     public function showPosts() 
     {
          $result = $this->ativ->showAtividades();
          echo json_encode($result);
     }


}