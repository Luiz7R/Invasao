<html>
<head>
  <link rel="stylesheet" href=" <?= base_url("css/bootstrap.css") ?> ">
	<link rel="stylesheet" href=" <?= base_url("css/stylesHome.css") ?> ">
	<link rel="stylesheet" href=" <?= base_url("css/font-awesome-4.7.0/css/font-awesome.min.css") ?> ">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script type="text/javascript" src=" <?= base_url("js/jquery-3.4.1.min.js") ?> "></script>
  <script type="text/javascript" src=" <?= base_url("js/moment.js") ?> "></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script type="text/javascript" src=" <?= base_url("js/bootstrap.min.js") ?> "></script>	
	<title>Invasão</title>
</head>
<body>
<?php $usuario = $this->session->userdata('usuario_logado'); ?>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?php echo base_url( )?>index.php/">Invasão</a>
      <div class="col-xs-12 col-md-6 col-lg-4">
        <form action="<?php echo base_url( )?>index.php/search/searchResults" class="navbar-form navbar-left" method="POST" style="margin-top: 0; margin-block-end: 0;">
            <div class="input-group">
      	        <input class="form-control form-control-dark w-100" type="text" name="searchbar" placeholder="Search" autocomplete="off" id="searchbar" aria-label="Search" style="height: 30px;" />
                <div class="input-group-btn">
                    <button class="btn btn-default" name="searchBtn" id="searchBtn" type="submit">
                        <i class="fa fa-search" style="color: yellow;"></i>
                    </button>
                </div>
            </div>

            <div class="countryList" id="countryList" style="position: absolute; width: 235px; z-index: 1001;"></div>
        </form>
      </div>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" id="req_amigo_not" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span id="req_amigo_naoLida"></span>
                <i class="fa fa-user-plus fa-2" aria-hidden="true"></i>
                <span class="caret"></span>
            </a>
            <div class="dropdown-menu p-4" id="lista_reqAmg" aria-labelledby="dropdownMenuButton">

            </div> 
        </div>        
      <!-- <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="req_amigo_not" aria-expanded="true">
                    <span id="req_amigo_naoLida"><span>
                    <i class="fa fa-user-plus fa-2" aria-hidden="true"></i>
                    <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" id="lista_reqAmg" style="width: 300px; max-height: 150px; background-color: #343a40!important">

              </ul>
          </li>
      </ul>	 -->
      <ul class="navbar-nav px-3">
        <li class="nav-item text nowrap">
          <a href="" class="nav-link" style="color:white;"><?= $usuario['nome'] . ' ' . $usuario['sobrenome'];  ?></a>
        </li>
      </ul>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="login/logout">Sair</a>
        </li>
      </ul>
</nav>

<script>
    $(document).ready(function(){
        $('#searchbar').keyup(function(){

            var query = $(this).val();
            
            if ( query != '' )
            {
                 $.ajax({
                      type: 'ajax',
                      method: 'POST',
                      url: '<?= base_url() ?>index.php/search/SearchAct',
                      data: {query:query},
                      async: false,
                      dataType: 'json',
                      success: function(data)
                      {
                          var pesquisar = '<div class="list-group">';
                          var i;
                          
                          if ( data )
                          {
                                for ( i = 0; i < data.length; i++ )
                                {
                                      var nomeTemp = data[i].nome;
                                      pesquisar += '<a href="#" class="list-group-item" style="background-color: #343a40;">'
                                                      + data[i].nome + " " + data[i].sobrenome
                                                      + '<div class="pull-left">Img</div>'
                                                    +'</a>'  
                                }
                          }
                          else
                          {
                                pesquisar += '<a href="#" class="list-group-item" style="background-color: #343e40;">Sem Resultados</a>';
                          }
                          pesquisar += '</div>';
                          $('#countryList').html(pesquisar);
                        
                      },
                      error: function()
                      {
                          console.log("erro ao buscar");
                      }
                 });
            }
            else
            {
                $('#countryList').html('');
            }
        });

        $(document).on('click', '.list-group-item', function(){
              $('#searchbar').val($.trim($(this).text()));
              $('#countryList').fadeOut();
        });

        function cont_requi_naoLidas()
        {
            var action = 'cont_requi_naoLidas';

            $.ajax({
                type: 'ajax',
                method: 'POST',
                url: '<?php echo base_url() ?>index.php/search/amgNotif',
                data: {action:action},
                success: function(data)
                {
                    if ( data > 0 )
                    {
                         $('#req_amigo_naoLida').html('<span class="label label-danger">'+data+'</span>');
                    }
                }
            })
        }

        setInterval(function(){
            cont_requi_naoLidas( );
        }, 5000);

        function load_amgRequest()
        {
              var action = 'load_amg_request';

              $.ajax({
                  type: 'ajax',
                  method: 'POST',
                  url: '<?php echo base_url( ) ?>index.php/search/amgRequest',
                  data: {action:action},
                  beforeSend: function()
                  {
                      $('#lista_reqAmg').html('<li align="center"><i class="fa fa-circle-o-notch fa-spin"></i></li>');
                  },
                  success: function(data)
                  {
                       $('#lista_reqAmg').html(data);
                       removeFriendReq();
                  }
              });
        }

        $('#req_amigo_not').click(function(){
                load_amgRequest( );
        });

        $('.dropdown-menu').click(function(e) {
                e.stopPropagation();
        });

        function removeFriendReq( )
        {
            $.ajax({
                  type: 'ajax',
                  method: 'POST',
                  url: '<?php echo base_url( ) ?>index.php/search/removeFriendReq',
                  data: {action:'removeFriendReq'},
                  success: function(data)
                  {
                       $('#cont_requi_naoLidas').html('');
                  }
              });
        }

        $('.dropdown-menu').click(function(e){
            event.preventDefault();
            
            var requestId = event.target.getAttribute('data-requestId');
            
            if ( requestId > 0 )
            {
                    $.ajax({
                        type: 'ajax',
                        method: 'POST',
                        url: '<?php echo base_url( ) ?>index.php/search/addFriendRequest',
                        data: {requestId:requestId, action: 'addFriendRequest'},
                        beforeSend: function(){
                           $('#acc_friendReq_Btn_'+requestId).attr('disabled','disabled');
                           $('#acc_friendReq_Btn_'+requestId).html('<i class="fa fa-circle-o-notch fa-spin"></i>');      
                        },
                        success: function(data)
                        {
                            load_amgRequest();    
                        }
                   });                 
            }

            return false;
        });

        $('#friendsList').html('<div align="center" style="line-height: 200px;"><i class="fa fa-circle-o-notch fa-spin>"</i></div>');

        setTimeout(function(){
           loadFriends();     
        }, 5000);

        function loadFriends(query = '')
        {
            $.ajax({
                  type: 'ajax',
                  method: 'POST',
                  url: '<?php echo base_url( ) ?>index.php/search/loadFriends',
                  data: {action:'loadFriends', query:query},
                  success: function(data)
                  {
                       $('#friendsList').html(data);
                  }
            });
        }

        $(document).on('keyup', '#searchFriend', function() {
             var searchValue = $('#searchFriend').val();

             if ( searchValue != '' )
             {
                  loadFriends(searchValue);
             }
             else
             {
                  loadFriends();
             }
        });

    });
 

/*                          var searchPerson = data.map( function(searchResult){
                                return `<a href="#" class="list-group-item">
                                              ${searchResult.nome}  ${searchResult.sobrenome}
                                            <div class="pull-left">Imagem</div>  
                                        </a>`
                          });
                          pesquisar += searchPerson;
                          
                          if (data)
                          {
                          pesquisar += '<a href="#" class="list-group-item">'
                                       + data.nome + " " + data.sobrenome 
                                       + '<div class="pull-left">'
                                          + 'Imagem' +
                                       '</div>'

                                       +'</a>';
                          }                
                          // for ( i = 0; i < data.length; i++ )
                          // {
                          //       pesquisar += '<a href="#" class="list-group-item">' + data[i].nome + data[i].sobrenome +
                          //                        '<div class="pull-left">Imagem</div>';
                                                 
                          // }
                          pesquisar += '</div>';
                          $('#countryList').html(pesquisar);
                         */ 
</script>
