<?php
	if($_POST)
	{
		require_once "../models/Conexao.class.php";
		require_once "../models/CategoriaDAO.class.php";
		require_once "../models/Categoria.class.php";
		
		//alterar no BD a categoria
		if($_POST["descritivo"] == "")
		{
		}
		else
		{
			$categoria = new Categoria($_POST["idcategoria"], $_POST["descritivo"]);
			$categoriaDAO = new CategoriaDAO();
			$categoriaDAO->alterar_categoria($categoria);
			header("location:listar_categorias.php");
		}
	}
	else
	{
		header("location:listar_categorias.php");
	}
	
?>