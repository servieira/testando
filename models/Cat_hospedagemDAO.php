<?php
	class Cat_hospedagemDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function inserir($Cat_hospedagem)
		{
			$sql = "INSERT INTO Cat_hospedagem (descritivo, situacao) VALUES(?,?)";
			//preparar frase
			$stm = $this->db->prepare($sql);
			//substituir o ponto de interrogação			
			//$stm->bindValue(1, $Cat_hospedagem->getCat_Hospedagem()->getId_catHospedagem());
			$stm->bindValue(1, $Cat_hospedagem->getDescritivo());
			$stm->bindValue(2, $Cat_hospedagem->getSituacao());
			

			//executar a frase sql
			$stm->execute();
			//fechar a conexão
			$this->db = null;
			
		}
		public function alterar($Cat_hospedagem)
		{
			
			$sql = "UPDATE Cat_hospedagem SET descritivo = ? WHERE id_catHospedagem= ?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $Cat_hospedagem->getDescritivo());				
			$stm->bindValue(2, $Cat_hospedagem->getId_cathospedagem());
			
			
			$stm->execute();
			//nao colocar situacao
			$this->db = null;
		}
		
		
		public function buscar_todas()
		{
			//frase sql que será executada
			$sql = "SELECT * FROM Cat_hospedagem";
			//preparar frase
			$stm = $this->db->prepare($sql);
			//executar a frase sql
			$stm->execute();
			//fechar a conexão
			$this->db = null;
			//retornar o resultado da execução da frase sql
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		public function buscar_uma_Cat_hospedagem($Cat_hospedagem)
		{
			$sql = "SELECT * FROM Cat_hospedagem WHERE id_catHospedagem = ?";
			
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1,$Cat_hospedagem->getId_catHospedagem());
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		public function alterar_situacao_Cat_hospedagem($Cat_hospedagem)
		{
			$sql = "UPDATE Cat_hospedagem SET situacao = ? WHERE id_catHospedagem = ?";
			$stm = $this->db->prepare($sql);			
			
			$stm->bindValue(1, $Cat_hospedagem->getSituacao());	
			$stm->bindValue(2,$Cat_hospedagem->getId_catHospedagem());
			$stm->execute();
			$this->db = null;

		}
		public function buscar_categorias_ativas($Cat_hospedagem)
		{
			$sql = "SELECT * FROM Cat_hospedagem WHERE situacao = ?";
			
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1,$Cat_hospedagem->getSituacao());
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
	}//fim da classe Cat_hospedagemDAO
?>