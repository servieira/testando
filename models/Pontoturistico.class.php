<?php
	class Pontoturistico
	{
		public function __construct(
            private int $id_pontoTuristico = 0,
            private string $nome = "", 
            private string $descricao = "",              
            private string $ingresso = "",
            private string $horarioFuncionamento = "",
            private string $site = "",
            private string $logradouro = "",            
            private string $numero = "",
            private string $bairro = "",
            private string $cep = "",
            private string $situacao = "",			
			private $cidade = null,			
			private $cat_pontoturistico = null,
			private string $imagem = ""){}
            
		
		
		public function getId_pontoTuristico()
		{
			return $this->id_pontoTuristico;
		}
        		
		public function getNome()
		{
			return $this->nome;
		}

		public function getDescricao()
		{
			return $this->descricao;
		}

		public function getIngresso()
		{
			return $this->ingresso;
		}
		public function getHorarioFuncionamento()
		{
			return $this->horarioFuncionamento;
		}
		public function getSite()
		{
			return $this->site;
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
		
		public function getCidade() {
			return $this->cidade;
			}
		
		public function getCat_pontoturistico() {
			return $this->cat_pontoturistico;
		}
		public function getImagem()
		{
			return $this->imagem;
		}


        //METHODO SET
		public function setId_pontoTuristico($Id_pontoTuristico)
		{
			$this->id_pontoTuristico = $id_pontoTuristico;
		}

        public function setNome($nome)
		{
			$this->nome = $nome;
		}
		
		public function setDescricao($descricao)
		{
			$this->descricao = $descricao;
		}
		
		public function setIngresso($ingresso)
		{
			$this->ingresso = $ingresso;
		}

		public function setHorarioFuncionamento($horarioFuncionamento)
		{
			$this->horarioFuncionamento = $horarioFuncionamento;
		}

		public function setSite($site)
		{
			$this->site = $site;
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

		public function setCidade(string $Cidade): void
    	{
        $this->cidade = $cidade;
    	}

    	public function setCat_pontoturistico(string $Cat_Pontoturistico): void
    	{
        $this->cat_PontoTuristico = $cat_pontoturistico;
    	}

		public function setImagem($imagem)
		{
			$this->imagem = $imagem;
		}
	}
?>