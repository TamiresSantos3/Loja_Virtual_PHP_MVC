<?php
	require_once "cabecalho.php";
?>
	<div class="content">
		<div class="container">
		<h1>Produtos</h1><br>
		<table class="table table-striped" id="produto">
			<tr>
				<th>Nome</th>
				<th>Preço</th>
				<th>Estoque</th>
				<th>Categoria</th>
				<th>Situação</th>
				<th>Ações</th>
			</tr>
			
				<?php
					
					if(is_array($retorno))
					{
						foreach($retorno as $dados)
						{
							echo "<tr>";
							echo "<td>{$dados->nome}</td>";
							echo "<td>" . number_format($dados->preco,2,",",".") . "</td>";
							echo "<td>{$dados->estoque}</td>";
							echo "<td>{$dados->descritivo}</td>";
							echo "<td>{$dados->status}</td>";
							echo "<td>
							
							<a class='btn btn-warning' href='index.php?controle=produtoController&metodo=alterar&id={$dados->idproduto}'>Alterar</a>
							
							&nbsp;&nbsp;
							
							<a href='index.php?controle=produtoController&metodo=excluir&id={$dados->idproduto}'>Excluir</a>
							
							&nbsp;&nbsp;";
							
							if($dados->status == "Ativo")
							{
								echo "<a href='index.php?controle=produtoController&metodo=alterar_status&id={$dados->idproduto}&status=Inativo'>Inativar</a>";
							}
							else
							{
								echo "<a href='index.php?controle=produtoController&metodo=alterar_status&id={$dados->idproduto}&status=Ativo'>Ativar</a>";
							}
							echo "</td></tr>";
						}
					}
				?>
		</table>
		<br><br><a class="btn btn-success" href="index.php?controle=produtoController&metodo=inserir">Novo produto</a>
		
		<script type="text/javascript" src="lib/jquery-latest.js"></script>	
		<script type="text/javascript" src="lib/jquery.quicksearch.js"></script>
		<script>
		$(document).ready(function()
		{ 
			 
			$("#produto tbody tr").quicksearch({
				labelText: 'Procurar:',
				attached: '#produto',
				position: 'before',
				delay: 100,
				loaderText: 'Carregando...',
				onAfter: function() {
					if ($("#produto tbody tr:visible").length != 0) {
						$("#produto").trigger("update");
						$("#produto").trigger("appendCache");
						
					}
				}
			});
		});
  </script>
  <?php
	require_once "rodape.html";
  ?>
	