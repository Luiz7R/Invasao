<!--!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Inline form</h2>
  <p>Make the viewport larger than 576px wide to see that all of the form elements are inline and left-aligned. On small screens, the form groups will stack horizontally.</p>
  <form class="form-inline" action="/action_page.php">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html-->


<style>
.display-3 {
	font-family: 'Libre Baskerville', serif;
}
</style>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">

<div class="container" style="margin-top: 100px;">
    <?php if($this->session->flashdata("success")): ?>
            <p class="alert alert-success"><?= $this->session->flashdata("success") ?></p> 
    <?php endif ?>
		<?php if($this->session->flashdata("danger")): ?>
			<p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>			
		<?php endif ?>
          	  
<!-- Modal -->
<div id="modalcracc" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalcraccLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Criar Conta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formCrAcc" class="needs-validation" method="post">
          <div class="form-row">
            <div class="col form-group">
              <label for="">Nome</label>
              <input type="text" class="form-control cracc" name="nomeinvsca"  required/>
              <div class="invalid-feedback">
                  Insira seu nome.
              </div>              
            </div>
            <div class="col form-group">
              <label for="">Sobrenome</label>
              <input type="text" class="form-control cracc" name="sobrenomeinvsca" required/>
              <div class="invalid-feedback">
                  Insira seu Sobrenome.
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Seu E-mail</label>
            <input type="email" class="form-control cracc" name="emlivnsca" required/>
            <div class="invalid-feedback">
                  Insira seu E-mail.
            </div>            
          </div>

            <div class="form-group" style="max-width:200px;">
              <label for="" class="control-label">Data de Nascimento</label>
                <div class="input-group date">
                  <input type="text" class="form-control cracc" name="dataAnivinvsca" id="dataAniv" required />
                  <div class="input-group-addon">
                      <span class="glyphicon glyphicon-th"></span>
                  </div>
                  <div class="invalid-feedback">
                    Insira a Data de Nascimento.
                  </div>                  
              </div>
            </div>      
          <div class="form-group">
            <label for="" class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexo" value="Masculino" required/>
                <span class="form-check-label">Masculino</span>
            </label>
            <label for="" class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sexo" value="Feminino" required/>
              <span class="form-check-label">Feminino</span>
            </label>  
            <div class="invalid-feedback">
                  Selecione o sexo.
            </div>                      
          </div>
          <div class="form-group">
              <label for="">Senha</label>
              <input type="password" class="form-control cracc" name="pswdinvsca" required/>
              <div class="invalid-feedback">
                  Insira sua senha.
              </div>                            
          </div>         
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="reginvsnet">Registrar</button>
      </div>
    </div>
  </div>
</div>


	<form class="form-inline" action="http://localhost/Invasao/index.php/login/autenticar/"  method="POST" id="creacc1">
		<label for="emlinvs">Email: </label>
		<input type="email" class="form-control cracc" name="emlinvs" placeholder="Seu E-mail" required />	

		<label for="pswdinvs">Senha: </label>
		<input type="password" class="form-control cracc" name="pswdinvs" placeholder="Sua Senha" required />
		
		<label>
			<input type="checkbox" name="rmbinvs" /> Lembrar
		</label>
		<button class="btn btn-primary">Login</button>
	</form>
	<button class="btn btn-black" id="crAcc" style="color: white;" data-toggle="modal" data-target="#modalcracc" >
		Criar Conta
	</button>	
</div>
<br><br><br>
<!-- onclick="document.getElementById('modlinvsca').style.display='block'" -->
<script>

      $('#dataAniv').datepicker({
          format: 'dd/mm/yyyy',
          language: 'pt-BR',
          autoclose: true
      });

      $(document).ready(function(){
        $('#dataAniv').mask('00/00/0000');
      });

      $('#crAcc').click(function(){
          $('#modalcracc').modal('show');
          $('#formCrAcc').attr('action', 'index.php/../usuarios/criarConta');
       });
      
      $(function()
      {
          $('#reginvsnet').click(function(){
              var url = $('#formCrAcc').attr('action');
              var data = $('#formCrAcc').serialize();

              var nome = $('input[name=nomeinvsca]');
              var sobrenome = $('input[name=sobrenomeinvsca]');
              var email = $('input[name=emlivnsca]');
              var dataNasc = $('input[name=dataAnivinvsca]');
              var sexo = $('input[name=sexo]');
              var senha = $('input[name=pswdinvsca]');
              var senharepet = $('input[name=pswdinvscarept]');

              var result = '';

              if ( nome.val()=='' )
              {
                    nome.addClass('is-invalid');
              }
              else
              {
                    nome.removeClass('is-invalid');
                    result += '1';
              }
              if ( sobrenome.val() == '' )
              {
                   sobrenome.addClass('is-invalid');
              } 
              else
              {
                   sobrenome.removeClass('is-invalid');
                   result +='2';
              }
              if ( email.val() == '' )
              {
                   email.addClass('is-invalid');
              }
              else
              {
                   email.removeClass('is-invalid');
                   result +='3';
              }
              if ( dataNasc.val() == '' )
              {
                   dataNasc.addClass('is-invalid'); 
              }
              else
              {
                   dataNasc.removeClass('is-invalid');
                   result +='4';
              }
              if ( sexo.val() == '' )
              {
                   sexo.addClass('is-invalid');
              }
              else
              {
                  sexo.removeClass('is-invalid');
                  result +='5';
              }  
              if ( senha.val() == '' )
              {
                   senha.addClass('is-invalid');
              }
              else
              {
                   senha.removeClass('is-invalid');
                   result += '6';
              }
              
              if ( result === '123456' )
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
                              $('#modalcracc').modal('hide');
                              $('#formCrAcc')[0].reset();
                              if  ( response.type == 'add' )
                              {
                                    var type = 'Adicionado';
                                    //window.location.reload();
                                    window.location = './Home';
                              }                     
                          }
                          else
                          {
                            if ( response.error == 2 ) 
                            {
                                 email.addClass('is-invalid');
                                 $('.invalid-feedback').text('Email Inválido !'); 
                            }
                            if ( response.error == 3 )
                            {
                                 email.addClass('is-invalid');
                                 $('.invalid-feedback').text('Existe uma conta com esse Email');
                                 console.log(email.val());
                            }
                            alert('Erro ao criar sua conta, dados inválidos');
                          }                  
                      },
                      error: function()
                      {
                          alert('Erro na requisição');
                      }
                    })
              }
              else
              {
                  return false;
              }
          });




      });


	    // $.datepicker.setDefaults({
      //       dateFormat:'dd/mm/yy',
      //       dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
      //       monthNames: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ]             
      //   })
      //   $( function() {
      //     $( "#dataAnivinvsca" ).datepicker( );          
      //   });

		//  $(".signupbtn").click(function(e)
		// {
		//  	e.preventDefault();
		//  	console.log("Teste...");
		// })

		// $('#sxinvsca').change(function(){
			
		// });
        
</script>

<!--div class="container" style="margin-top: 80px;">
	<h2 class="display-3">Invasão</h2>
	<form class="">
		<div class="row">
			<div class="col col-lg-12">
				<div class="form-group row form-group-sm">
					<label for="invsmlgin" class="col-sm-5 col-md-1 control-label col-form-label">Email </label>
					<div class="col-sm-10 col-md-6 col-lg-3">
						<input type="email" class="form-control" id="invsmlgin" placeholder="Seu E-mail">
					</div>
				</div>
			</div>
			<div class="col">
				<div class="form-group row form-group-sm">
					<label for="invspswd" class="col-sm-5 col-md-1 control-label col-form-label">Senha </label>
					<div class="col-sm-10 col-md-6 col-lg-3">
						<input type="password" class="form-control" id="invspswd" placeholder="Senha">
					</div>
				</div>
			</div>			
		</div>	
	</form>
</div-->
<br>