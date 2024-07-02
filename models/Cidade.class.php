<?php
    class cidade
    {
        public function __construct(
            private int $id_cidade = 0,
            private string $nome = "", 
            private string $uf = "", 
            private string $situacao = "") {}
        
        public function getId_cidade()
        {
            return $this->id_cidade;
        }
        
        public function getNome()
        {
            return $this->nome;
        }
        
        public function getUf()
        {
            return $this->uf;
        }
        
        public function getSituacao()
        {
            return $this->situacao;
        }
        
        // Métodos SET
        public function setId_cidade($id_cidade)
        {
            $this->id_cidade = $id_cidade;
        }
        
        public function setNome($nome)
        {
            $this->nome = $nome;
        }
        
        public function setUf($uf)
        {
            $this->uf = $uf;
        }
        
        public function setSituacao($situacao)
        {
            $this->situacao = $situacao;
        }
        
    }
?>
