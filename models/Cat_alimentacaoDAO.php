<?php
	class Cat_alimentacaoDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function inserir($Cat_alimentacao)
		{
			$sql = "INSERT INTO Cat_alimentacao (descritivo, situacao) VALUES(?,?)";
			//preparar frase
			$stm = $this->db->prepare($sql);
			//substituir o ponto de interrogação			
			//$stm->bindValue(1, $Cat_alimentacao->getCat_alimentacao()->getId_catAlimentacao());
			$stm->bindValue(1, $Cat_alimentacao->getDescritivo());
			$stm->bindValue(2, $Cat_alimentacao->getSituacao());
			

			//executar a frase sql
			$stm->execute();
			//fechar a conexão
			$this->db = null;
			
		}
		public function alterar($Cat_alimentacao)
		{
			
			$sql = "UPDATE Cat_alimentacao SET descritivo = ? WHERE id_catAlimentacao= ?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $Cat_alimentacao->getDescritivo());				
			$stm->bindValue(2, $Cat_alimentacao->getId_catAlimentacao());
			$stm->execute();
			//nao colocar situacao
			$this->db = null;
		}
		
		
		public function buscar_todas()
		{
			//frase sql que será executada
			$sql = "SELECT * FROM Cat_alimentacao";
			//preparar frase
			$stm = $this->db->prepare($sql);
			//executar a frase sql
			$stm->execute();
			//fechar a conexão
			$this->db = null;
			//retornar o resultado da execução da frase sql
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		public function buscar_uma_Cat_alimentacao($Cat_alimentacao)
		{
			$sql = "SELECT * FROM Cat_alimentacao WHERE id_catAlimentacao = ?";
			
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1,$Cat_alimentacao->getId_catAlimentacao());
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		public function alterar_situacao_Cat_alimentacao($Cat_alimentacao)
		{
			$sql = "UPDATE Cat_alimentacao SET situacao = ? WHERE id_catAlimentacao = ?";
			$stm = $this->db->prepare($sql);			
			
			$stm->bindValue(1, $Cat_alimentacao->getSituacao());	
			$stm->bindValue(2,$Cat_alimentacao->getId_catAlimentacao());
			$stm->execute();
			$this->db = null;

		}
		public function buscar_categorias_ativas($Cat_alimentacao)
		{
			$sql = "SELECT * FROM Cat_alimentacao WHERE situacao = ?";
			
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1,$Cat_alimentacao->getSituacao());
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
	}//fim da classe Cat_alimentacaoDAO
?>