<style>
.titulo{
	color:DarkViolet;
}
.desc{
	font-weight: 600; /* Negrito suave */
	letter-spacing: 1px; /* Aumentar a distância entre as letras */
	padding-left: 4px;	
    font-size: 1.2rem; /* Tamanho da fonte, ajustado para 12px */
    color: red; /* Cor do texto vermelho */           
}

#descritivo{
	font-size: 1.3rem; /* Tamanho da fonte, ajustado para 12px */
	font-weight: 600; /* Negrito suave */
	padding-left:5px;	
	padding:5px;
	width:400px;
}
.label_descritivo{
	font-size: 1.3rem; /* Tamanho da fonte, ajustado para 12px */
	font-weight: 600; /* Negrito suave */
	padding-left:5px;	
	padding:px;	
}
.butt{
	font-weight: 600; /* Negrito suave */
	width: 100px; /* Largura da caixa de texto */
    height: 40px; /* Altura da caixa de texto */
	background-color: rgba(148, 0, 211, 0.1);/*#DCDCDC;*/
	margin-left: 2px;
	border:1;
	border-color:DarkViolet;
}
</style>

<?php
	$erro = "";
	if($_POST)
	{
		if(empty($_POST["descritivo"]))
		{
			$erro = "Preencha o Descritivo.";
		}
		else
		{
			require_once "../models/Conexao.class.php";
			require_once "../models/Cat_alimentacao.class.php";
			require_once "../models/Cat_alimentacaoDAO.php";
			
			$categoria = new Cat_alimentacao(0 , $_POST["descritivo"], "Ativo");
			//inserir
			$categoriaDAO = new Cat_alimentacaoDAO();
			$categoriaDAO->inserir($categoria);
			header("location:listar_cat_alimentacao.php");
		}
		
	}
	require_once "header.php";

?>
	<div class="content">
		<div class="container"><br><br>
		<h1 class="titulo">Cadastrar Categoria de Alimentação </h1>
		<form action="#" method="post"><br>
			<label class="label_descritivo" for="descritivo">Descritivo:</label><br>
			<input type="text" name="descritivo" id="descritivo">
			<div class="desc"><?php echo $erro;?></div>
			<br><br>
			<input class="butt" type="submit" value="Cadastrar">
		</form>
	</div>
	</div>
<?php	
	require_once "footer.html";
?>