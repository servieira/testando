<?php
	class PontoturisticoDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function inserir($Pontoturistico)
		{
			$sql = "INSERT INTO Pontoturistico (id_cidade, id_catPontoTuristico, nome, descricao, ingresso, horarioFuncionamento, site, logradouro, numero, bairro, cep, situacao, imagem) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
			//preparar frase
			$stm = $this->db->prepare($sql);
			//substituir o ponto de interrogação
			$stm->bindValue(1, $Pontoturistico->getCidade()->getId_cidade());
			$stm->bindValue(2, $Pontoturistico->getCat_PontoTuristico()->getId_catPontoTuristico());
			$stm->bindValue(3, $Pontoturistico->getNome());
			$stm->bindValue(4, $Pontoturistico->getDescricao());
			$stm->bindValue(5, $Pontoturistico->getIngresso());
			$stm->bindValue(6, $Pontoturistico->getHorarioFuncionamento());			
			$stm->bindValue(7, $Pontoturistico->getSite());			
			$stm->bindValue(8, $Pontoturistico->getLogradouro());
			$stm->bindValue(9, $Pontoturistico->getNumero());
			$stm->bindValue(10, $Pontoturistico->getBairro());
			$stm->bindValue(11, $Pontoturistico->getCep());
			$stm->bindValue(12, $Pontoturistico->getSituacao());
			$stm->bindValue(13, $Pontoturistico->getImagem());
			
			//executar a frase sql
			$stm->execute();
			//fechar a conexão
			$this->db = null;
			
		}
		public function alterar($Pontoturistico)
		{
			
			
			$sql = "UPDATE Pontoturistico SET 
			id_cidade = ?, 
			id_catPontoTuristico = ?,
			nome = ?, 
			descricao = ?, 
			ingresso = ?, 
			horarioFuncionamento = ?,
			site = ?, 
			logradouro = ?, 
			numero = ?, 
			bairro = ?, 
			cep = ?,			
			imagem = ? WHERE id_pontoTuristico = ?";
			$stm = $this->db->prepare($sql);
			
			$stm->bindValue(1, $Pontoturistico->getCidade()->getId_cidade());
			$stm->bindValue(2, $Pontoturistico->getCat_PontoTuristico()->getId_catPontoTuristico());
			$stm->bindValue(3, $Pontoturistico->getNome());
			$stm->bindValue(4, $Pontoturistico->getDescricao());
			$stm->bindValue(5, $Pontoturistico->getIngresso());
			$stm->bindValue(6, $Pontoturistico->getHorarioFuncionamento());			
			$stm->bindValue(7, $Pontoturistico->getSite());			
			$stm->bindValue(8, $Pontoturistico->getLogradouro());
			$stm->bindValue(9, $Pontoturistico->getNumero());
			$stm->bindValue(10, $Pontoturistico->getBairro());
			$stm->bindValue(11, $Pontoturistico->getCep());	
			$stm->bindValue(12, $Pontoturistico->getImagem());
			$stm->bindValue(13, $Pontoturistico->getId_pontoTuristico());	
			$stm->execute();
			$this->db = null;			
		}

		public function buscar_todos()
		{
			//frase sql que será executada
			$sql = "SELECT * FROM Pontoturistico"; /* as p, cidade as c WHERE p.id_cidade = c.id_cidade";*/
			//preparar frase
			$stm = $this->db->prepare($sql);
			//executar a frase sql
			$stm->execute();
			//fechar a conexão
			$this->db = null;
			//retornar o resultado da execução da frase sql
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}

		public function buscar_um_Pontoturistico($Pontoturistico)
		{
			$sql = "SELECT * FROM pontoturistico WHERE id_PontoTuristico = ?";
			
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $Pontoturistico->getId_pontoTuristico());
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		public function alterar_situacao_Pontoturistico($Pontoturistico)
		{
			$sql = "UPDATE Pontoturistico SET situacao = ? WHERE id_pontoTuristico = ?";			
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $Pontoturistico->getSituacao());
			$stm->bindValue(2, $Pontoturistico->getId_pontoTuristico());
			$stm->execute();
			$this->db = null;
		}
	}//fim da classe PontoturisticoDAO
?>