<?php
	if($_GET)
	{
			require_once "../models/Conexao.class.php";
			require_once "../models/Cat_alimentacao.class.php";
			require_once "../models/Cat_alimentacaoDAO.php";
		
		$categoria = new Cat_alimentacao($_GET["id"], "", $_GET["situacao"]);
		$categoriaDAO = new Cat_alimentacaoDAO();
		$categoriaDAO->alterar_situacao_Cat_alimentacao($categoria);
		header("location:listar_cat_alimentacao.php");
	}
?>