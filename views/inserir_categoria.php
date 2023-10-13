<?php
	if($_POST)
	{
		require_once "../models/Conexao.class.php";
		require_once "../models/CategoriaDAO.class.php";
		require_once "../models/Categoria.class.php";
		if($_POST["descritivo"] == "")
		{
			echo "<script>alert('Preencha o descritivo da categoria');location.href='form_categoria.html';</script>";
		}
		else
		{
			$categoria = new Categoria(descritivo:$_POST["descritivo"], status:"Ativo");
			
			$categoriaDAO = new CategoriaDAO();
			
			$categoriaDAO->inserir_categoria($categoria);
			
			header("location:listar_categorias.php");
		}
	}
	else
	{
		header("location:form_categoria.html");
	}
?>