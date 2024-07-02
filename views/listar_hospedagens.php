<style>
    .small-image {
        width: 80px; /* Defina a largura desejada */
        height: auto; /* Defina a altura desejada */
        object-fit: cover; /* Mantém a proporção da imagem */
    }
	.texto{
		/*white-space: nowrap;*/
		font-size:0.9rem;
	}
	.no_link{
		max-width: 20px; /* Defina o tamanho máximo da largura da célula */
        white-space: nowrap; /* Impede que o texto quebre para a próxima linha */
        overflow: hidden; /* Oculta o conteúdo que ultrapassa a largura máxima */
        text-overflow: ellipsis; /* Mostra três pontos (...) quando o texto é cortado */
	}
	
	#butt{
		font-weight: 600; /* Negrito suave */
		width: 200px; /* Largura da caixa de texto */
		height: 40px; /* Altura da caixa de texto */
		background-color: rgba(148, 0, 211, 0.1);/*#DCDCDC;*/
		margin-left: 2px;
		border:1;
		border-color:DarkViolet;
		color: DarkViolet;
	}


</style>


<?php
	require_once "header.php";
?>
	<div class="content">
	  <div class="container">
	  <?php
			if(isset($_GET["msg"]))
			{
				echo "<div class='alert alert-success' role='alert'>{$_GET['msg']}</div>";
			}
	 ?>
	  
		<br><br><h1 class="row justify-content-center align-items-center">Hospedagem</h1><br>
		<table class="table table-striped">
			<tr>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Link</th>
				<th>Imagem</th>
				<th>Classif..</th>
				<th>Logradouro</th>
				<th>Nº.</th>
				<th>Bairro</th>
				<th>CEP</th>
				<th>Situação</th>
				<th>Ações</th>
			</tr>
			<?php
				require_once "../models/Conexao.class.php";
				require_once "../models/HospedagemDAO.php";
				$HospedagemDAO = new HospedagemDAO();
				
				$retorno = $HospedagemDAO->buscar_todos();

				if(is_array($retorno) || is_object($retorno)) {
					foreach($retorno as $dados) {
						echo "<tr>
							  <td class='texto'>{$dados->nome}</td>
							  <td class='texto'>{$dados->descricao} </td>
							  <td class='texto'>{$dados->link}</td>
	  						  <td><img src='../img/{$dados->imagem}' class='small-image'></td>
							  <td class='texto'>{$dados->classificacao}</td>
							  <td class='texto'>{$dados->logradouro}</td>
							  <td class='texto'>{$dados->numero}</td>
							  <td class='texto'>{$dados->bairro}</td>
							  <td class='texto'>{$dados->cep}</td>
							  <td class='texto'>{$dados->situacao}</td>
							  <td>
								  <a href='edit_hospedagem.php?id_hospedagem={$dados->id_hospedagem}' id='alterar' class='btn btn-warning'>Alterar</a> &emsp;" ;
								  
									
								
								if($dados->situacao == "Ativo")
								{
									echo "<a href='alterar_situacao_hospedagem.php?id={$dados->id_hospedagem}&situacao=Inativo'class='btn btn-warning'>Inativar</a>";
									// igual o id do banco de dados
								}
								else
								{
									echo "<a href='alterar_situacao_hospedagem.php?id={$dados->id_hospedagem}&situacao=Ativo' class='btn btn-warning'>Ativar</a> " ;
									
								}
								echo"
							  </td>
							 </tr>";
					}
				} else {
					echo "<tr><td colspan='11' class='text-center'>Nenhuma hospedagem encontrada.</td></tr>";
				}
			?>
		</table>
		<br>
		<a id="butt" class="btn btn-success" href="form_hospedagem.php">Nova hospedagem</a>
	</div>
</div>
<?php
	require_once "footer.html";
?>
