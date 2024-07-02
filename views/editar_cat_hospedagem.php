<?php
	$erro = "";
	        require_once "../models/Conexao.class.php";
			require_once "../models/Cat_hospedagem.class.php";
			require_once "../models/Cat_hospedagemDAO.php";
			if($_GET) {
				$id = intval($_GET["id"]); // Converte para inteiro
				$categoria = new Cat_hospedagem($id);
				$categoriaDAO = new Cat_hospedagemDAO();
				$retorno = $categoriaDAO->buscar_uma_Cat_hospedagem($categoria);
			}
			
			if($_POST) {
				if(empty($_POST["descritivo"])) {
					$erro = "Preencha o descritivo da categoria";
				} else {
					$id = intval($_POST["idcategoria"]); // Converte para inteiro
					$categoria = new Cat_hospedagem($id, $_POST["descritivo"]);
					$categoriaDAO = new Cat_hospedagemDAO();
					$categoriaDAO->alterar($categoria);
				}
				header("location:listar_cat_hospedagem.php");
			}
			
    require_once "header.php";
?>

	<div class="content">
		<div class="container">
		<h1>Categoria</h1>
		<form action="#" method="post">
		
			<input type="hidden" name="idcategoria" value="<?php echo $retorno[0]->id_catHospedagem; ?>">
			
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