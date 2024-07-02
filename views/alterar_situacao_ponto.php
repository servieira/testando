<?php
	if($_GET)
	{
		require_once "../models/Conexao.class.php";
			require_once "../models/Cat_pontoturistico.class.php";
			require_once "../models/Cat_pontoturisticoDAO.php";
		
		$categoria = new Cat_pontoturistico($_GET["id"], "", $_GET["situacao"]);
		$categoriaDAO = new Cat_pontoturisticoDAO();
		$categoriaDAO->alterar_situacao_Cat_pontoturistico($categoria);
		header("location:listar_cat_pontos.php");
	}
?>