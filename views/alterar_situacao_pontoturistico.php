<?php
	if($_GET)
	{
			require_once "../models/Conexao.class.php";
			require_once "../models/Pontoturistico.class.php";
			require_once "../models/PontoturisticoDAO.php";
		
		$ponto = new Pontoturistico(id_pontoTuristico:$_GET["id"],situacao:$_GET["situacao"]);
		$pontoDAO = new PontoturisticoDAO();
		$pontoDAO->alterar_situacao_Pontoturistico($ponto);
		header("location:listar_pontoturistico.php");
	}
?>