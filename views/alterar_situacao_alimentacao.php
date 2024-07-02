<?php
	if($_GET)
	{
			require_once "../models/Conexao.class.php";
			require_once "../models/Alimentacao.class.php";
			require_once "../models/AlimentacaoDAO.php";
		
		$alimentacao = new Alimentacao(id_alimentacao:$_GET["id"], situacao:$_GET["situacao"]);
		$alimentacaoDAO = new AlimentacaoDAO();
		$alimentacaoDAO->alterar_situacao_alimentacao($alimentacao);
		header("location:listar_Alimentacoes.php");
	}
?>