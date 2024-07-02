<?php
class Alimentacao
{
    // Constructor with type hints and default values
    public function __construct(
        private int $id_alimentacao = 0,
        private string $nome = "", 
        private string $telefone = "",              
        private string $email = "",
        private string $link = "",
        private string $descricao = "",            
        private string $imagem = "",
        private string $logradouro = "",
        private string $numero = "",
        private string $bairro = "",
        private string $cep = "",
        private string $situacao = "",
        private $cidade = null,
        private $Cat_alimentacao = null){}

    // Getter methods

    
    public function getId_alimentacao(): int
    {
        return $this->id_alimentacao;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getImagem(): string
    {
        return $this->imagem;
    }

    public function getLogradouro(): string
    {
        return $this->logradouro;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function getBairro(): string
    {
        return $this->bairro;
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    public function getSituacao(): string
    {
        return $this->situacao;
    }

    public function getCidade() {
    return $this->cidade;
    }

    public function getCat_alimentacao() {
        return $this->Cat_alimentacao;
    }
	
   
		

    // Setter methods
    public function setId_alimentacao(int $id_alimentacao): void
    {
        $this->id_alimentacao = $id_alimentacao;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }	

    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function setImagem(string $imagem): void
    {
        $this->imagem = $imagem;
    }

    public function setLogradouro(string $logradouro): void
    {
        $this->logradouro = $logradouro;
    }

    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    public function setBairro(string $bairro): void
    {
        $this->bairro = $bairro;
    }

    public function setCep(string $cep): void
    {
        $this->cep = $cep;
    }

    public function setSituacao(string $situacao): void
    {
        $this->situacao = $situacao;
    }
    public function setCidade(string $cidade): void
    {
        $this->cidade = $cidade;
    }
    public function setCat_alimentacao(string $Cat_alimentacao): void
    {
        $this->cat_alimentacao = $cat_alimentacao;
    }
}
?>
