

<?php
    class Venda
    {
        public function __construct(private int $idvenda = 0,
                        private string $data_venda="", 
                        private $usuario = null,
                         private array $itens = array()){}

        public function getIdvenda()
        {
            return $this->idvenda;
        }

        public function getData_venda()
        {
            return $this->data_venda;
        }

        public function getUsuario()
        {
            return $this->usuario;
        }

        


        public function getItens()
        {
            return $this->itens;
        }


        public function setItens($iditens,$quantidade, $precoUnitario,  $produto)
		{
			$this->itens[] = new Itens($iditens, $quantidade,
			$precoUnitario, $produto);
		}


      
    }
?>


