<?php
	
	
	require_once "cabecalho.php";
?>
	<div class="content">
		<div class="container">
			
				<br><br><h1 class="row justify-content-center align-items-center">Produto</h1>
			<br><br>
		<form action="#" method="post" enctype="multipart/form-data">
		<div class="box">
		<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">Nome do Produto:</label>
			<div class="col-sm-6">
			<input type="text" name="nome" class="form-control form-control-lg">
			</div>
		</div></div>
			
			<br><br>
			<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">Descrição:</label><br>
			<div class="col-sm-6">
				<textarea class="form-control form-control-lg" name="descricao"></textarea>
			</div>
			</div></div><br><br>
			<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">Categoria</label>
			<div class="col-sm-6">
			<select name="categoria">
			<option value="0">Escolha uma categoria</option>
			<?php
			
				
				if(is_array($retorno))
				{
					foreach($retorno as $dado)
					{
						echo "<option value='{$dado->idcategoria}'>{$dado->descritivo}</option>";
					}
					
				}
				
				
				
			?>
			
			</select>
			</div>
			</div></div>
			<br><br>
			<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">Preço:</label>
			<div class="col-sm-6">
			<input type="text" name="preco" class="form-control form-control-lg">
			</div>
			</div></div>
			<br><br>
			
			<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">Estoque:</label>
			<div class="col-sm-6">
			<input type="number" name="estoque" class="form-control form-control-lg" min="0">
			</div>
		</div></div>
			<br><br>
			<div class="form-group">
			<div class="row justify-content-center align-items-center">
					<label for="imagem" class="col-sm-2 col-form-label">Imagem do Produto</label>
					<div class="col-sm-6">
						<input type="file" id="imagem" name="imagem" class="form-control" onchange = "mostrar(this);" accept="image/*">
					</div>
					
				</div></div><br><br>
				<div class="form-group">
					<div class="row justify-content-center align-items-center">
					<div class="col-sm-6">
						<img src="" id="img">
					</div>
				</div></div>
				<br><br>
			<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<input type="submit"  class="btn btn-lg btn-success col-sm-2" value="Inserir">
		</div>
		</div>
	 </div>
	</form>
	<script type="text/javascript" src="../lib/jquery.js"></script>
	<script>
		function mostrar(img)
		{
			if(img.files  && img.files[0])
			{
				var reader = new FileReader();
				reader.onload = function(e){
					$('#img')
					.attr('src', e.target.result)
					.width(170)
					.height(100);
				};
				reader.readAsDataURL(img.files[0]);
			}
		}
	</script>
<?php
	require_once "rodape.html";
?>