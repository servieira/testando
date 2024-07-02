<?php
	$erro = "";
	        require_once "../models/Conexao.class.php";
			require_once "../models/Cat_pontoturistico.class.php";
			require_once "../models/Cat_pontoturisticoDAO.php";
	if($_GET)
	{
		$categoria = new Cat_pontoturistico($_GET["id"]);
		$categoriaDAO = new Cat_pontoturisticoDAO();
		$retorno = $categoriaDAO->buscar_uma_Cat_pontoturistico($categoria);
	}
	if($_POST)
	{
		if(empty($_POST["descritivo"]))
		{
			$erro = "Preencha o descritivo da categoria";
		}
		else
		{
			
			$categoria = new Cat_pontoturistico($_POST["idcategoria"] , $_POST["descritivo"]);
			
			
			
			//alterar
			$categoriaDAO = new Cat_pontoturisticoDAO();
			$categoriaDAO->alterar($categoria);
		}
        header("location:listar_cat_pontos.php");
		
	}
    require_once "header.php";
?>

	<div class="content">
		<div class="container"><br><br>
		<h1>Categoria</h1><br>
		<form action="#" method="post">
		
			<input type="hidden" name="idcategoria" value="<?php echo $retorno[0]->id_catPontoTuristico; ?>">
			
			<label for="descritivo">Descritivo:</label>
			<input type="text" name="descritivo" id="descritivo" value="<?php echo $retorno[0]->descritivo;?>">
			<div><?php echo $erro;?></div>
			<br><br>
			<input type="submit" value="Alterar">
		</form>
        </div>
	</div>
<?php	
	require_once "footer.html";
?>