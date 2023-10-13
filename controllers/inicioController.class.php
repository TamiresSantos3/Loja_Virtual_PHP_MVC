<?php   
  	require_once "models/Conexao.class.php";
      require_once "models/ProdutoDAO.class.php";
      require_once "models/Produto.class.php";
    Class inicioController
    {
        public function inicio ()
        {
            
            $produto = new Produto(status:"Ativo");
            $produtoDAO = new ProdutoDAO();
            $retorno = $produtoDAO->buscar_todos_produtos_ativos($produto);
            require_once "views/menu.php";
        }
        
    }
?>