<?php
	if($_GET)
	{
			require_once "../models/Conexao.class.php";
			require_once "../models/Cidade.class.php";
			require_once "../models/CidadeDAO.php";
		
		$cidade = new cidade(id_cidade:$_GET["id"], situacao:$_GET["situacao"]);
		$cidadeDAO = new CidadeDAO();
		$cidadeDAO->alterar_situacao_cidade($cidade);
		header("location:listar_cidades.php");
	}
?>