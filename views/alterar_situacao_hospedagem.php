<?php
	if($_GET)
	{
			require_once "../models/Conexao.class.php";
			require_once "../models/hospedagem.class.php";
			require_once "../models/hospedagemDAO.php";
		
		$hospedagem = new hospedagem(id_hospedagem:$_GET["id"], situacao:$_GET["situacao"]);
		$hospedagemDAO = new hospedagemDAO();
		$hospedagemDAO->alterar_situacao_hospedagem($hospedagem);
		header("location:listar_hospedagens.php");
	}
?>