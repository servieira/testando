

<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
?>
<!-- header.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
   <style>

        h1{
            margin-top:-22px;
        }
        .home_entrar{
            margin-top:-22px;
        }

        header {
            background-color: #870DD9;
            color: white;
            padding: 30px 0;
        }
        .header-container {
            max-width: 1200px;
            max-height: 20px;
            margin: 0 auto;
            padding: 0 30px;
        }
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            gap: 1px;
            
            
        }
        .header-nav a {
            color: white;
            margin:12px;
            text-decoration: none;
        }
        .header-nav a:hover {
            text-decoration: underline;
            text-decoration: none;
            font-weight: 600; /* Negrito suave */
            
        }

        /* M E N U - 2 */
        
         

        .nav-menu2 {
            
            color:#870DD9;
            list-style: none;
            text-decoration:none;
            padding: 7px;
            font-size: 0.95rem;
            font-weight: bold;
            margin: 0 10px 0 0;
            /*word-spacing: 10px;*/
        }
        
        .logo{
            width: 130px;
            height:60px;
            margin-top:-35px;
        }
        
        
        
            

        
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="header-content">
            <img class="logo" src="../img/logo.svg" alt="Descrição da Imagem" style="max-width: 100%; height: auto;">
                <h1>D I A M O N D - T U R I S M O</h1>
                <nav class="header-nav">
                    <ul>
                        <li><a href="index.php">Home</a></li>  
                        <?php
                        if(!isset($_SESSION["tipo"]))
                        {
                            echo "<li ><a href='login.php'>Entrar</a></li>";   
                        }
                        else
                        {
                            echo "<li><a href='logout.php'>Sair</a></li>"; 
                        }
                        ?>                     
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <?php

    header('Content-Type: text/html; charset=utf-8');
        if(isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "ADMINISTRADOR")
        {
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="contraine-fluid">
        <ul class="navbar-nav">     
        <li class="nav-item">
            <a class="nav-menu2" href="listar_cidades.php">Cidades</a>
            </li>   
            <li class="nav-item">
            <a class="nav-menu2" href="listar_cat_pontos.php">Categ. Pontos Turísticos</a>
            </li>
            <li class="nav-item">
            <a class="nav-menu2" href="listar_cat_alimentacao.php">Categ. Alimentação</a>
            </li>
            <li class="nav-item">
            <a class="nav-menu2" href="listar_cat_hospedagem.php">Categ. Hospedagem</a>
            </li>
            <li class="nav-item">
            <a class="nav-menu2" href="listar_hospedagens.php">Hospedagem</a>
            </li>
            <li class="nav-item">
            <a class="nav-menu2" href="listar_alimentacoes.php">Alimentação</a>
            </li>
            <li class="nav-item">
            <a class="nav-menu2" href="listar_pontoturistico.php">Pontos Turísticos</a>
            </li>        
        </ul>
    </div>  
</nav>
<?php
        }
?>





