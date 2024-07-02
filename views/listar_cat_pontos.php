<style>
	#butt{
		font-weight: 600; /* Negrito suave */
		width: 300px; /* Largura da caixa de texto */
		height: 40px; /* Altura da caixa de texto */
		background-color: rgba(148, 0, 211, 0.1);/*#DCDCDC;*/
		margin-left: 2px;
		border:1;
		border-color:DarkViolet;
		color: DarkViolet;
	}
</style>

<?php
    require_once "../models/Conexao.class.php";
    require_once "../models/Cat_pontoturisticoDAO.php";
    $cat_pontoDAO = new Cat_pontoturisticoDAO();
    $retorno = $cat_pontoDAO->buscar_todas();
    require_once "header.php";
    
?>

<div class="content">
	<div class="container">
		<br><br><h1>Lista de Categorias de Pontos Turísticos</h1><br>
		<table class="table table-striped">
			<tr>				
				<th>Categoria</th>
				<th>Situação</th>
				<th>Ações</th>
			</tr>
			<?php
				
				foreach($retorno as $dado)
				{
					echo "<tr>
							
							<td>{$dado->descritivo}</td>
							<td>{$dado->situacao}</td>
							<td>
								<a href='editar_cat_pontoturistico.php?id={$dado->id_catPontoTuristico}' class='btn btn-warning'>Alterar</a>
								
								&nbsp;&nbsp;";
								
								
								if($dado->situacao == "Ativo")
								{
									echo "<a href='alterar_situacao_cat_ponto.php?id={$dado->id_catPontoTuristico}&situacao=Inativo'class='btn btn-warning'>Inativar</a>";
								}
								else
								{
									echo "<a href='alterar_situacao_cat_ponto.php?id={$dado->id_catPontoTuristico}&situacao=Ativo' class='btn btn-warning'>Ativar</a>";
								}
						echo "</td>
						  </tr>";
				}//fim do foreach
			?>
		</table>
		<br><a href="form_Cat_pontoturistico.php" id="butt"  class="btn btn-success">Nova Categoria de Ponto Turístico</a>
	</div>
</div>
<?php
	require_once "footer.html";
?>