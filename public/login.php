<?php
require_once '../src/db.php';  // Inclua a classe
require_once '../src/hospUsuarios.php';

// Criar uma nova instância da classe Database
$db = new Database();
$resultado ='';

// Conectar ao banco
$conn = $db->connect();

$usuario = new HospUsuarios($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processar o formulário (exemplo)
    // ...

    //echo 'submit';

    $usu = $_POST['usuario'];
    $senha = $_POST['senha'];

        
    if ($usuario->validatePassword($usu,$senha)){
        header("Location: admin.php");
    }else{
        echo 'Erro';
        $resultado = 'Usuário ou Senha inválidos';
    }

    // Redirecionar para a página de sucesso
    //header("Location: sucesso.php");
   // exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo para a imagem de fundo */
        body {
            /*background-image: url('./img/hospital.jpg'); 
            */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        /* Filtro de transparência na imagem */
        .bg-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7); /* Ajuste a transparência */
            z-index: 1;
        }

        /* Estilo para o formulário de login */
        .login-form {
            z-index: 2;
            background-color: rgba(255, 255, 255, 0.8); /* Fundo branco com leve transparência */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .login-form input {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <!-- Overlay da imagem de fundo -->
    <div class="bg-overlay"></div>

    <!-- Formulário de Login -->
    <div class="login-form container col-md-4">
        <h3 class="text-center mb-4">Login</h3>
        <?php
        if($resultado){
            echo '<h5 style="color:red;">' .$resultado. '</h5>';
        }
        ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuário</label>
                <input type="usuario" name="usuario" class="form-control" id="usuario" placeholder="Digite seu usuário">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="senha" name="senha" class="form-control" id="senha" placeholder="Digite sua senha">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
