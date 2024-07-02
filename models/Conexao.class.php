<?php
	abstract class Conexao
	{
		public function __construct(protected $db = null)
		{
			$parametros = "mysql:host=localhost;dbname=dbdiamond;";
			
			$this->db = new PDO($parametros, "root", "");
		}
	}
	
?>

