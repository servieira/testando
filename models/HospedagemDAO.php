<?php
	class HospedagemDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function inserir($Hospedagem)
		{

			$sql = "INSERT INTO Hospedagem (id_cidade, id_catHospedagem, nome, descricao, link, imagem, classificacao, logradouro, numero, bairro, cep, situacao) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
			//preparar frase
			$stm = $this->db->prepare($sql);
			//substituir o ponto de interrogação
			$stm->bindValue(1, $Hospedagem->getCidade()->getId_cidade());
			$stm->bindValue(2, $Hospedagem->getCat_hospedagem()->getId_catHospedagem());
			$stm->bindValue(3, $Hospedagem->getNome());
			$stm->bindValue(4, $Hospedagem->getDescricao());
			$stm->bindValue(5, $Hospedagem->getLink());
			$stm->bindValue(6, $Hospedagem->getImagem());
			$stm->bindValue(7, $Hospedagem->getClassificacao());			
			$stm->bindValue(8, $Hospedagem->getLogradouro());
			$stm->bindValue(9, $Hospedagem->getNumero());
			$stm->bindValue(10, $Hospedagem->getBairro());
			$stm->bindValue(11, $Hospedagem->getCep());
			$stm->bindValue(12, $Hospedagem->getSituacao());
			

			//executar a frase sql
			$stm->execute();
			//fechar a conexão
			$this->db = null;
			
		}

		public function alterar($Hospedagem)
		{
			$sql = "UPDATE Hospedagem SET 
			
			nome = ?, 
			descricao = ?, 
			link = ?,  
			imagem = ?,
			classificacao = ?,
			id_cidade = ?,			
			logradouro = ?, 
			numero = ?, 
			bairro = ?, 
			cep = ?,
			id_catHospedagem = ?,
			
			
			 WHERE id_hospedagem = ?";

			$stm = $this->db->prepare($sql);
			
				
				
			$stm->bindValue(1, $Hospedagem->getNome());
			$stm->bindValue(2, $Hospedagem->getDescricao());
			$stm->bindValue(3, $Hospedagem->getLink());		
			$stm->bindValue(4, $Hospedagem->getImagem());				
			$stm->bindValue(5, $Hospedagem->getClassificacao());
			$stm->bindValue(6, $Hospedagem->getCidade()->getId_cidade());
			$stm->bindValue(7, $Hospedagem->getLogradouro());			
			$stm->bindValue(8, $Hospedagem->getNumero());
			$stm->bindValue(9, $Hospedagem->getBairro());
			$stm->bindValue(10, $Hospedagem->getCep());			
			$stm->bindValue(11, $Hospedagem->getCat_hospedagem()->getId_catHospedagem());						
			$stm->bindValue(12, $Hospedagem->getId_hospedagem());
			$stm->execute();
			//nao colocar situacao

			
		}
		
		/*inicio*/

		

		/*fim*/
		 
		public function buscar_todos()
			{
				//frase sql que será executada
				$sql = "SELECT * FROM hospedagem"; /*as p, cidade as c WHERE p.id_cidade = c.id_cidade";*/
				/*preparar */
				$stm = $this->db->prepare($sql);
				/*executar a frase sql*/
				$stm->execute();
				/*fechar a conexão*/
				$this->db = null;
				/*retornar o resultado da execução da frase */
				 return $stm->fetchAll(PDO::FETCH_OBJ);

				 
			}
			
			public function buscar_um_Hospedagem($Hospedagem)
				{
						
					$sql = "SELECT * FROM Hospedagem WHERE id_hospedagem = ?";
					
					$stm = $this->db->prepare($sql);
					$stm->bindValue(1,$Hospedagem->getId_hospedagem());
					$stm->execute();
					$this->db = null;
					return $stm->fetchAll(PDO::FETCH_OBJ);
				}
			public function alterar_situacao_hospedagem($Hospedagem)
				{
					
					$sql = "UPDATE hospedagem SET situacao = ? WHERE id_hospedagem = ?";
					$stm = $this->db->prepare($sql);
					$stm->bindValue(1, $Hospedagem->getSituacao());
					$stm->bindValue(2, $Hospedagem->getId_hospedagem());
					$stm->execute();
					$this->db = null;
				}
		
	}/*fim da classe HospedagemDAO*/
?>