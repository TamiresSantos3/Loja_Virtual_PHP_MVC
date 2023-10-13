<?php   

date_default_timezone_set("America/Sao_Paulo"); //GOOGLE date_default_timezone_get-Manual-PHP. NOSSO FUSU, OU PELO PHP INI
    require_once "models/Conexao.class.php";
    require_once "models/ProdutoDAO.class.php";
    require_once "models/Produto.class.php";
    require_once "models/Venda.class.php";
    require_once "models/VendaDAO.class.php";
    require_once "models/Usuario.class.php";
    require_once "models/Itens.class.php";
    
 
    if(!isset($_SESSION))
        session_start();
	
    
    class vendaController
    {
        public function mostrar_carrinho()
        {
            require_once "views/carrinho.php";
        }

        public function inserir_carrinho()
        {
            if(isset($_GET["id"])) //buscar no banco os dados do  produto
            {  
                $linha = -1;
                $achou = false;

                if(isset($_SESSION["carrinho"]))
                //pegando os dados da linha id,desc,preço,qntidade
                {
                    foreach($_SESSION["carrinho"] as $linha=>$dado)
                    {
                        //verificando se produto ja esta no carrinho
                        if($dado["idproduto"] == $_GET["id"]) //id do carrinho
                        {
                            $achou=true;
                            //se achou for igual a true, entra no break e sai do foreache
                            break;
                        }
                    } //fim foreach
                }//fim isset
                if(!$achou)
                {
                    $produto = new produto(idproduto:$_GET["id"]);
                    $produtoDAO = new produtoDAO();
                    $retorno = $produtoDAO->buscar_um_produto($produto);


                    $_SESSION["carrinho"][$linha + 1]["idproduto"] = $retorno[0]->idproduto ;

                    $_SESSION["carrinho"][$linha + 1]["nome"] = $retorno[0]->nome ;

                    $_SESSION["carrinho"][$linha + 1]["preco"] = $retorno[0]->preco ;
                    
                    $_SESSION["carrinho"][$linha + 1]["quantidade"] =1;
                } 
                    header("location:index.php?controle=vendaController&metodo=mostrar_carrinho");


            }//fimisset
            
        }
            public function excluir()
            {
                if(isset($_GET["linha"]))
                {   
                    //papagar 1 linha
                    unset($_SESSION["carrinho"][$_GET['linha']]);
                    header("location:index.php?controle=vendaController&metodo=mostrar_carrinho");

                }

            }

            public function alterar()
            {
                if(isset($_GET["linha"]))
                {
                    $_SESSION["carrinho"] [$_GET["linha"]]["quantidade"] = $_GET["qtde"];
                }
            }



            public function finalizar()
            {
                if(isset($_SESSION["idusuario"]))
                {
                    //finalzar a venda
                    $usuario = new Usuario($_SESSION["idusuario"]);
                    $venda = new venda(data_venda:date("Y-m-d"),usuario:$usuario);

                    foreach($_SESSION["carrinho"] as $dado)

                    {   
                        $produto= new Produto($dado["idproduto"]);

                         //passando id '0', pq na class o id esta como int,pq esta tipado na class
                        $venda->setItens(0,$dado["quantidade"],$dado["preco"], $produto);
                    }
                    $vendaDAO = new vendaDAO;
                    $retorno = $vendaDAO->inserir_venda($venda);

                    require_once "views/extrato.php";

                    unset($_SESSION["carrinho"]);
                    header("location:index.php");
                }
                else
                {
                    //fazer login
                    header("location:index.php?controle=usuarioController&metodo=login");
                }
            }
    }
?>