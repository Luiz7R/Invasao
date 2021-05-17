<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller 
{
        function __construct()
        {
                parent::__construct();
                $this->load->model("search_model", "sc");
        }

        public function amgAction()
        {
              $usuario_id = $this->session->userdata("usuario_logado")['id'];
              $action = $this->input->post("action");  

              if ( isset($action) )
              {
                   if ( $action == 'send_request' )  
                   {
                        $pedido_amz = array(
                           'req_from_id' => $usuario_id,
                           'req_to_id' => $this->input->post("toID"),
                           'status_req' => 'Pedido Enviado',
                           'req_noti_st' => 'Nao'    
                        );   
                   }
                   $this->sc->salvarPedido($pedido_amz);  
              }          
        }

        public function amgNotif()
        {
              $resultado = $this->sc->amgNotificacoes();  
              
              return json_encode($resultado);
        }

        public function amgRequest( )
        {
              $resultado = $this->sc->amgRequest( );
                
              return json_encode($resultado);
        }

        public function removeFriendReq()
        {
            $resultado = $this->sc->removeFriendReq( );             
        }


        public function addFriendRequest()
        {
            $resultado = $this->sc->addFriendRequest( );             
        }

        public function loadFriends()
        {
            $resultado = $this->sc->loadFriends( );             
        }        

        public function searchAction()
        {     
                 $resultado = $this->sc->searchBack();
                 
                 return json_encode($resultado);
        }

        public function searchResults()
        {
                $search = $this->input->post("searchbar");
                
                if ( $search )
                {
                     /*$result = $this->sc->searchRes();
                     $dados = array("searchResult" => $result, "searchQ" => $search);*/
                     
                     $dados = array("searchQ" => $search);
                     $this->load->view('templates/header');
                     $this->load->view("search", $dados);  
                     $this->load->view('templates/footer');        
                }
                else
                {
                   redirect('/');     
                }
        }

        public function SearchAct( )
        {
            $result = $this->sc->searchProfile();
            echo json_encode($result);
        }

        // public function getRequest_Status ( )
        // {
        //         $resultado = $this->sc->getRequest( $from_userID, $to_userID );

        // }

}