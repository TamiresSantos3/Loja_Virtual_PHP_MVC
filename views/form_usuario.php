<?php
	require_once "cabecalho.php";
?>
	<div class="content">
		<div class="container">
			
				<br><br><h1 class="row justify-content-center align-items-center">Meus Dados</h1>
			<br><br>
		<form action="#" method="post" >
		<div class="box">
		<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">Nome:</label>
			<div class="col-sm-6">
			<input type="text" name="nome" class="form-control form-control-lg" value="<?php echo isset($_POST['nome'])?$_POST['nome']:'' ?>"> <!-- value é para permanecer nome qndo der erro, senha e conformar senha ñ.nome e mail sim
																							se isset tiver estartado entao; seu eu recebi algo nome via post  e post for ! do bd deixa diferente de branco-->
			</div>

			<div><?php echo $msg[0]!=""?$msg[0]:""?></div>
			<!-- se msg for diferente de branco,mostre msg, se não deixa em branco-->
		</div></div>
			
			<br><br>
			<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">e-Mail:</label>
			<div class="col-sm-6">
			<input type="text" name="email" class="form-control form-control-lg" value="<?php echo isset($_POST['email'])?$_POST['email']:'' ?>">>
			</div>

			<div><?php echo $msg[1]!=""?$msg[1]:""?></div>
			<!-- se msg for diferente de branco,mostre msg, se não deixa em branco-->

			</div></div>
			<br><br>
			
			<div class="form-group">
			<div class="row justify-content-center align-items-center">
					<label class="col-sm-2 col-form-label col-form-label-lg">Senha:</label>
					<div class="col-sm-6">
						<input type="password"  name="senha" class="form-control">
					</div>
					<div><?php echo $msg[2]!=""?$msg[2]:""?></div>
					
				</div></div><br><br>
				<div class="form-group">
			<div class="row justify-content-center align-items-center">
					<label class="col-sm-2 col-form-label col-form-label-lg">Confirma a Senha:</label>
					<div class="col-sm-6">
						<input type="password"  name="confsenha" class="form-control">
					</div>
					<div><?php echo $msg[3]!=""?$msg[3]:""?></div>
					
				</div></div><br><br>
			<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<input type="submit"  class="btn btn-lg btn-success col-sm-2" value="Inserir">
		</div>
		</div>
	 </div>
	</form>
	
<?php
	require_once "rodape.html";
?>