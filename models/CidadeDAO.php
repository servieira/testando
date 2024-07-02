<?php
require_once "Conexao.class.php";
require_once "Cidade.class.php";

class CidadeDAO extends Conexao {
    
    public function __construct() {
        parent::__construct();
    }
	public function inserir(Cidade $cidade) {
        $sql = "INSERT INTO cidade (nome, uf, situacao) VALUES (?, ?, ?)";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(1, $cidade->getNome());
        $stm->bindValue(2, $cidade->getUf());
        $stm->bindValue(3, $cidade->getSituacao());
        $stm->execute();
        $this->db = null;
    }

    public function alterar(Cidade $cidade) {
        $sql = "UPDATE cidade SET nome = ?, uf = ? WHERE id_cidade = ?";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(1, $cidade->getNome());
        $stm->bindValue(2, $cidade->getUf());
        $stm->bindValue(3, $cidade->getId_cidade());
        $stm->execute();
        $this->db = null;
    }

    public function buscar_todas() 
	{
        $sql = "SELECT * FROM cidade";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        $this->db = null;
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscar_uma_cidade($cidade) {
        $sql = "SELECT * FROM cidade WHERE id_cidade = ?";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(1, $cidade->getId_cidade());
        $stm->execute();
        $this->db = null;
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function alterar_situacao_cidade($cidade) {
        $sql = "UPDATE cidade SET situacao = ? WHERE id_cidade = ?";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(1, $cidade->getSituacao());
        $stm->bindValue(2, $cidade->getId_cidade());
        $stm->execute();
        $this->db = null;
    }

    public function buscar_cidades_ativas($cidade) {
        $sql = "SELECT * FROM cidade WHERE situacao = ?";
        $stm = $this->db->prepare($sql);
        $stm->bindValue(1, $cidade->getSituacao());
        $stm->execute();
        $this->db = null;
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
}
?>
