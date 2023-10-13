<?php

	
require_once "views/cabecalho.php";	
	
?>
<div class="content">
	<div class="container">
	<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  
</svg>
<?php
	if($msg != "")
	{
		echo "<div class='row justify-content-center align-items-center'> <div class='alert alert-danger d-flex justify-content-center align-items-center' role='alert' style='width:800;'>
		  <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='danger:'><use xlink:href='#check-circle-fill'/></svg>
		  <div class='align-items-center'>
		  {$msg}
		  </div>
		</div></div>";
	}
?>
	<form action="#" method="POST">
		<div class="box">
			<br><br><img class="col-sm-1" style="margin-left:200px" src="imagens/usuario1.png">
			<div class="form-group">
			<div class="row justify-content-center align-items-center">
				<label class="col-sm-2 col-form-label col-form-label-lg">Usuário</label>
				<div class="col-sm-6">
					<input type="email"  class="form-control form-control-lg" placeholder="Seu E-mail" name="email">
				</div>
			</div>
			</div><br>
		<div class="form-group">
		<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">Senha</label>
			<div class="col-sm-6">
				<input type="password" class="form-control form-control-lg" placeholder="Sua senha" name="senha">
			</div>
		</div>
		
		<br><br><div class="form-group">
		<div class="row justify-content-center align-items-center">
			<input type="submit"  class="btn btn-lg btn-success col-sm-2" value="Enviar">
		</div>
		</div>
	</div>
</form>
<?php
	require "rodape.html";
?>