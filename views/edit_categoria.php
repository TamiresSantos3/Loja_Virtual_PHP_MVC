<?php
	if($_GET)
	{
		require_once "../models/Conexao.class.php";
		require_once "../models/CategoriaDAO.class.php";
		require_once "../models/Categoria.class.php";
		
		//buscar a categoria no BD
		$categoria = new Categoria($_GET["id"]);
		$categoriaDAO = new CategoriaDAO();
		$ret = $categoriaDAO->buscar_uma_categoria($categoria);
	}
	else
	{
		header("location:listar_categorias.php");
	}
?>


<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Categoria</title>
	</head>
	<body>
		<h1>Categoria</h1>
		<form action="alterar_categoria.php" method="POST">
		
			<input type="hidden" name="idcategoria" value="<?php echo $ret[0]->idcategoria;?>">
			
			<label>Descritivo:</label>
			<input type="text" name="descritivo" value="<?php echo $ret[0]->descritivo;?>">
			<br><br>
			<input type="submit" value="Alterar">
		</form>
	</body>
</html>