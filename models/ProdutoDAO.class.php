<?php
	class ProdutoDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function buscar_todos_produtos()
		{
			$sql = "SELECT produto.*, 
			categoria.descritivo
			 FROM produto, categoria WHERE 
			 produto.idcategoria = categoria.idcategoria";
			//prepara a frase sql antes de executar
			$stm = $this->db->prepare($sql);
			//executa a frase sql no BD
			$stm->execute();
			//fecha a conexao com o BD
			$this->db = null;
			//returna o resultado no formato de OBJETOS
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		
	


		
		public function inserir_produto($produto)
		{
			$sql = "INSERT INTO produto(nome, descricao, preco, estoque, imagem, status, idcategoria)VALUES(?,?, ?, ?, ?, ?, ?)";
			
			$stm = $this->db->prepare($sql);
			//substituir os pontos de interrogação
			$stm->bindValue(1, $produto->getNome());
			$stm->bindValue(2, $produto->getDescricao());
			$stm->bindValue(3, $produto->getPreco());
			$stm->bindValue(4, $produto->getEstoque());
			$stm->bindValue(5, $produto->getImagem());
			$stm->bindValue(6, $produto->getStatus());
			$stm->bindValue(7, $produto->getCategoria()->getIdcategoria());
			
			$stm->execute();
			
			$this->db = null;
			
		}
		


		public function buscar_Um_produto($produto)
		{
			$sql = "SELECT * FROM produto WHERE idproduto = ?";
			
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $produto->getIdproduto());
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}



		public function alterar_produto($produto)
		{
			$sql = "UPDATE produto SET nome = ?, descricao = ?, preco = ?, estoque = ?, imagem = ?, status = ?, idcategoria = ? WHERE idproduto = ?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $produto->getNome());
			$stm->bindValue(2, $produto->getDescricao());
			$stm->bindValue(3, $produto->getPreco());
			$stm->bindValue(4, $produto->getEstoque());
			$stm->bindValue(5, $produto->getImagem());
			$stm->bindValue(6, $produto->getStatus());
			$stm->bindValue(7, $produto->getCategoria()->getIdcategoria());
			$stm->bindValue(8, $produto->getIdproduto());
			$stm->execute();
			$this->db = null;
			
		}
		
		public function excluir_produto($produto)
		{
			$sql = "DELETE FROM produto WHERE idproduto = ?";
			
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $produto->getIdproduto());
			$stm->execute();
			$this->db = null;
		}



		public function alterar_status($produto)
		{
			$sql = "UPDATE produto SET status = ? WHERE idproduto = ?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $produto->getStatus());
			$stm->bindValue(2, $produto->getIdproduto());
			$stm->execute();
			$this->db = null;
		}
		public function buscar_todos_produtos_ativos($produto)
		{
			$sql = "SELECT * FROM produto WHERE status = ?";
			//prepara a frase sql antes de executar
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $produto->getStatus());
			//executa a frase sql no BD
			$stm->execute();
			//fecha a conexao com o BD
			$this->db = null;
			//returna o resultado no formato de OBJETOS
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
	}//fim classe
?>