

<?php
	require_once "../models/Conexao.class.php";
	require_once "../models/alimentacao.class.php";
	require_once "../models/alimentacaoDAO.php";
	require_once "../models/Cat_alimentacao.class.php";
	require_once "../models/Cat_alimentacaoDAO.php";
	require_once "../models/Cidade.class.php";
	require_once "../models/CidadeDAO.php";
	
	if($_GET)
	{
		$alimentacao = new alimentacao($_GET["id_alimentacao"]);
		$alimentacaoDAO = new alimentacaoDAO();
		$ret = $alimentacaoDAO->buscar_uma_alimentacao($alimentacao);
	}		

	$msg = array("","","","","","","","","","","");
	if($_POST)
	{
		$erro = false;
		if(empty($_POST["nome"]))
		{
			$msg[0] = "Preencha o nome da alimentacao";
			$erro = true;
		}
		
		if(empty($_POST["telefone"]))
		{
			$msg[1] = "Preencha a descrição da alimentacao";
			$erro = true;
		}
		
		if(empty($_POST["email"]))
		{
			$msg[2] = "Preencha o email da alimentacao";
			$erro = true;
		}
		if(empty($_POST["link"]))
		{
			$msg[3] = "Preencha o link da alimentacao";
			$erro = true;
		}
		if(empty($_POST["descricao"]))
		{
			$msg[4] = "Preencha o descricao da alimentacao";
			$erro = true;
		}
				
		$imagem = $_POST["img_bd"];
		
		if($_FILES["imagem"]["name"] != "")

		
		{
			$imagem = $_FILES["imagem"]["name"];
			if($_FILES["imagem"]["type"] != "image/png" && $_FILES["imagem"]["type"] != "image/jpg" && 
			$_FILES["imagem"]["type"] != "image/jpeg")
			{
				$msg[5] = "Tipo de imagem invalido";
				$erro = true;
			}
		}		

		

		if(empty($_POST["logradouro"]))
		{
			$msg[6] = "Preencha o logradouro da alimentacao";
			$erro = true;
		}

		if(empty($_POST["numero"]))
		{
			$msg[7] = "Preencha o numero da alimentacao";
			$erro = true;
		}

		if(empty($_POST["bairro"]))
		{
			$msg[8] = "Preencha o bairro da alimentacao";
			$erro = true;
		}

		if(empty($_POST["cep"]))
		{
			$msg[9] = "Preencha o cep da alimentacao";
			$erro = true;
		}

		
		
		if(!$erro)
		{
			//inserir no BD
			$Cidade=new cidade($_POST["cidade"]);
			$Cat_alimentacao=new Cat_alimentacao($_POST["categoria"]);
			
			$alimentacao = new Alimentacao($_POST["id_alimentacao"],
			$_POST["nome"], 
			$_POST["telefone"],
			$_POST["email"],
			$_POST["link"],
			$_POST["descricao"], 
			$imagem, 
			$_POST["logradouro"], 
			$_POST["numero"],
			$_POST["bairro"], 
			$_POST["cep"], 
			"" ,
				 $Cidade, 
				 $Cat_alimentacao);

			
				
			
			$alimentacaoDAO = new AlimentacaoDAO();
			
			$alimentacaoDAO->alterar($alimentacao);
			
			header("location:listar_alimentacoes.php");
			die();
			
		}

	}//fim if post
	
	require_once "header.php";
?>
	<div class="content">
	  <div class="container">
		<h1>alimentacao</h1>
		<form class="form-control" action="#" method="POST" enctype="multipart/form-data">
		
		<input type="hidden" name="id_alimentacao" value="<?php echo $ret[0]->id_alimentacao;?>">
		
			<div class="mb-3">
				<label for="nome" class="form-label">Nome</label>
				
				<input type="text"  id="nome" name="nome" value="<?php echo isset($_POST['nome'])?$_POST['nome']:$ret[0]->nome?>">
				
				
				<div style="color:red"><?php echo $msg[0] != ""?$msg[0]:'';?></div>
			</div>

			<br><br>

			<div class="mb-3">
				<label for="telefone" class="form-label">telefone</label><br>
				<textarea name="telefone" id="telefone"><?php echo isset($_POST['telefone'])?$_POST['telefone']:$ret[0]->telefone?></textarea>
				<div style="color:red"><?php echo $msg[1] != ""?$msg[1]:'';?></div>
			</div>
			<div class="mb-3">
				<label for="descricao" class="form-label">email</label><br>
				<textarea name="email" id="email"><?php echo isset($_POST['email'])?$_POST['email']:$ret[0]->email?></textarea>
				<div style="color:red"><?php echo $msg[2] != ""?$msg[2]:'';?></div>
			</div>

			<br><br>

			<div class="mb-3">
				<label for="link" class="form-label">Link</label>
				<input type="text" class="form-control" id="link" name="link" value="<?php echo isset($_POST['link'])?$_POST['link']:$ret[0]->link?>">
				<div style="color:red"><?php echo $msg[2] != ""?$msg[2]:'';?></div>
			</div>

			<br><br>

			

			<div class="mb-3">
				<label for="classificacao" class="form-label">Descricao</label>
				<input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo isset($_POST['descricao'])?$_POST['descricao']:$ret[0]->descricao?>">
				<div style="color:red"><?php echo $msg[3] != ""?$msg[3]:'';?></div>
			</div>
			

			<br><br>
			<div class="mb-3">
				<label for="cidade" class="form-label">Cidade</label>
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
				<label for="logradouro" class="form-label">Logradouro</label>
				<input type="text" class="form-control" id="logradouro" name="logradouro" value="<?php echo isset($_POST['logradouro'])?$_POST['logradouro']:$ret[0]->logradouro?>">
				<div style="color:red"><?php echo $msg[5] != ""?$msg[5]:'';?></div>
			</div>

			<br><br>
			<div class="mb-3">
				<label for="numero" class="form-label">Número</label>
				<input type="text" class="form-control" id="numero" name="numero" value="<?php echo isset($_POST['numero'])?$_POST['numero']:$ret[0]->numero?>">
				<div style="color:red"><?php echo $msg[6] != ""?$msg[6]:'';?></div>
			</div>

			<br><br>

			<div class="mb-3">
				<label for="bairro" class="form-label">Bairro</label>
				<input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo isset($_POST['bairro'])?$_POST['bairro']:$ret[0]->bairro?>">
				<div style="color:red"><?php echo $msg[7] != ""?$msg[7]:'';?></div>
			</div>

			<br><br>
			<div class="mb-3">
				<label for="cep" class="form-label">CEP</label>
				<input type="text" class="form-control" id="cep" name="cep" value="<?php echo isset($_POST['cep'])?$_POST['cep']:$ret[0]->cep?>">
				<div style="color:red"><?php echo $msg[8] != ""?$msg[8]:'';?></div>
			</div>

			<br><br>
			

			
			
			<div class="mb-3">
				<label for="categoria" class="form-label">Categoria</label>
				<select name="categoria" id="categoria">
					
					<?php
						//buscar categorias BD
						
				$categoria = new Cat_alimentacao(situacao:"Ativo");
						
				$categoriaDAO = new Cat_alimentacaoDAO();
						
				$retorno = $categoriaDAO->buscar_categorias_ativas($categoria);
				var_dump($retorno);
	
				foreach($retorno as $dado)
				{
					if($ret[0]->id_catAlimentacao == $dado->id_catAlimentacao)
					{
						echo "<option value='{$dado->id_catAlimentacao}' selected>{$dado->descritivo}</option>";
					}
					else
					{
						echo "<option value='{$dado->id_catAlimentacao}'>{$dado->descritivo}</option>";
					}
				}//fim do foreach
						
					?>
				</select>
			
			</div>
			<br><br>
			<div class="mb-3">
				<label for="imagem" class="form-label">Imagem:</label>
				
				<input type="file" class="form-control" id="imagem" name="imagem" onchange="mostrar(this)" accept="image/png, image/jpeg">
				<div style="color:red"><?php echo $msg[10] != ""?$msg[10]:'';?></div>
				<br><br>
				<div class="mb-3">
					<img src="../img/<?php echo $ret[0]->imagem?>" id="img" style="width:170px;height:100px;">
				</div>
			</div>
			<br>
			
			<input type="hidden" name="img_bd" value="<?php echo $ret[0]->imagem ?>">
			<br><br>
			
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