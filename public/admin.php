<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Administrativa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar h4 {
            color: #ffffff;
        }
        .sidebar .nav-link {
            color: #ffffff;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            color: #343a40;
        }
        .card {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Cabeçalho -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Administração</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="d-flex">
        <!-- Barra de Menu à Esquerda -->
        <div class="sidebar p-3">
            <h4>Menu</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Usuários</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="reportsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Relatórios
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="reportsDropdown">
                        <li><a class="dropdown-item" href="#">Relatório Mensal</a></li>
                        <li><a class="dropdown-item" href="#">Relatório Anual</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Exportar Dados</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sair</a>
                </li>
            </ul>
        </div>

        <!-- Conteúdo Principal -->
        <div class="content flex-grow-1" style="display: none;">
            <div class="container">
                <h2>Bem-vindo ao Painel Administrativo</h2>
                <p>Esta é a área de administração onde você pode gerenciar as configurações e dados do sistema.</p>

                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Visão Geral</h5>
                        <p class="card-text">Aqui você pode encontrar informações importantes sobre o desempenho e uso do sistema.</p>
                        <a href="#" class="btn btn-primary">Saiba Mais</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Conteúdo Principal -->
        <div class="content flex-grow-1">
            <div class="container">
                <h2>Bem-vindo ao Painel Administrativo2</h2>
                <p>Esta é a área de administração onde você pode gerenciar as configurações e dados do sistema.</p>

                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Visão Geral</h5>
                        <p class="card-text">Aqui você pode encontrar informações importantes sobre o desempenho e uso do sistema.</p>
                        <a href="#" class="btn btn-primary">Saiba Mais</a>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
