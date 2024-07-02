<?php
	if($_GET) {
		require_once "../models/Conexao.class.php";
		require_once "../models/Cat_hospedagem.class.php";
		require_once "../models/Cat_hospedagemDAO.php";
	
		$id = intval($_GET["id"]); // Converte para inteiro
		$categoria = new Cat_hospedagem($id, "", $_GET["situacao"]);
		$categoriaDAO = new Cat_hospedagemDAO();
		$categoriaDAO->alterar_situacao_Cat_hospedagem($categoria);
		header("location:listar_cat_hospedagem.php");
	}
	
?>