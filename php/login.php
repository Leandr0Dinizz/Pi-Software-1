<?php
    include('../class/Usuario.php');
    
    $Usuario = new Usuario();
        
    if(isset($_POST['btnLogar'])){
        $Usuario->logar($_POST['Login'], $_POST['Senha']);
    }

    session_start();
    if (isset($_SESSION['error'])) {
        echo "<script>alert('" . $_SESSION['error'] . "');</script>";
        unset($_SESSION['error']);
    }


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Tela de Login</title>
</head>
<body>
    <div class="container">
        <form>
            <h1>Login</h1>

            <div class="input-email">
                <input type="text" placeholder="login" required>
            </div>

            <div class="input-email">
                <input type="password" placeholder="senha" required>
            </div>

            <button type="submit" class="botao" href="../php/index.php">Entrar</button>

            <div class="registro">
                <p>Não está cadastrado? <a href="../php/cadastro.php">Cadastrar</a></p>
            </div>

        </form>
    </div>
    
</body>
</html>