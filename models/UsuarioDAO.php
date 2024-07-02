<?php
	class UsuarioDAO extends Conexao
	{
		public function __construct()
		{
			parent:: __construct();
		}
		
		public function inserir($Usuario)
		{
			$sql = "INSERT INTO Usuario (nome, email, senha, telefone, foto_perfil, tipo,  logradouro, numero, bairro, cep, situacao) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
			//preparar frase
			$stm = $this->db->prepare($sql);
			//substituir o ponto de interrogação			
			$stm->bindValue(1, $Usuario->getNome());			
			$stm->bindValue(2, $Usuario->getEmail());
			$stm->bindValue(3, $Usuario->getSenha());
			$stm->bindValue(4, $Usuario->getTelefone());
			$stm->bindValue(5, $Usuario->getFoto_perfil());		
			$stm->bindValue(6, $Usuario->getTipo());		
			$stm->bindValue(7, $Usuario->getLogradouro());
			$stm->bindValue(8, $Usuario->getNumero());
			$stm->bindValue(9, $Usuario->getBairro());
			$stm->bindValue(10, $Usuario->getCep());
			$stm->bindValue(11, $Usuario->getSituacao());
			//executar a frase sql
			$stm->execute();
			//fechar a conexão
			$this->db = null;
			
		}
		public function alterar($Usuario)
		{
			
			$sql = "UPDATE Usuario SET nome = ?, email = ?, senha = ?, telefone = ?, foto_perfil = ?, tipo = ?, logradouro = ?, numero = ?, bairro = ?, cep = ?, situacao = ? WHERE idusuario = ?";
			$stm = $this->db->prepare($sql);
			
			$stm->bindValue(1, $Usuario->getNome());
			$stm->bindValue(2, $Usuario->getTelefone());
			$stm->bindValue(3, $Usuario->getEmail());
			$stm->bindValue(4, $Usuario->getLink());
			$stm->bindValue(5, $Usuario->getDescricao());		
			$stm->bindValue(6, $Usuario->getImagem());		
			$stm->bindValue(7, $Usuario->getLogradouro());
			$stm->bindValue(8, $Usuario->getNumero());
			$stm->bindValue(9, $Usuario->getBairro());
			$stm->bindValue(10, $Usuario->getCep());
			$stm->bindValue(11, $Usuario->getSituacao());
			$stm->execute();
			$this->db = null;
		}
		
		public function excluir($Usuario)
		{
			$sql = "DELETE FROM Usuario WHERE idusuario = ?";
			$stm = $this->db->prepare($sql);			
            $stm->bindValue(1, $Usuario->getIdusuario());
			$stm->execute();
			$this->db = null;
		}
		 
		public function buscar_todos()
		{
			//frase sql que será executada
			$sql = "SELECT * FROM Usuario as p, cidade as c WHERE p.idusuario = c.idusuario";
			//preparar frase
			$stm = $this->db->prepare($sql);
			//executar a frase sql
			$stm->execute();
			//fechar a conexão
			$this->db = null;
			//retornar o resultado da execução da frase sql
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		public function buscar_uma_Usuario($Usuario)
		{
			$sql = "SELECT * FROM Usuario WHERE idusuario = ?";
			
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1,$Usuario->getIdusuario());
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		public function alterar_situacao_Usuario($Usuario)
		{
			$sql = "UPDATE Usuario SET situacao = ? WHERE idusuario = ?";
			$stm = $this->db->prepare($sql);			
			$stm->bindValue(1, $Usuario->getIdusuario());
			$stm->bindValue(2, $Usuario->getSituacao());
			$this->db = null;
		}

		public function verificar_login($usuario)
		{
			$sql = "SELECT idusuario, nome, tipo FROM usuario WHERE email = ? AND senha = ?";
			
			$stm = $this->db->prepare($sql);
			$stm->bindValue(1, $usuario->getEmail());
			$stm->bindValue(2, $usuario->getSenha());
			$stm->execute();
			$this->db = null;
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
	}//fim da classe UsuarioDAO
?>