<?php
	class CategoriaDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function buscar_todas_categorias()
		{
			$sql = "SELECT * FROM categoria";
			//prepara a frase sql antes de executar
			$stm = $this->db->prepare($sql);
			//executa a frase sql no BD
			$stm->execute();
			//fecha a conexao com o BD
			$this->db = null;
			//returna o resultado no formato de OBJETOS
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		
		public function buscar_uma_categoria($categoria)
		{
			$sql = "SELECT * FROM categoria WHERE idcategoria = ?";
			
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $categoria->getIdcategoria());
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		
		public function inserir_categoria($categoria)
		{
			$sql = "INSERT INTO categoria(descritivo, status)VALUES(?,?)";
			
			$stm = $this->db->prepare($sql);
			//substituir os pontos de interrogação
			$stm->bindValue(1, $categoria->getDescritivo());
			$stm->bindValue(2, $categoria->getStatus());
			
			$stm->execute();
			
			$this->db = null;
			
		}
		
		public function alterar_categoria($categoria)
		{
			$sql = "UPDATE categoria SET descritivo = ? WHERE idcategoria = ?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $categoria->getDescritivo());
			$stm->bindValue(2, $categoria->getIdcategoria());
			$stm->execute();
			$this->db = null;
			
		}
		
		public function excluir_categoria($categoria)
		{
			$sql = "DELETE FROM categoria WHERE idcategoria = ?";
			
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $categoria->getIdcategoria());
			$stm->execute();
			$this->db = null;
		}
		public function alterar_status($categoria)
		{
			$sql = "UPDATE categoria SET status = ? WHERE idcategoria = ?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $categoria->getStatus());
			$stm->bindValue(2, $categoria->getIdcategoria());
			$stm->execute();
			$this->db = null;
		}
		//novo
		public function buscar_todas_categorias_ativas($categoria)
		{
			//novo
			$sql = "SELECT * FROM categoria WHERE status = ?";
			
			$stm = $this->db->prepare($sql);
			//novo
			$stm->bindValue(1, $categoria->getStatus());
			
			//executa a frase sql no BD
			$stm->execute();
			//fecha a conexao com o BD
			$this->db = null;
			//returna o resultado no formato de OBJETOS
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
	}//fim classe
?>