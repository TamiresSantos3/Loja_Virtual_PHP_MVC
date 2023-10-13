<?php
	class Produto
	{
		public function __construct(
		
			private int $idproduto = 0,
			private string $nome = "",
			private string $descricao = "",
			private float $preco = 0.00,
			private int $estoque = 0,
			private string $imagem = "",
			private string $status = "",
			private $categoria = null){}
			
			public function getIdproduto()
			{
				return $this->idproduto;
			}
			public function getNome()
			{
				return $this->nome;
			}
			public function getDescricao()
			{
				return $this->descricao;
			}
			public function getEstoque()
			{
				return $this->estoque;
			}
			public function getPreco()
			{
				return $this->preco;
			}
			public function getStatus()
			{
				return $this->status;
			}
			public function getImagem()
			{
				return $this->imagem;
			}
			public function getCategoria()
			{
				return $this->categoria;
			}
	}
?>