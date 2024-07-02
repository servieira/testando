<?php
	class Cat_alimentacao
	{
		public function __construct(
            private int $id_catAlimentacao = 0,
            private string $descritivo = "", 
            private string $situacao = ""
			){}
            
		
		
		public function getId_catAlimentacao()
		{
			return $this->id_catAlimentacao;
		}
        		
		public function getDescritivo()
		{
			return $this->descritivo;
		}

		public function getSituacao()
		{
			return $this->situacao;
		}
		
		
		
		


        //METHODO SET
		public function setId_catAlimentacao($id_alimentacao)
		{
			$this->id_alimentacao = $id_alimentacao;
		}

        public function setDescritivo($descritivo)
		{
			$this->descritivo = $descritivo;
		}	
		
		public function setSituacao($situacao)
		{
			$this->situacao = $situacao;
		}
		
		
	}
?>