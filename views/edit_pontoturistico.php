

<?php
	header('Content-Type: text/html; charset=utf-8');
	require_once "../models/Conexao.class.php";
	require_once "../models/Pontoturistico.class.php";
	require_once "../models/PontoturisticoDAO.php";
	require_once "../models/Cat_pontoturistico.class.php";
	require_once "../models/Cat_pontoturisticoDAO.php";
	require_once "../models/Cidade.class.php";
	require_once "../models/CidadeDAO.php";
	
	if($_GET)
	{
		$pontoturistico = new Pontoturistico($_GET["id_pontoTuristico"]);
		$pontoturisticoDAO = new PontoturisticoDAO();
		$ret = $pontoturisticoDAO->buscar_um_Pontoturistico($pontoturistico);
	}		

	$msg = array("","","","","","","","","","");
	if($_POST)
	{
		$erro = false;
		if(empty($_POST["nome"]))
		{
			$msg[0] = "Preencha o nome do Ponto Turístico";
			$erro = true;
		}
		
		if(empty($_POST["descricao"]))
		{
			$msg[1] = "Preencha a descrição do Ponto Turístico";
			$erro = true;
		}
		
		if(empty($_POST["ingresso"]))
		{
			$msg[2] = "Preencha o Ingresso do Ponto Turístico";
			$erro = true;
		}
		if(empty($_POST["horarioFuncionamento"]))
		{
			$msg[3] = "Preencha o Horário de Funcionamento do Ponto Turístico";
			$erro = true;
		}

		if(empty($_POST["logradouro"]))
		{
			$msg[4] = "Preencha o logradouro do Ponto Turístico";
			$erro = true;
		}

		if(empty($_POST["numero"]))
		{
			$msg[5] = "Preencha o numero do Ponto Turístico";
			$erro = true;
		}

		if(empty($_POST["bairro"]))
		{
			$msg[6] = "Preencha o bairro do Ponto Turístico";
			$erro = true;
		}

		if(empty($_POST["cep"]))
		{
			$msg[7] = "Preencha o cep do Ponto Turístico";
			$erro = true;
		}
		$imagem = $_POST["img_bd"];
		
		if($_FILES["imagem"]["name"] != "")

		
		{
			$imagem = $_FILES["imagem"]["name"];
			if($_FILES["imagem"]["type"] != "image/png" && $_FILES["imagem"]["type"] != "image/jpg" && 
			$_FILES["imagem"]["type"] != "image/jpeg")
			{
				$msg[8] = "Tipo de imagem invalido";
				$erro = true;
			}
		}		

		if(empty($_POST["site"]))
		{
			$msg[9] = "Preencha o Site";
			$erro = true;
		}
		
		
		if(!$erro)
		{
			//inserir no BD
			$Cidade=new cidade($_POST["cidade"]);
			$Cat_pontoturistico=new Cat_pontoturistico($_POST["categoria"]);
			
			$pontoturistico = new Pontoturistico($_POST["id_pontoturistico"], 
			$_POST["nome"],
			$_POST["descricao"],
			$_POST["ingresso"],
			 $_POST["horarioFuncionamento"], 
			 $_POST["site"], 
			 $_POST["logradouro"],
			 $_POST["numero"],
			 $_POST["bairro"],
			 $_POST["cep"],
			 "",			  
			  $Cidade, 
			  $Cat_pontoturistico,
			  $imagem);

			  
			
			$pontoturisticoDAO = new PontoturisticoDAO();
			
			$pontoturisticoDAO->alterar($pontoturistico);
			
			header("location:listar_pontoturistico.php");
			die();

			


			
		}

	}//fim if post
	
	require_once "header.php";
?>
	<div class="content">
	  <div class="container">
		<h1>pontoturistico</h1>
		<form class="form-control" action="#" method="POST" enctype="multipart/form-data">
		
		<input type="hidden" name="id_pontoturistico" value="<?php echo $ret[0]->id_pontoTuristico;?>">
		
			<div class="mb-3">
				<label for="nome" class="form-label">Nome:</label>
				
				<input type="text"  id="nome" name="nome" value="<?php echo isset($_POST['nome'])?$_POST['nome']:$ret[0]->nome?>">
				
				
				<div style="color:red"><?php echo $msg[0] != ""?$msg[0]:'';?></div>
			</div>

			<br><br>

			<div class="mb-3">
				<label for="descricao" class="form-label">Descricao:</label><br>
				<textarea name="descricao" id="descricao"><?php echo isset($_POST['descricao'])?$_POST['descricao']:$ret[0]->descricao?></textarea>
				<div style="color:red"><?php echo $msg[1] != ""?$msg[1]:'';?></div>
			</div>
			<div class="mb-3">
				<label for="ingresso" class="form-label">Ingresso:</label><br>
				<textarea name="ingresso" id="ingresso"><?php echo isset($_POST['ingresso'])?$_POST['ingresso']:$ret[0]->ingresso?></textarea>
				<div style="color:red"><?php echo $msg[2] != ""?$msg[2]:'';?></div>
			</div>

			<br><br>

			<div class="mb-3">
				<label for="horarioFuncionamento" class="form-label">Horário de Funcionamento:</label>
				<input type="text" class="form-control" id="horarioFuncionamento" name="horarioFuncionamento" value="<?php echo isset($_POST['horarioFuncionamento'])?$_POST['horarioFuncionamento']:$ret[0]->horarioFuncionamento?>">
				<div style="color:red"><?php echo $msg[3] != ""?$msg[3]:'';?></div>
			</div>
			

			<br><br>
			<div class="mb-3">
				<label for="site" class="form-label">Site:</label>
				<input type="text" class="form-control" id="site" name="site" value="<?php echo isset($_POST['site'])?$_POST['site']:$ret[0]->site?>">
				<div style="color:red"><?php echo $msg[9] != ""?$msg[9]:'';?></div>
			</div>
			<br><br>
			<div class="mb-3">
				<label for="cidade" class="form-label">Cidade:</label>
				<select name="cidade" id="cidade">
					
					<?php
						//buscar categorias BD
						
				$cidade = new Cidade(situacao:"Ativo");
						
				$cidadeDAO = new CidadeDAO();
						
				$retorno = $cidadeDAO->buscar_cidades_ativas($cidade);
				
	
				foreach($retorno as $dado)
				{
					if($ret[0]->id_cidade == $dado->id_cidade)
					{
						echo "<option value='{$dado->id_cidade}' selected>{$dado->nome} - {$dado->uf}</option>";
					}
					else
					{
						echo "<option value='{$dado->id_cidade}'>{$dado->nome} - {$dado->uf}</option>";
					}
				}//fim do foreach
						
					?>
				</select>
				
			</div>
			<br><br>
			<div class="mb-3">
				<label for="logradouro" class="form-label">Logradouro:</label>
				<input type="text" class="form-control" id="logradouro" name="logradouro" value="<?php echo isset($_POST['logradouro'])?$_POST['logradouro']:$ret[0]->logradouro?>">
				<div style="color:red"><?php echo $msg[4] != ""?$msg[4]:'';?></div>
			</div>

			<br><br>
			<div class="mb-3">
				<label for="numero" class="form-label">Número:</label>
				<input type="text" class="form-control" id="numero" name="numero" value="<?php echo isset($_POST['numero'])?$_POST['numero']:$ret[0]->numero?>">
				<div style="color:red"><?php echo $msg[5] != ""?$msg[5]:'';?></div>
			</div>

			<br><br>

			<div class="mb-3">
				<label for="bairro" class="form-label">Bairro:</label>
				<input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo isset($_POST['bairro'])?$_POST['bairro']:$ret[0]->bairro?>">
				<div style="color:red"><?php echo $msg[6] != ""?$msg[6]:'';?></div>
			</div>

			<br><br>
			<div class="mb-3">
				<label for="cep" class="form-label">CEP:</label>
				<input type="text" class="form-control" id="cep" name="cep" value="<?php echo isset($_POST['cep'])?$_POST['cep']:$ret[0]->cep?>">
				<div style="color:red"><?php echo $msg[7] != ""?$msg[7]:'';?></div>
			</div>

			<br><br>
			

			
			
			<div class="mb-3">
				<label for="categoria" class="form-label">Categoria:</label>
				<select name="categoria" id="categoria">
					
					<?php
						//buscar categorias BD
						
				$categoria = new Cat_pontoturistico(situacao:"Ativo");
						
				$categoriaDAO = new Cat_pontoturisticoDAO();
						
				$retorno = $categoriaDAO->buscar_categorias_ativas($categoria);
			
				foreach($retorno as $dado)
				{
					if($ret[0]->id_catPontoTuristico == $dado->id_catPontoTuristico)
					{
						echo "<option value='{$dado->id_catPontoTuristico}' selected>{$dado->descritivo}</option>";
					}
					else
					{
						echo "<option value='{$dado->id_catPontoTuristico}'>{$dado->descritivo}</option>";
					}
				}//fim do foreach
						
					?>
				</select>
			
			</div>
			<br><br>
			<div class="mb-3">
				<label for="imagem" class="form-label">Imagem:</label>
				<input type="file" class="form-control" id="imagem" name="imagem" onchange="mostrar(this)" accept="image/png, image/jpeg">
				<div style="color:red"><?php echo $msg[8] != ""?$msg[8]:'';?></div>
			</div>
			<input type="hidden" name="img_bd" value="<?php echo $ret[0]->imagem ?>">
			<br><br>
			<div class="mb-3">
				<img src="../img/<?php echo $ret[0]->imagem?>" id="img" style="width:170px;height:100px;">
			</div>
			
			<br><br>
			<input class="btn btn-primary" type="submit" value="Alterar">
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
</style>