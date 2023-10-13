<?php
	if($_GET)
	{
		//excluir
		require_once "../models/Conexao.class.php";
		require_once "../models/CategoriaDAO.class.php";
		require_once "../models/Categoria.class.php";
		
		$categoria = new Categoria(idcategoria:$_GET["id"]);
		
		$categoriaDAO = new CategoriaDAO();
		$categoriaDAO->excluir_categoria($categoria);
		header("location:listar_categorias.php");
	}
	else
	{
		header("location:listar_categorias.php");
	}
?>