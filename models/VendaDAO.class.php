<?php
    class VendaDAO extends Conexao
    {
        public function __construct()
        {
            parent:: __construct();
        }

        public function inserir_venda($venda)
        {
           
          
            //vamos pegar essa transaçao controlar na mao
            $this->db->beginTransaction();
            $sql= "INSERT INTO venda (data_venda, idusuario) VALUES (?,?)";
            try
            {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $venda->getData_venda());
                $stm->bindValue(2, $venda->getUsuario()->getIdusuario());
                $stm->execute();        
                $idvenda= $this->db->lastInsertId();
            }
            catch(PDOException $e)
            {
                return "Problema com a venda";
            }
            $sql ="INSERT INTO itens (quantidade,precoUnitario, idproduto, idvenda) VALUES(?,?,?,?) ";
            
            foreach($venda->getItens() as $dado)
        {
            try
            {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $dado->getQuantidade());
                $stm->bindValue(2, $dado->getPrecoUnitario());
                $stm->bindValue(3, $dado->getProduto()->getIdproduto());
                $stm->bindValue(4, $idvenda);
                 $stm->execute();  

            }
            catch(PDOException $e) //p controlar caso der erro, saber a transao q tem q desfazer
            {
                $this->db->rollback();
                $this->db = null;
                return "Erro ao inserir itens da venda";
            }

        }//fim foreach
        $this->db->commit();
        $this->db=null;
        return "venda com sucesso";
    }
}
    ?>