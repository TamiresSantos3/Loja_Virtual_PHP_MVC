<?php
    	require_once "models/Conexao.class.php";
        require_once "models/Categoria.class.php";
        require_once "models/CategoriaDAO.class.php";

    if(!isset($_SESSION))
        session_start();

    class categoriaController
    {
        public function listar()
        {
            if(!isset($_SESSION["perfil"]) || $_SESSION["perfil"] != "Administrador")
            {
                header("location:index.php");
            }
                $categoriaDAO = new CategoriaDAO();
                $retorno = $categoriaDAO->buscar_todas_categorias();
                if(is_array($retorno))
                {
                    require_once "views/listar_categorias.php";
                }
                else
                {
                    echo $retorno;
                }
        }


            public function inserir()
            {
                if($_POST)
                {
                    if($_POST["descritivo"] == "")
                    {
                        echo "<script> alert('Preencha o descritivo da categoria')</script>";
                    }
                    else
                    {
                        $categoria = new Categoria(descritivo:$_POST["descritivo"], status:"Ativo");
                        	
                        $categoriaDAO = new CategoriaDAO();
                        
                        $categoriaDAO->inserir_categoria($categoria);

                        header("location:index.php?controle=categoriaController&metodo=listar");
                    }
                }
                require_once "views/form_categoria.php";
            }

            public function alterar()
            {
            }
        

     

    }
?>