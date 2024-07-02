<?php
	class alimentacaoDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function inserir($alimentacao)
		{

			$sql = "INSERT INTO alimentacao (id_cidade, id_catAlimentacao, nome, telefone, email, link, descricao, imagem, logradouro, numero, bairro, cep, situacao) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
			//preparar frase
			$stm = $this->db->prepare($sql);
			//substituir o ponto de interrogação
			$stm->bindValue(1, $alimentacao->getCidade()->getId_cidade());
			$stm->bindValue(2, $alimentacao->getCat_alimentacao()->getId_catAlimentacao());
			$stm->bindValue(3, $alimentacao->getNome());
			$stm->bindValue(4, $alimentacao->getTelefone());
			$stm->bindValue(5, $alimentacao->getEmail());
			$stm->bindValue(6, $alimentacao->getLink());
			$stm->bindValue(7, $alimentacao->getDescricao());
			$stm->bindValue(8, $alimentacao->getImagem());						
			$stm->bindValue(9, $alimentacao->getLogradouro());
			$stm->bindValue(10, $alimentacao->getNumero());
			$stm->bindValue(11, $alimentacao->getBairro());
			$stm->bindValue(12, $alimentacao->getCep());
			$stm->bindValue(13, $alimentacao->getSituacao());
			

			//executar a frase sql
			$stm->execute();
			//fechar a conexão
			$this->db = null;
			
		}

		public function alterar($alimentacao)
		{
			
			$sql = "UPDATE alimentacao SET id_cidade = ?, id_catAlimentacao = ?, nome = ?, telefone = ?, email = ?, link = ?, descricao = ?, imagem = ?, logradouro = ?, numero = ?, bairro = ?, cep = ?, situacao = ? WHERE id_alimentacao = ?";
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $alimentacao->getCidade()->getId_cidade());
			$stm->bindValue(2, $alimentacao->getCat_alimentacao()->getId_catAlimentacao());
			$stm->bindValue(3, $alimentacao->getNome());
			$stm->bindValue(4, $alimentacao->getTelefone());
			$stm->bindValue(5, $alimentacao->getEmail());
			$stm->bindValue(6, $alimentacao->getLink());
			$stm->bindValue(7, $alimentacao->getDescricao());
			$stm->bindValue(8, $alimentacao->getImagem());						
			$stm->bindValue(9, $alimentacao->getLogradouro());
			$stm->bindValue(10, $alimentacao->getNumero());
			$stm->bindValue(11, $alimentacao->getBairro());
			$stm->bindValue(12, $alimentacao->getCep());
			$stm->bindValue(13, $alimentacao->getSituacao());
			$stm->bindValue(14, $alimentacao->getid_alimentacao());
			$stm->execute();
			//nao colocar situacao
			$this->db = null;
		}
		
		
		 
		public function buscar_todos()
			{
				//frase sql que será executada
				$sql = "SELECT * FROM alimentacao"; /*as p, cidade as c WHERE p.id_cidade = c.id_cidade";*/
				/*preparar */
				$stm = $this->db->prepare($sql);
				/*executar a frase sql*/
				$stm->execute();
				/*fechar a conexão*/
				$this->db = null;
				/*retornar o resultado da execução da frase */
				 return $stm->fetchAll(PDO::FETCH_OBJ);

				 
			}
			
			public function buscar_uma_alimentacao($alimentacao)
				{
						
					$sql = "SELECT * FROM alimentacao WHERE id_alimentacao = ?";
					
					$stm = $this->db->prepare($sql);
					$stm->bindValue(1,$alimentacao->getId_alimentacao());
					$stm->execute();
					$this->db = null;
					return $stm->fetchAll(PDO::FETCH_OBJ);
				}
			public function alterar_situacao_alimentacao($alimentacao)
				{
					
					$sql = "UPDATE alimentacao SET situacao = ? WHERE id_alimentacao = ?";
					$stm = $this->db->prepare($sql);
					$stm->bindValue(1, $alimentacao->getSituacao());
					$stm->bindValue(2, $alimentacao->getId_alimentacao());
					$stm->execute();
					$this->db = null;
				}
		
	}/*fim da classe alimentacaoDAO*/
?>