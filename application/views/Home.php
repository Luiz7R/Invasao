<?php 
    if ( ! ($this->session->userdata("usuario_logado")) )
    {
         redirect("/Login");
    }
    $usuario_id = $this->session->userdata("usuario_logado")['id'];


?>   

<style>
  ul#menu li
  {
    display:inline;
  }
</style>

<!-- col-xs-6 col-md-12 -->

<div class="container-fluid">
  <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="#" style="margin-top: 35px;">
                      <span data-feather="file"></span>
                      Página Inicial
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="users"></span>
                      Amigos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="shopping-cart"></span>
                      Páginas
                    </a>
                  </li>              
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="bar-chart-2"></span>
                      Grupos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="layers"></span>
                      Salvos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="layers"></span>
                      Mensagens
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="layers"></span>
                      Videos
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <span data-feather="layers"></span>
                      Pessoas
                    </a>
                  </li>                                          
              </ul>

              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Seus Grupos</span>
                <a class="d-flex align-items-center text-muted" href="#">
                  <span data-feather="plus-circle"></span>
                </a>
              </h6>
              <ul class="nav flex-column mb-2">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                      Futebol Arte
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                        Cin3m4 2.0
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                      PACNA
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                        r/Game
                  </a>
                </li>
              </ul>
            </div>
      </nav>
      <div class="modal fade" id="mdlpst" tabindex="-1" role="dialog" aria-labelledby="exmdlb">
          <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exmdlb">Publicação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="myForm" action="" method="post" class="form-horizontal">
                        <textarea class="form-control" name="txtpubarr"></textarea>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" id="btnAct">Publicar</button>
                    </div>
                </div>
          </div>
      </div>                
      <div class="col-lg-7 mgCol">
          <div class="row">           
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pIVS" style="background-color:#b5ac04;">
                <div class="postIVS form-group">
                  <label id="txa1lb"></label>
                    <input class="form-control" id="txa1" 
                        placeholder="Como está se sentindo hoje?"
                        data-toggle="modal"data-target="#mdlpst"
                    >
                    <div id="btnpst">
                      <button class="btn btn-success float-right" id="envpstg">
                        Enviar
                      </button>
                    </div>
                  </input>  
                </div>           
              </div>                                           
          </div> 
          <div class="modal fade" id="modalinvs" tabindex="-1" role="dialog" aria-labelledby="modalinvsLabel" style="background-color: #343a40;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="modalinvsLabel">Modal Title</h5>
                            <button class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                      </div>
                      <div class="modal-body">
                        <form id="formEditPB" action="" method="POST" class="form-horizontal">
                            <input type="hidden" name="txtIdPB" value="0">
                            <div class="form-group">
                                 <textarea class="form-control" id="txtPubEditARR" name="txtPubEditAR"></textarea>
                            </div> 
                        </form>
                      </div>
                      <div class="modal-footer">
                          <button class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                          <button type="button" id="btnSaveEdit" class="btn btn-primary">Salvar Publicação</button>
                      </div>
                    </div>
                </div>
            </div>
          <div id="modalDeletarPub" class="modal" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Confirmar Exclusão</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          Você tem certeza que Deseja Excluir a Publicação?
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                          <button type="button" id="btnDeletarPub" class="btn btn-danger">Excluir</button>
                      </div>
                  </div>
              </div>
          </div>                 
          <div id="showpbf">
          
          </div>        
      </div>
      <div class="col-lg-3 mgCol">
        <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-6" style="margin-top: 10px;">
                    <h6 class="card-title">Amigos</h6>
                </div>
                <div class="col-md-6">
                  <input type="text" name="searchFriend" id="searchFriend" class="form-control input-sm"  style="background-color: white;" placeholder="Procurar">
                </div>              
              </div>
            </div>
            <div class="card-body pre-scrollable">
                <div id="friendsList">
                  
                </div>
            </div>
        </div>
      </div>
  </div>
</div>

<script type="text/javascript">
  $(function()
  {     
        $(document).ready(function(){
            mostrarTimelineF( );
        })     

        $('#txa1').click(function(){
            $('#mdlpst').modal('show');
            $('#myForm').attr('action', '<?php base_url() ?>publicacoes/addPub');
        });

        $('#btnSaveEdit').click(function()
        {
              var url = $('#formEditPB').attr('action');
              var data = $('#formEditPB').serialize();

              var descricaoTXAR = $('#txtPubEditARR');
              
              var resVer = '';

              if ( descricaoTXAR.val() == '' )
              {
                   descricaoTXAR.parent().addClass('is-invalid');
              }
              else
              {
                   descricaoTXAR.parent().removeClass('is-invalid');
                   resVer += '1';
              }

              if ( resVer == '1' )
              {
                   $.ajax({
                       type: 'ajax',
                       method: 'post',
                       url: url,
                       data: data,
                       async: false,
                       dataType: 'json',
                       success:function(response)
                       {
                            if ( response.success )
                            {
                                 $('#modalinvs').modal('hide');
                                 $('#formEditPB')[0].reset();

                                 if ( response.type == 'add' )
                                 {
                                      var type = 'Adicionado';
                                 }
                                 else if ( response.type == 'update' )
                                 {
                                      var type = 'Atualizado';
                                 }
                                 mostrarTimelineF( );
                            }
                            else
                            {
                                  alert('Error ao Tentar Editar');
                            }
                       },
                       error: function()
                       {
                            alert('Error ao Editar, falha req');
                       }
                   })
              }
        })

        $('#showpbf').on('click','.pstCom', function(e) {
           e.preventDefault();
           var Id_post = $(this).attr('data');
           var Usuario_id = '<?php echo $usuario_id ?>';
           var Comentario = $('#Cr_com'+Id_post);

           $('.submit_form').attr('action','<?php echo base_url() ?>index.php/Comentarios/postComent');

           var res = '';

           if ( Comentario.val() == '' )
           {
                console.log("Campo do Comentário vazio, insira seu comentário !");
                Comentario.parent().parent( ).addClass('is-invalid');
           }
           else
           {
                Comentario.parent().parent().removeClass('is-invalid');
                res += '1';
           }

           if ( res == '1' )
           {
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: '<?php echo base_url() ?>index.php/Comentarios/postComent',
                    data:{id: Id_post, com: Comentario.val()},
                    async: false,
                    dataType: 'json',
                    success: function(response)
                    {
                        if ( response.success )
                        {
                             if ( response.type == 'Add' )
                             {
                                  var type = 'Adicionado';
                             }
                        } 
                        else
                        {
                              alert('Erro ao Comentar');
                        }
                        $('#Cr_com'+Id_post).val("");
                        mostrarTimelineF();
                    },
                    error: function()
                    {
                          alert('Erro ao comentar, falha de requisição');
                    }
                })
           }

        })

        $('#showpbf').on('click','.edtPub', function() {
           var id = $(this).attr('data');
           $('#modalinvs').modal('show');
           $('#modalinvs').find('.modal-title').text('Editar Publicação');
           $('#formEditPB').attr('action','<?php echo base_url() ?>index.php/publicacoes/updatePub');
           $.ajax({
             type: 'ajax',
             method: 'get',
             url: '<?php echo base_url() ?>index.php/publicacoes/editarPub',
             data:{id: id},
             async: false,
             dataType: 'json',
             success: function(data){
                $('input[name=txtIdPB]').val(data.id);
                $('#txtPubEditARR').val(data.descricao);
             },
             error: function(data){
               alert('Erro ao Editar a Publicação');
             }
           })

        });

        $("#showpbf").on('click','.apagPub', function(){
           var id = $(this).attr('data');
           $('#modalDeletarPub').modal('show');
           $('#btnDeletarPub').unbind( ).click(function()
           {
              $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url: '<?php echo base_url( ) ?>index.php/publicacoes/deletarPub',
                data: {id: id},
                dataType: 'json',
                success: function(response)
                {
                      if ( response.success )
                      {
                           $('#modalDeletarPub').modal('hide');
                           $('.alert-success').html('Publicação Deletada').fadeIn( ).delay(4000).fadeOut('slow');
                           mostrarTimelineF( );
                      }
                      else
                      {
                           alert('Error');
                      }
                },
                error: function()
                {
                    alert('Erro ao Deletar, tente Novamente');  
                }
              });
           });
        });

        $('#btnAct').click(function(event){ // #btnAct
            event.preventDefault();
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize( );

            var pub = $("#txtpubarr");
            var result = '';

            if ( pub.val() == '' )
            {
                 pub.parent().parent().addClass("is-invalid");
            }
            else 
            {
                pub.parent().parent().removeClass('is-invalid');
                result += '1';
            }

            if ( result == '1' )
            {
                 $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: url,
                    data: data,
                    async: false,
                    dataType: 'json',
                    success: function(response)
                    {
                         if ( response.success ) 
                         {
                              $('#mdlpst').modal('hide');
                              $('#myForm')[0].reset();

                              if ( response.type == 'add' )
                              {
                                   var type = 'Criada';
                              }
                              $('.alert-success').html('Publicação ' + type + ' com Sucesso').fadeIn().delay(4000)
                              .fadeOut('slow');
                              mostrarTimelineF();
                         } 
                         else
                         {
                             alert('Error 2');
                         }                         
                    },
                    error: function()
                    {
                        alert('não foi possivel publicar os dados');
                    }
                 })
            }
        })   

        function mostrarTimelineF()
        {
            $.ajax(
            {
                url: '<?php base_url() ?>atividades/showPosts',
                async: true,
                dataType: 'json',
                success: function(data) 
                {
                    var atividadesf = '';
                    var i;

                    for ( i = 0; i < data.length; i++ )
                    {
                          atividadesf += 
                          '<div class="card stscd col-lg-6 col-md-6 col-sm-12">'+
                              '<div class="card-header hdstls">'+
                                   '<span>' + data[i].nome + ' ' + data[i].sobrenome + '</span>' +
                                    '<button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white; float: right;">'+
                                    '</button>'+
                                    '<span class="sr-only">Toggle Dropdown</span>'+
                                    '<div class="dropdown-menu" style="background-color:#6c757d !important;">'+
                                        '<a class="dropdown-item edtPub" href="#" data="'+data[i].id+'" style="color:white;">Editar</a>'+
                                        '<a class="dropdown-item apagPub" href="#" data="'+data[i].id+'" style="color:white;">Apagar</a>'+
                                    '</div>'+  
                                    '<span>'+
                                      '<div class="text-muted">'+
                                          '<i class="fa fa-clock-o"></i> '
                                          +moment(data[i].timepb).format('DD/MM/YYYY HH:mm:ss')
                                      +'</div>'+
                                    '</span>'+
                              '</div>'+
                              '<div class="card-body">'+
                                '<a class="card-link hdstls" href="#">'+
                                   '<h5 class="card-title">'+data[i].descricao.substring(0,30)+'</h5>'
                                +'</a>'+
                                '<p class="card-text hdstls">'
                                   +data[i].descricao+
                                '</p>'+
                              '</div>'+
                              '<div class="card-footer">'+
                                 '<a href="#" class="card-link">Gostei</a>'+
                                 '<a href="#" class="card-link commentBtn" data-com="'+data[i].id+'" >Comentar</a>'+
                                 '<a href="#" class="card-link">Compartilhar</a>'+
                              '</div>'+
                              '<div id="showComent'+data[i].id+'" class="comentINVS" data="'+data[i].id+'" >'+ 
                                    showComent(data[i].id) +
                              '</div>'+                        
                              '<form action="" method="POST" class="submit_form">'+
                                  '<div class="input-group">'+ 
                                        '<input type="text" class="form-control txInvs" id="Cr_com'+data[i].id+'" name="commentbody" placeholder="Escreva o comentário..." />'+
                                  '</div>'+
                              '<button class="btn btn-primary pstCom" data="'+data[i].id+'">Publicar</button>'+ 
                              '</form>'+ 
                          '</div>';
                          
                    }
                    $("#showpbf").html(atividadesf);   
                },
                error: function()
                {
                    alert('erro ao mostrar atividades');
                }
            });

        }

        function showComent (postID)
        { 
              var comentarios = '';
              $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?= base_url() ?>index.php/Comentarios/comentarios',
                data:{id:postID},
                async: false,
                dataType: 'json',
                success: function(data){
                  if ( data) 
                  {    
                       
                       for ( var i = 0; i < data.length; i++ )
                       {
                              moment.locale('pt-br');
                              comentarios += 
                                  '<div class="cominvs" style="width: 35vw; height: 70px; padding-top: 5px; padding-bottom: 10px; margin-bottom: 45px;">'+
                                      '<span class="cominvsText"><Strong>'+data[i].autor_coment+'</Strong></span>'+
                                      '<div><p class="cominvsTextp">'+data[i].comentario+'</p></div>'+
                                      '<ul class="list-inline" id="menu">'+
                                        '<li style="color: white;">'+moment(data[i].data_coment).fromNow(true)+'</li>'+
                                        '<li><a href="#" style="color: white; margin-left: 10px;" >Like</a></li> '+
                                        '<!--li style="color: white;">10 Likes</li-->'+
                                      '</ul>'+                                     
                                  '</div>'; 
                       }
                  }
                },
                error:function(data){
                  console.log( " error " );
                }
              })
              return comentarios;
        }

             /*
              * Se quiser esconder os comentarios;
             $(document).on('click','.commentBtn', function(){
                  var id = $(this).data('com');
                  var commentD = $('#showComent'+id);

                  if ( commentD.is(":hidden") )
                  {
                        commentD.show();
                  }
                  else if ( commentD.is(":visible") )
                  {
                        commentD.hide();
                  }
    
             });
             */

  })
</script>                                           