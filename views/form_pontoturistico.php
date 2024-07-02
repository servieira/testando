<style>
    #img {
        width: 40px; /* Defina a largura desejada */
        height: auto; /* Defina a altura desejada */
    }

	#img {
        width: 40px; /* Defina a largura desejada */
        height: auto; /* Defina a altura desejada */
    }

	.titulo{
		color:DarkViolet;
	}

	#nome{
		width: 910px;
	}
	#descricao{
		width: 910px;
	}
	#numero{
		width: 75px;
	}
	#bairro{
		width: 460px;
	}
	#cep{
		width: 110px;
	}


	.descritivo{
		font-size: 1rem; /* Tamanho da fonte, ajustado para 12px */
		font-weight: 600; /* Negrito suave */
		padding-left:4px;	
		padding:4px;
		width:400px;
	}


	.labels{
		font-size: 1.1rem; /* Tamanho da fonte, ajustado para 12px */
		font-weight: 600; /* Negrito suave */
		padding-left:5px;	
		padding:5px;
		width:400px;	
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
	
	require_once "../models/Conexao.class.php";
	require_once "../models/Pontoturistico.class.php";
	require_once "../models/PontoturisticoDAO.php";
	require_once "../models/Cat_pontoturistico.class.php";
	require_once "../models/Cat_pontoturisticoDAO.php";
	require_once "../models/Cidade.class.php";
	require_once "../models/CidadeDAO.php";
	
	
	$msg = array("","","","","","","","","","","","");
	if($_POST)
	{
		
		$erro = false;
		if(empty($_POST["nome"]))
		
		{
			$msg[0] = "Preencha o Nome.";
			$erro = true;
		}	
		
		if(empty($_POST["descricao"]))
		{
			$msg[1] = "Preencha a Descrição.";
			$erro = true;
		}	
		if(empty($_POST["ingresso"]))
		{
			$msg[2] = "Preencha o Ingresso.";
			$erro = true;
		}	
		
		if(empty($_POST["horarioFuncionamento"]))
		{
			$msg[3] = "Preencha o Horário de funcionamento.";
			$erro = true;
		}

		if(empty($_POST["site"]))
		{
			$msg[4] = "Preencha o site.";
			$erro = true;
		}

		if(empty($_POST["logradouro"]))
		{
			$msg[5] = "Preencha o Logradouro.";
			$erro = true;
		}
		
		if(empty($_POST["numero"]))
		{
			$msg[6] = "Preencha o Número.";
			$erro = true;
		}
		if(empty($_POST["bairro"]))
		{
			$msg[7] = "Preencha o Bairro.";
			$erro = true;
		}
		if(empty($_POST["cep"]))
		{
			$msg[8] = "Preencha o CEP.";
			$erro = true;
		}

		
		if($_POST["cidade"] == "0")
		{
			$msg[9] = "Escolha a Cidade.";
			$erro = true;
		}
		
		if($_POST["catponto"] == "0")
		{
			$msg[10] = "Escolha uma Categoria. ";
			$erro = true;
		}
		if($_FILES["imagem"]["name"] == "")
		{
			$msg[11] = "Escolha uma imagem.";
			$erro = true;
		}
		else
		{
			if($_FILES["imagem"]["type"] !="image/png" && $_FILES["imagem"]["type"] !="image/jpg" && $_FILES["imagem"]["type"] != "image/jpeg" )
			{
				$msg[11] = "Tipo de imagem invalido";
				$erro = true;
			}
		}
		
		
	
		
		
		
		//echo $erro;
		//var_dump($_files);
		
		if(!$erro)
		{	
					
			$Cidade=new Cidade($_POST["cidade"]);
			
			$Cat_pontoturistico=new Cat_pontoturistico($_POST["catponto"]);
			$pontoturistico = new Pontoturistico(0,
			$_POST["nome"],
			$_POST["descricao"],
			$_POST["ingresso"],
			$_POST["horarioFuncionamento"], 
			$_POST["site"], 
			$_POST["logradouro"],
			$_POST["numero"],			
			$_POST["bairro"], 
			$_POST["cep"], 
			"Ativo",
			$Cidade, 			 
			$Cat_pontoturistico,
			$_FILES["imagem"]["name"]
			);
			
			
			$pontoturisticoDAO = new PontoturisticoDAO();
			$pontoturisticoDAO->inserir($pontoturistico);
			header("location:listar_pontoturistico.php");
			die();
		}
		


	}//fim if post

	require_once "header.php";
?>

	<div class="content">
	  <div class="container"><br><br>
		<h1 class="titulo">Cadastro de Ponto Turístico</h1>
		<form class="form-control" action="#" method="POST" enctype="multipart/form-data"><!---->
			
			<div class="mb-3">
				<label class="labels" for="nome" class="form-label">Nome:</label>
				<br>
				<input type="text" class="form-control" id="nome" name="nome" value="<?php echo isset($_POST['nome'])?$_POST['nome']:''?>">
				<div style="color:red"><?php echo $msg[0] != ""?$msg[0]:'';?></div>
			</div>
			<br>
			<div class="mb-3">
				<label class="labels" for="descricao" class="form-label">Descrição:</label><br><br>
				<textarea id="descricao" name="descricao" rows="2" cols="50"></textarea>
				<div style="color:red"><?php echo $msg[1] != ""?$msg[1]:'';?></div>
			</div>
			<div class="mb-3">
				<label class="labels" for="ingresso" class="form-label">Ingresso:</label><br>
				<textarea id="ingresso" name="ingresso" rows="3" cols="50"></textarea>
				<div style="color:red"><?php echo $msg[2] != ""?$msg[2]:'';?></div>
			</div>
			<br>
			
			<div class="mb-3">
				<label class="labels" for="horarioFuncionamento" class="form-label">Horário de Funcionamento:</label><br>
				<textarea id="horarioFuncionamento" name="horarioFuncionamento" rows="7" cols="50"></textarea>
				<div style="color:red"><?php echo $msg[3] != ""?$msg[3]:'';?></div>
			</div>
			<div class="mb-3">
				<label class="labels" for="site" class="form-label">Site:</label>
				<input type="url" class="form-control" id="site" name="site" value="<?php echo isset($_POST['site'])?$_POST['site']:''?>">
				<div style="color:red"><?php echo $msg[4] != ""?$msg[4]:'';?></div>
			</div>
			
			
			
			
			<br>
			<div  class="mb-3">
				<label class="labels" for="logradouro" class="form-label">Logradouro:</label>
				<input type="text" class="form-control" id="logradouro" name="logradouro" value="<?php echo isset($_POST['logradouro'])?$_POST['logradouro']:''?>">
				<div style="color:red"><?php echo $msg[5] != ""?$msg[5]:'';?></div>
			</div>
			<br>
			<div class="mb-3">
				<label class="labels" for="numero" class="form-label">Número:</label>
				<input type="text" class="form-control" id="numero" name="numero" value="<?php echo isset($_POST['numero'])?$_POST['numero']:''?>">
				<div style="color:red"><?php echo $msg[6] != ""?$msg[6]:'';?></div>
			</div>
			<br>
			<div  class="mb-3">
				<label class="labels" for="bairro" class="form-label">Bairro:</label>
				<input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo isset($_POST['bairro'])?$_POST['bairro']:''?>">
				<div style="color:red"><?php echo $msg[7] != ""?$msg[7]:'';?></div>
			</div>
			<br>
			<div  class="mb-3">
				<label class="labels" for="cep" class="form-label">Cep:</label>
				<input type="text" class="form-control" id="cep" name="cep" value="<?php echo isset($_POST['cep'])?$_POST['cep']:''?>">
				<div style="color:red"><?php echo $msg[8] != ""?$msg[8]:'';?></div>
			</div>
			<br>
<!--BUSCAR CAMPO CIDADE NA TABELA CIDADE-->
				
		<div class="mb-3">
					<label class="labels" for="cidade" class="form-label">Cidade:</label><br>
					<select class="descritivo" name="cidade" id="cidade">
						<option value="0">Escolha uma cidade</option>
						<?php
							//buscar as categorias no BD
							$Cidade = new Cidade(situacao:"Ativo");
							$CidadeDAO = new CidadeDAO();
							var_dump ($Cidade);
							$ret = $CidadeDAO->buscar_todas();

							foreach($ret as $dado)
							{
								if(isset($_POST["cidade"]) && $_POST["cidade"] == $dado->id_cidade)
								{
									echo "<option value='{$dado->id_cidade}' selected > {$dado->nome} - {$dado->uf}</option>";
								}
								else
								{							
									echo "<option value='{$dado->id_cidade}'> {$dado->nome} - {$dado->uf}</option>";
								}
							}//fim do foreach
							
						?>
					</select>
				<div style="color:red"><?php echo $msg[9] != ""?$msg[9]:'';?></div>
			</div>

		<div class="mb-3">
					<label class="labels" for="catponto" class="form-label">Categoria:</label><br>
					<select class="descritivo" name="catponto" id="catponto">
						<option value="0">Escolha uma categoria</option>
						<?php
							//buscar as categorias no BD
							$catponto = new Cat_pontoturistico(situacao:"Ativo");
							$catpontoDAO = new Cat_pontoturisticoDAO();
							var_dump ($Descritivo);
							$ret = $catpontoDAO->buscar_todas();

							foreach($ret as $dado)
							{
								if(isset($_POST["descritivo"]) && $_POST["descritivo"] == $dado->id_catPontoTuristico)
								{
									echo "<option value='{$dado->id_catPontoTuristico}' selected > {$dado->descritivo} </option>";
								}
								else
								{							
									echo "<option value='{$dado->id_catPontoTuristico}'> {$dado->descritivo} </option>";
								}
							}//fim do foreach
							
						?>
					</select>
				<div style="color:red"><?php echo $msg[10] != ""?$msg[10]:'';?></div>
			</div>
			
			<br>
			
		


<!--FIM BUSCAR CAMPO CIDADE NA TABELA CIDADE-->
<br><br>





			
			<br><br>


			<div class="mb-3">
				<label class="labels" for="imagem" class="form-label">Imagem:</label>
				
				<input type="file" class="form-control" id="imagem" name="imagem" onchange="mostrar(this)" accept="image/png, image/jpeg">
				<div style="color:red"><?php echo $msg[11] != ""?$msg[11]:'';?></div>
				<br><br>
				<div class="mb-3">
					<img  id="img">
				</div>
			</div>
			<br>
			
			<input class="butt" type="submit" value="Cadastrar">
		</form>
	  </div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script>
		function mostrar(img)
		{
			if(img.files  && img.files[0])
			{
				var reader = new FileReader();
				reader.onload = function(e){
					$('#img')
					.attr('src', e.target.result)
					.width(170)
					.height(100);
				};
				reader.readAsDataURL(img.files[0]);
			}
		}
	</script>




<?php
	require_once "footer.html";
?>