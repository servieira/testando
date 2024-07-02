<?php
	class usuario
	{
		public function __construct(
            private int $idusuario = 0,
            private string $nome = "", 
            private string $email = "", 
            private string $senha = "", 
            private string $telefone = "",
            private string $foto_perfil = "",
            private string $tipo = "",
            private string $logradouro = "",
            private string $numero = "",
            private string $bairro = "",
            private string $cep = "",
            private string $situacao = "",
			private $Cidade = null){}
            
		
		
		public function getIdusuario()
		{
			return $this->idusuario;
		}
		
		public function getNome()
		{
			return $this->nome;
		}
		public function getEmail()
		{
			return $this->email;
		}
		
		
		public function getSenha()
		{
			return $this->senha;
		}
		public function getTelefone()
		{
			return $this->telefone;
		}
		public function getFoto_perfil()
		{
			return $this->foto_perfil;
		}
		public function getTipo()
		{
			return $this->tipo;
		}
		public function getLogradouro()
		{
			return $this->logradouro;
		}
		public function getNumero()
		{
			return $this->numero;
		}
		public function getBairro()
		{
			return $this->bairro;
		}
		public function getCep()
		{
			return $this->cep;
		}
		public function getSituacao()
		{
			return $this->situacao;
		}


        //METHODO SET
		public function setIdusuario($idusuario)
		{
			$this->idusuario = $idusuario;
		}
		
		public function setNome($nome)
		{
			$this->nome = $nome;
		}
		
		public function setEmail($email)
		{
			$this->email = $email;
		}
		
		public function setSenha($senha)
		{
			$this->senha = $senha;
		}
		public function setTelefone($telefone)
		{
			$this->telefone = $telefone;
		}
		public function setFoto_perfil($foto_perfil)
		{
			$this->foto_perfil = $foto_perfil;
		}
		public function setTipo($tipo)
		{
			$this->tipo = $tipo;
		}
		public function setLogradouro($logradouro)
		{
			$this->logradouro = $logradouro;
		}
		public function setNumero($numero)
		{
			$this->numero = $numero;
		}
		public function setBairro($bairro)
		{
			$this->bairro = $bairro;
		}
		public function setCep($cep)
		{
			$this->cep = $cep;
		}
		public function setSituacao($situacao)
		{
			$this->situacao = $situacao;
		}
	}
?>