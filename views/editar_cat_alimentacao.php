<?php
	$erro = "";
	        require_once "../models/Conexao.class.php";
			require_once "../models/Cat_alimentacao.class.php";
			require_once "../models/Cat_alimentacaoDAO.php";
	if($_GET)
	{
		$categoria = new Cat_alimentacao($_GET["id"]);
		$categoriaDAO = new Cat_alimentacaoDAO();
		$retorno = $categoriaDAO->buscar_uma_Cat_alimentacao($categoria);
	}
	if($_POST)
	{
		if(empty($_POST["descritivo"]))
		{
			$erro = "Preencha o descritivo da categoria";
		}
		else
		{
			
			$categoria = new Cat_alimentacao($_POST["idcategoria"] , $_POST["descritivo"]);
			
			
			
			//alterar
			$categoriaDAO = new Cat_alimentacaoDAO();
			$categoriaDAO->alterar($categoria);
		}
        header("location:listar_cat_alimentacao.php");
		
	}
    require_once "header.php";
?>

	<div class="content">
		<div class="container">
		<h1>Categoria</h1>
		<form action="#" method="post">
		
			<input type="hidden" name="idcategoria" value="<?php echo $retorno[0]->id_catAlimentacao; ?>">
			<!--id_catalimentacao como está no Banco de dados-->
			
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