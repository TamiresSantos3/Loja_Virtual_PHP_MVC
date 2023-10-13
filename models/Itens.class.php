
<?php
 class Itens
 {
     public function __construct(private int $iditens = 0,
                                private string $quantidade="",
                                private float $precoUnitario= 0.00,
                                 private $produto = null){}

     public function getIdItens()
     {
         return $this->iditens;
     }


     

     public function getProduto()
     {
         return $this->produto;
     }


     public function getQuantidade()
     {
         return $this->quantidade;
     }

     
     public function getPrecoUnitario()
     {
         return $this->precoUnitario;
     }
 }
?>