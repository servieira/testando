<?php
	class Hospedagem
	{
		
		public function __construct(
            private int $id_hospedagem = 0,
            private string $nome = "", 
            private string $descricao = "",
			private string $link = "",
			private string $imagem = "",
			private string $classificacao = "", 
			private $cidade = null,  
			private string $logradouro = "", 
			private string $numero = "",    
			private string $bairro = "",           
            private string $cep = "", 
            private $cat_hospedagem = null,			
			private string $situacao = ""){}     
            
		
		
		public function getId_hospedagem()
		{
			return $this->id_hospedagem;
		}
        		
		public function getNome()
		{
			return $this->nome;
		}

		public function getDescricao()
		{
			return $this->descricao;
		}		
		
		public function getLink()
		{
			return $this->link;
		}
		public function getImagem()
		{
			return $this->imagem;
		}

		public function getClassificacao()
		{
			return $this->classificacao;
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
		public function getCidade()
		{
			return $this->cidade;
		}	

		public function getCat_hospedagem() {
			return $this->cat_hospedagem;
		}

		
		
		public function getSituacao()
		{
			return $this->situacao;
		}
				

        //METHODO SET
		public function setId_hospedagem($id_hospedagem)
		{
			$this->id_hospedagem = $id_hospedagem;
		}

        public function setNome($nome)
		{
			$this->nome = $nome;
		}
	
		
		public function setDescricao($descricao)
		{
			$this->descricao = $descricao;
		}

		public function setLink($link)
		{
			$this->link = $link;
		}

		public function setClassificacao($classificacao)
		{
			$this->classificacao = $classificacao;
		}

		public function setCidade($cidade)
		{
			$this->cidade = $cidade;
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

		public function setCat_hospedagem($cat_hospedagem)
		{
			$this->cat_hospedagem = $cat_hospedagem;
		}

		public function setImagem($imagem)
		{
			$this->imagem = $imagem;
		}

		public function setSituacao($situacao)
		{
			$this->situacao = $situacao;
		}		
	}
?>