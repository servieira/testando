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
header('Content-Type: text/html; charset=utf-8');
require_once "../models/Conexao.class.php";
require_once "../models/PontoturisticoDAO.php"; // Inclua o arquivo que contém a definição da classe pontoturisticoDAO

// Inicialize a variável $pontoturisticoDAO corretamente
$pontoturisticoDAO = new PontoturisticoDAO();

	
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
	  
		<br><br><h1 class="row justify-content-center align-items-center">Pontos Turísticos</h1><br>
		<table class="table table-striped">
			<tr>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Imagem</th>
				<th>Ingresso</th>
				<th>Hor. func</th>
				<th>Site</th>
				<th>Logradouro</th>				
				<th>Nº.</th>
				<th>Bairro</th>
				<th>CEP</th>
				<th>Situação</th>
				<th>Ações</th>
			</tr>
			<?php
				require_once "../models/Conexao.class.php";
				require_once "../models/PontoturisticoDAO.php";
				$pontoturisticoDAO = new PontoturisticoDAO();
				
				
				$retorno = $pontoturisticoDAO->buscar_todos();

				if(is_array($retorno) || is_object($retorno)) {
					foreach($retorno as $dados) {
						//$preco=number_format($dados->ingresso,2,",",".");
						echo "<tr>
							  <td class='texto'>{$dados->nome}</td>
							  <td class='texto'>{$dados->descricao} </td>
							  <td><img src='../img/{$dados->imagem}' class='small-image'></td>
							  <td class='texto'>{$dados->ingresso} </td>							  
							  <td class='texto'>{$dados->horarioFuncionamento}</td>
							  <td class='texto'>{$dados->site}</td>
							  <td class='texto'>{$dados->logradouro}</td>
							  <td class='texto'>{$dados->numero}</td>
							  <td class='texto'>{$dados->bairro}</td>	
							  <td class='texto'>{$dados->cep}</td>
							  


							  
							  <td class='texto'>{$dados->situacao}</td>


							  <td>
								  <a href='edit_pontoturistico.php?id_pontoTuristico={$dados->id_pontoTuristico}' id='alterar' class='btn btn-warning'>Alterar</a>&ensp;&ensp;" ;
								  
									
								
								if($dados->situacao == "Ativo")
								{
									echo "<a href='alterar_situacao_pontoTuristico.php?id={$dados->id_pontoTuristico}&situacao=Inativo'class='btn btn-warning'>Inativar</a>";
									// igual o id do banco de dados
								}
								else
								{
									echo "<a href='alterar_situacao_pontoTuristico.php?id={$dados->id_pontoTuristico}&situacao=Ativo' class='btn btn-warning'>Ativar</a>";
						
								}
								echo"
							  </td>
							 </tr>";
					}
				} else {
					echo "<tr><td colspan='11' class='text-center'>Nenhum Ponto Turístico encontrado.</td></tr>";
				}
			?>
		</table>
		<br>
		<a id="butt" class="btn btn-success" href="form_pontoturistico.php">Novo Ponto Turístico</a>
	</div>
</div>
<?php
	require_once "footer.html";
?>
