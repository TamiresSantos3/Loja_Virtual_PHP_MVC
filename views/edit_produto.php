<?php

	require_once "cabecalho.php";
?>
<div class="content">
	<div class="container">
			
		<br><br><h1 class="row justify-content-center align-items-center">Produto</h1>
			<br><br>
		<form action="#" method="post">
			<input type="hidden" name="id" value="<?php echo $ret[0]->idproduto;?>">
			<div class="box">
		<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">Nome do Produto:</label>
			<div class="col-sm-6">
			<input type="text" name="nome" value="<?php echo $ret[0]->nome;?>" class="form-control form-control-lg" required>
			</div></div></div><br><br>
			
		<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">Descrição:</label>
			<div class="col-sm-6">
			<textarea class="form-control form-control-lg" name="descricao"><?php echo $ret[0]->descricao;?></textarea>
			</div></div></div><br><br>
			
		<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">Categoria</label>
			<div class="col-sm-6">
			<select name="categoria">
			<?php
				
					$categoriaDAO =new CategoriaDAO();
					$retorno = $categoriaDAO->buscar_todas_categorias();
					foreach($retorno as $dado)
					{
						if($dado->idcategoria == $ret[0]->idcategoria)
						{
							echo "<option value='{$dado->idcategoria}' selected>{$dado->descritivo}</option>";
						}
						else
						{
							echo "<option value='{$dado->idcategoria}'>{$dado->descritivo}</option>";
						}
					}
				
				
				
			?>
			
			</select>
			</div></div></div><br><br>
			
		<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">Preço:</label>
			<div class="col-sm-6">
			<input type="text" name="preco" value="<?php echo $ret[0]->preco;?>" class="form-control form-control-lg">
			</div></div></div><br><br>
			
		<!--<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">Desconto:</label>
			<div class="col-sm-6">
			<input type="text" name="desconto" value="<?php echo $ret[0]->desconto;?>" class="form-control form-control-lg">
		
				-->
			<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">Estoque:</label>
			<div class="col-sm-6">
			<input type="text" name="estoque" value="<?php echo $ret[0]->estoque;?>" class="form-control form-control-lg">
			</div></div></div><br><br>

			<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">Imagem:</label>
			<div class="col-sm-6">
			
			<input type="file" id="imagem" name="imagem" class="form-control" onchange = "mostrar(this);" accept="image/*">
		</div></div></div><br><br>



		<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<label class="col-sm-2 col-form-label col-form-label-lg">Status:</label>
			<div class="col-sm-6">
			<input type="text" id="status" name="status" class="form-control form-control-lg"   value="<?php echo $ret[0]->status;?>" >
			
		</div></div></div><br><br>





				
			<div class="form-group">
			<div class="row justify-content-center align-items-center">
			<input type="submit"  class="btn btn-lg btn-success col-sm-2" value="Alterar">
		</div>
		</div>
	 </div>
	</form>
<?php
	require_once "rodape.html";
?>