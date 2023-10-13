<?php
	require_once "cabecalho.php";

?>
<div class="content">
	<div class="container">
		<div class='row'>
		<?php
	
	//esse metodo busca todos os produtos ativos foi criado uma funcao em produtoControler
		if(is_array($retorno))
		{
			foreach($retorno as $dado)
			{
				echo "<div class='col' style='margin-top:20px;margin-left:40px'>
     
				  <div class='card' style='width: 20rem;'>
				  <img style='width:200px;height:200px' src='produtos/{$dado->imagem}' class='card-img-top' alt='...'>
				  <div class='card-body'>
				  <h6 class='card-title'>{$dado->nome}- R$ " . number_format($dado->preco, 2, ",", ".") . "</h6>
				  <p class='card-text'>{$dado->descricao}</p>
				  <a href='index.php?controle=vendaController&metodo=inserir_carrinho&id={$dado->idproduto}' class='btn btn-primary'>Comprar</a>
				  </div>
				  </div></div>";
			}
		}
	?>
		</div>
	</div>
</div

<?php
	require_once "rodape.html";
?>