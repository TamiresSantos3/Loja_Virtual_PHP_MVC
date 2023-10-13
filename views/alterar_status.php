<?php
	if($_GET)
	{
		require_once "../models/Conexao.class.php";
		require_once "../models/CategoriaDAO.class.php";
		require_once "../models/Categoria.class.php";
		//alterar o status
		$categoria = new Categoria(idcategoria:$_GET["id"], status:$_GET["status"]);
		
		$categoriaDAO = new CategoriaDAO();
		
		$categoriaDAO->alterar_status($categoria);
		
		header("location:listar_categorias.php");
	}
	else
	{
		header("location:listar_categorias.php");
	}
?>