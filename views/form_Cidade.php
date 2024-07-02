<?php
$erro = "";
if ($_POST) {
    if (empty($_POST["nome"])) {
        $erro = "Preencha o nome.";
    } else {
        require_once "../models/Conexao.class.php";
        require_once "../models/Cidade.class.php";
        require_once "../models/CidadeDAO.php";
        
        // Cria um objeto Cidade com os dados do formulário
        $cidade = new Cidade(0, $_POST["nome"],$_POST["uf"], "Ativo", $cidade); // Aqui você deve ajustar de acordo com os atributos da classe Cidade
        
        // Instancia a classe CidadeDAO e insere a cidade
        $cidadeDAO = new CidadeDAO();
        $cidadeDAO->inserir($cidade); // Passando o objeto $cidade ao invés de $Cidade
        
        header("location:listar_cidades.php");
        exit;
    }
}
require_once "header.php";
?>
<div class="content">
    <div class="container"><br><br>
        <h1 class="titulo">Cadastrar nova Cidade</h1>
        <form action="#" method="post"><br>
            <label class="label_descritivo" for="nome">Nome:</label><br>
            <input type="text" name="nome" id="nome">
            <div class="descritivo"><?php echo $erro; ?></div>
            <br><br>
            <label class="label_descritivo" for="nome">UF:</label><br>
            <input type="text" name="uf" id="uf">
            <div class="descritivo"><?php echo $erro; ?></div>
            <br><br>
            <!-- Adicione os campos necessários para UF e outros dados da cidade -->
            <input class="butt" type="submit" value="Cadastrar">
        </form>
    </div>
</div>
<?php
require_once "footer.html";
?>
