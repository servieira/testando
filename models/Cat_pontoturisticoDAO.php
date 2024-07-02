<?php
	class Cat_pontoturisticoDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function inserir($Cat_pontoturistico)
		{
			$sql = "INSERT INTO cat_pontoturistico (descritivo, situacao) VALUES(?,?)";
			//preparar frase
			$stm = $this->db->prepare($sql);
			//substituir o ponto de interrogação			
			
			$stm->bindValue(1, $Cat_pontoturistico->getDescritivo());
			$stm->bindValue(2, $Cat_pontoturistico->getSituacao());
			

			//executar a frase sql
			$stm->execute();
			//fechar a conexão
			$this->db = null;
			
		}
		public function alterar($Cat_pontoturistico)
		{
			$sql = "UPDATE cat_pontoturistico SET descritivo = ? WHERE id_catPontoTuristico= ?";
			$stm = $this->db->prepare($sql);
			
			$stm->bindValue(1, $Cat_pontoturistico->getDescritivo());
			$stm->bindValue(2, $Cat_pontoturistico->getId_catPontoTuristico());	
			$stm->execute();
			//nao colocar situacao
			$this->db = null;
		}
		
		
		 
		public function buscar_todas()
		{
			//frase sql que será executada
			$sql = "SELECT * FROM cat_pontoturistico";
			//preparar frase
			$stm = $this->db->prepare($sql);
			//executar a frase sql
			$stm->execute();
			//fechar a conexão
			$this->db = null;
			//retornar o resultado da execução da frase sql
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		public function buscar_uma_Cat_pontoturistico($Cat_pontoturistico)
		{
			$sql = "SELECT * FROM cat_pontoturistico WHERE id_catPontoTuristico = ?";
			
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1,$Cat_pontoturistico->getId_catPontoTuristico());
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		public function alterar_situacao_Cat_pontoturistico($Cat_pontoturistico)
		{
			$sql = "UPDATE cat_pontoturistico SET situacao = ? WHERE id_catPontoTuristico = ?";
			$stm = $this->db->prepare($sql);
            $stm->bindValue(1, $Cat_pontoturistico->getSituacao());
			$stm->bindValue(2, $Cat_pontoturistico->getId_catPontoTuristico());
			$stm->execute();
				
			$this->db = null;
		}

		public function buscar_categorias_ativas($Cat_pontoturistico)
		{
			$sql = "SELECT * FROM cat_pontoturistico WHERE situacao = ?";
			
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1,$Cat_pontoturistico->getSituacao());
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
	}//fim da classe Cat_hospedagemDAO
?>