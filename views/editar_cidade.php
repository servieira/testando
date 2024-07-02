<?php
require_once "../models/Conexao.class.php";
require_once "../models/Cidade.class.php";
require_once "../models/CidadeDAO.php";

if ($_GET && isset($_GET['id_cidade'])) {
    $cidadeDAO = new CidadeDAO();
    $cidade = new Cidade($_GET['id_cidade']);
    $ret = $cidadeDAO->buscar_uma_cidade($cidade);
}

// Verificação se $ret está definido para evitar erros de índice em acesso direto
$msg = array("", "");
if ($_POST) {
    $erro = false;
    if (empty($_POST["nome"])) {
        $msg[0] = "Preencha o nome ";
        $erro = true;
    }
    
    if (empty($_POST["uf"])) {
        $msg[1] = "Preencha a UF (Estado)";
        $erro = true;
    }
    
    if (!$erro) {
        // Aqui você deve processar os dados do formulário para atualização no banco de dados
        $cidade = new Cidade($_POST["id_cidade"], $_POST["nome"], $_POST["uf"]);
        $cidadeDAO = new CidadeDAO();
        $cidadeDAO->alterar($cidade);
        
        header("location:listar_cidades.php");
        exit();
    }
}

require_once "header.php";
?>

<div class="content">
    <div class="container"><br><br>
        <h1>Editar Cidade</h1>
        <form class="form-control" action="#" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_cidade" value="<?php echo isset($ret[0]->id_cidade) ? $ret[0]->id_cidade : ''; ?>">
            
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label><br>
                <input type="text" id="nome" name="nome" value="<?php echo isset($_POST['nome']) ? $_POST['nome'] : (isset($ret[0]->nome) ? $ret[0]->nome : ''); ?>">
                <div style="color:red"><?php echo $msg[0] != "" ? $msg[0] : ''; ?></div>
            </div>
            
            <div class="mb-3">
                <label for="uf" class="form-label">UF:</label><br>
                <input type="text" id="uf" name="uf" value="<?php echo isset($_POST['uf']) ? $_POST['uf'] : (isset($ret[0]->uf) ? $ret[0]->uf : ''); ?>">
                <div style="color:red"><?php echo $msg[1] != "" ? $msg[1] : ''; ?></div>
            </div>
            
            <br><br>
            <input class="btn btn-primary" type="submit" value="Alterar">
        </form>
    </div>
</div>

<?php
require_once "footer.html";
?>
