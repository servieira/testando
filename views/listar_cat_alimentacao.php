<style>
	#butt{
		font-weight: 600; /* Negrito suave */
		width: 260px; /* Largura da caixa de texto */
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
    require_once "../models/Cat_alimentacaoDAO.php";
    $Cat_alimentacaoDAO = new Cat_alimentacaoDAO();
    $retorno = $Cat_alimentacaoDAO->buscar_todas();
    require_once "header.php";
    
?>

<div class="content">
	<div class="container">
		<br><br><h1>Lista de Categorias de alimentação</h1><br>
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
								<a href='editar_cat_alimentacao.php?id={$dado->id_catAlimentacao}' class='btn btn-warning'>Alterar</a>
								
								&nbsp;&nbsp;";
								
								
								if($dado->situacao == "Ativo")
								{
									echo "<a href='alterar_situacao_cat_alimentacao.php?id={$dado->id_catAlimentacao}&situacao=Inativo'class='btn btn-warning'>Inativar</a>";
									// igual o id do banco de dados
								}
								else
								{
									echo "<a href='alterar_situacao_cat_alimentacao.php?id={$dado->id_catAlimentacao}&situacao=Ativo' class='btn btn-warning'>Ativar</a>";
								}
						echo "</td>
						  </tr>";
				}//fim do foreach
			?>
		</table>
		<br><a href="form_Cat_alimentacao.php" id="butt"  class="btn btn-success">Nova Categoria de Alimentação</a>
	</div>
</div>
<?php
	require_once "footer.html";
?>