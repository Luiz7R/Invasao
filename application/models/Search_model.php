<?php
class Search_model extends CI_Model 
{

     
        public function searchProfile( )
        { 
                $usuario_id = $this->session->userdata("usuario_logado")['id'];

                $query = $this->input->post("query");

                if ( isset($query) )
                {
                     $search_query = preg_replace('#[^a-z 0-9?!]#i', '', $query);
                     $search_array = explode(" ",$search_query);
                     
                     foreach( $search_array as $search )
                     {
                         $this->db->like('nome',$search);
                         $this->db->like('sobrenome',$search);
                     }
                        $this->db->where('id !=', $usuario_id);
                        $this->db->limit(10);

                        $result = $this->db->get("usr_invs");

                        if ( $result->num_rows() > 0 )
                        {
                             return $result->result();
                        }
                        else
                        {
                            return false;    
                        }
                }
        }

        public function searchRes( )
        { 
                $usuario_id = $this->session->userdata("usuario_logado")['id'];

                $query = $this->input->post("searchbar");

                if ( isset($query) )
                {
                     $search_query = preg_replace('#[^a-z 0-9?!]#i', '', $query);
                     $search_array = explode(" ",$search_query);
                     
                     foreach( $search_array as $search )
                     {
                         $this->db->like('nome',$search);
                         $this->db->like('sobrenome',$search);
                     }
                        $this->db->where('id !=', $usuario_id);
                        $this->db->limit(10);

                        $result = $this->db->get("usr_invs");

                        if ( $result->num_rows() > 0 )
                        {
                             return $result->result();
                        }
                        else
                        {
                            return false;    
                        }
                }
        }

        public function searchBack()
        {
            $usuario_id = $this->session->userdata("usuario_logado")['id'];

            $queryRes = $this->input->post("queryRes");
            $pagina = $this->input->post("page");  

            if ( isset($queryRes) )
            {
                   $search_query = preg_replace('#[^a-z 0-9?!]#i', '', $queryRes);
                   $search_array = explode(" ",$search_query);
                   $searchOutput = '';

                   foreach( $search_array as $search )
                   {
                       $this->db->like('nome',$search);
                       $this->db->or_like('sobrenome',$search);
                   }

                   $this->db->where('id !=', $usuario_id);

                   $result = $this->db->get("usr_invs");

                   $totalData = $result->num_rows();
                   $resultado = $result->result_array();

                   if ( $totalData > 0 )
                   {     

                        foreach ( $resultado as $row )
                        {
                                $status = $this->getRequest($usuario_id, $row['id'] );

                                if ( $status == 'Pedido Enviado' )
                                {   
                                     $button = '<button type="button" name="request_button" class="btn btn-primary" disabled>
                                                     <i class="fa fa-clock-o" aria-hidden="true"></i> Pedido Enviado
                                                </button>';   
                                }
                                else if ( $status == 'Rejeitado' )
                                {
                                    $button = '<button type="button" name="request_button" class="btn btn-warning" disabled>
                                                    <i class="fa fa-ban" aria-hidden="true"></i> Rejeitado
                                               </button>';                                       
                                }
                                else
                                {
                                    $button = '
                                    <button type="button" name="request_button" id="add_request_'.$row['id'].'" class="btn btn-primary request_button" 
                                        data-userid="'.$row['id'].'">
                                            <i class="fa fa-super-plus"></i>
                                        Add Amigos
                                    </button>                                      
                                    ';
                                }

                                $searchOutput .= '
                                    <div class="wrapper-box">
                                        <div class="row">
                                             <div class="col-md-1 col-sm-3 col-xs-3">
                                             
                                             </div>
                                             <div class="col-md-9 col-sm-6 col-xs-5">
                                                    <div class="wrapper-box-title">'.$row['nome']. ' ' . $row['sobrenome'] .'</div>
                                                    <div class="wrapper-box-description">
                                                            <i></i>
                                                    </div>
                                             </div>
                                             <div class="col-md-2 col-sm-3 col-xs-4" align="right">'.$button.'</div>    
                                        </div>
                                    </div>
                                ';
                        }
                   }
                   else
                   {
                        $searchOutput .= '
                                <div class="wrapper-box">
                                     <h4 align="center">Dados não encontrados</h4>   
                                </div>
                        ';
                   }

                   echo $searchOutput;
            } 

        }

        public function salvarPedido($pedido_env)
        {
             $this->db->insert("pedidos_amizade", $pedido_env);

             if ( $this->db->affected_rows() > 0 )
             {
                  return true;
             }
             else
             {
                 return false;
             }
        }

        public function getUsuario ( $usuarioId )
        {
            $this->db->where("id", $usuarioId);
            $query = $this->db->get("usr_invs");
            $resultado = $query->result_array();

            return $resultado;

        }

        public function getRequest( $from_userID, $to_userID )
        {
            $resultado = '';

            $sqlQuery = "SELECT status_req FROM pedidos_amizade 
                         WHERE (req_from_id = ".$from_userID." AND req_to_id = ".$to_userID.")
                         OR    (req_from_id = ".$to_userID."   AND req_to_id = ".$from_userID.") 
                         AND status_req != 'Pedido Enviado'
                         ";

            $query = $this->db->query($sqlQuery)->result_array();

            foreach ( $query as $row )
            {
                $resultado = $row['status_req'];
            }
            
            return $resultado;
        }

        public function getNomeUsuario($usuario_id)
        {
             $this->db->where("id", $usuario_id);
             
             $query = $this->db->get("usr_invs");
             
             $resultado = $query->result_array();

             foreach ( $resultado as $row )
             {
                       return $row['nome'];
             }

        }

        public function amgNotificacoes()
        {
            if( $this->input->post("action") == "cont_requi_naoLidas" )
            {
                $usuario_id = $this->session->userdata("usuario_logado")['id'];

                $sqlQuery = "SELECT COUNT(requestId) as Total FROM pedidos_amizade WHERE (req_to_id = ".$usuario_id.")
                             AND status_req = 'Pedido Enviado' AND req_noti_st = 'Nao' ";

                $resultado = $this->db->query($sqlQuery)->result_array();             

                foreach ( $resultado as $row )
                {
                    echo $row['Total'];
                }

            }
        }

        public function amgRequest()
        {
             if ( $this->input->post("action") == 'load_amg_request' )
             {
                  $usuario_id = $this->session->userdata("usuario_logado")['id'];
                  $sqlQuery = "SELECT * FROM pedidos_amizade WHERE (req_to_id = ".$usuario_id.") AND status_req = 'Pedido Enviado' 
                  ORDER BY requestId DESC";
                  
                  $resultado = $this->db->query($sqlQuery)->result_array();

                  $res = '';

                  foreach ( $resultado as $row )
                  {
                            $usuarioData = $this->getUsuario( $row['req_from_id'] );
                            $nomeUsuario = '';

                            foreach ( $usuarioData as $usuario )
                            {
                                      $nomeUsuario = $usuario['nome'];  
                            }

                            $res .= '
                            <li>
                                <b class="text-primary">'.$nomeUsuario.'</b>
                                <button type="button" name="acc_friendReq_Btn" class="btn-primary btn-xs pull-right acc_friendReq_Btn" data-requestId="'.$row["requestId"].'" id="acc_friendReq_Btn_'.$row['requestId'].'">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Aceitar</button>
                                </button>
                            </li>
                            ';
                  }
                  echo $res;  

             }
        }
        

        public function removeFriendReq()
        {
             if ( $this->input->post("action") == 'removeFriendReq' )
             {
                  $usuario_id = $this->session->userdata("usuario_logado")['id'];
                  $sqlQuery = "UPDATE pedidos_amizade SET req_noti_st = 'Sim' WHERE (req_to_id = ".$usuario_id.") 
                              AND req_noti_st = 'Nao' ";
                  
                  $this->db->query($sqlQuery);

             }
        }

        public function addFriendRequest()
        {
             if ( $this->input->post("action") == 'addFriendRequest' )
             {
                  $requestId = $this->input->post("requestId");
                  
                  $sqlQuery = "UPDATE pedidos_amizade SET status_req = 'Aceito' WHERE (requestId = ".$requestId.")";
                  
                  $this->db->query($sqlQuery);
  
             }
        }

        public function loadFriends()
        {
             if ( $this->input->post("action") == 'loadFriends' )
             { 
                  $cond = "";
                  
                  if ( !empty($this->input->post("query")) )
                  {
                       $searchQuery = preg_replace('#[^a-z 0-9?!]#i', '', $this->input->post("query"));
                       $searchArray = explode(" ", $searchQuery);

                       $cond = ' AND (';

                       foreach( $searchArray as $search )
                       {
                                if ( trim($search) != '' )
                                {
                                     $cond .= "usr_invs.nome LIKE '%".$search."%' OR "; 
                                }
                       }

                       $cond = substr($cond, 0, -4) . ") ";
                  }

                  $usuario_id = $this->session->userdata("usuario_logado")['id'];
                  $sqlQuery = "SELECT usr_invs.nome, pedidos_amizade.req_from_id, pedidos_amizade.req_to_id FROM usr_invs
                               INNER JOIN pedidos_amizade
                               ON pedidos_amizade.req_from_id = usr_invs.id
                               OR pedidos_amizade.req_to_id = usr_invs.id
                               WHERE (pedidos_amizade.req_from_id = '".$usuario_id."' OR pedidos_amizade.req_to_id = '".$usuario_id."')
                               AND usr_invs.id != ".$usuario_id." AND pedidos_amizade.status_req = 'Aceito'
                               ".$cond."
                               GROUP BY usr_invs.nome 
                               ORDER BY pedidos_amizade.requestId DESC
                  "; 
                                  
                  $query = $this->db->query($sqlQuery);

                  $resultado = $query->result_array();

                  $html = '';

                  if ( $this->db->affected_rows() > 0 )
                  {
                       $cont = 0; 
                       
                       foreach( $resultado as $row )
                       {
                            $tempUserId = 0;

                            if   ( $row["req_from_id"] == $usuario_id )
                            {
                                   $tempUserId = $row["req_to_id"]; 
                            }   
                            else
                            {
                                   $tempUserId = $row["req_from_id"];
                            }
                            $cont++;

                            if ( $cont == 1 )
                            {
                                 $html .= '<div class="row">';
                            }

                            $html .= '
                            <div class="col-md-6" style="margin-bottom: 15px;">
                              
                               <div align="center"><b><a href="#" style="font-size: 15px;">'.$this->getNomeUsuario($tempUserId).'</a></b></div>
                            </div>    
                            ';

                            if ( $cont == 3 )
                            {
                                 $html .= '</div>'; 
                                 $cont = 0;
                            }
                       } 
                  }
                  else
                  {
                      $html = '<h4 align="center">Amigos Não Encontrado</h4>';
                  }
                  echo $html;
  
             }
        }

}