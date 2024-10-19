<?php
session_start();
require_once '../src/db.php';  // Inclua a classe
require_once '../src/hospPerguntas.php';
require_once '../src/hospDispositivo.php';

// Criar uma nova instância da classe Database
$db = new Database();

// Conectar ao banco
$conn = $db->connect();

$dispositivo = new HospDispositivo($conn);

$arrayDispositovos = $dispositivo->listAll('A');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questionário</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>



    <div class="container mt-5">

        <select id="idDispositivo" class="form-select form-select-lg mb-3" style="width: 300px;" aria-label=".form-select-lg example">
            <?php
            if (!isset($_SESSION['idDispositivo'])) {
            ?>
            <option value="" selected>Selecione o dispositivo</option>
            <?php } ?>
            <?php            
            foreach ($arrayDispositovos as $dispositivo) {
                if ($_SESSION['idDispositivo'] == $dispositivo["id_dispositivo"] ) {
                    # code...
                    echo '<option  selected value='. $dispositivo["id_dispositivo"]   .'> '. $dispositivo["nome_dispositivo"] .' </option>';
                }else {
                    # code...
                    echo '<option value='. $dispositivo["id_dispositivo"]   .'> '. $dispositivo["nome_dispositivo"] .' </option>';
                }
            }
            ?>
           
        </select>

        <h1 style="text-align: center;">Questionário de Satisfação</h1>
        <hr>
        <form id="questionario">
            <div class="form-group">
                <div class="alert alert-primary" role="alert">
                    <span id="dsPergunta" style="font-size: 30px;"></span>
                </div>

            </div>
        </form>

        <div id="divErro"></div>
        <input style="display: none;" type="text" id="idPergunta">
        <input style="display: none;" type="text" id="idNota">

        <div class="mt-4">
            <h4>Avalie de 0 a 10:</h4>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-0">0</button>
                <button type="button" class="btn btn-1">1</button>
                <button type="button" class="btn btn-2">2</button>
                <button type="button" class="btn btn-3">3</button>
                <button type="button" class="btn btn-4">4</button>
                <button type="button" class="btn btn-5">5</button>
                <button type="button" class="btn btn-6">6</button>
                <button type="button" class="btn btn-7">7</button>
                <button type="button" class="btn btn-8">8</button>
                <button type="button" class="btn btn-9">9</button>
                <button type="button" class="btn btn-10">10</button>
            </div>
        </div>

        <div id="divFeedback" style="margin-top: 20px;display: none;">
            <textarea class="form-control" id="dsFeedback" rows="5" placeholder="Digite seu comentário aqui..."></textarea>
        </div>

        <div style="margin-top: 20px;" class="d-flex">
            <button type="button" id="btnProx" class="btn btn-primary">Próximo</button>
        </div>

        <!-- Rodapé fixo -->
        <footer class="bg-dark text-white text-center py-3 fixed-bottom">
            <p class="mb-0">Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.</p>
        </footer>

    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>



</body>

</html>