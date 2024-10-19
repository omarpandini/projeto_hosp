<?php
require_once 'db.php';
require_once 'hospPerguntas.php';

header('Content-Type: application/json; charset=utf-8'); // Define o cabeçalho correto

try {
    $db = new Database();
        
    // Conectar ao banco
    $conn = $db->connect();

    $hospPerguntas = new HospPerguntas($conn);

    // Obtém o parâmetro de filtro, se houver
    $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '';

    // Retornar todos as perguntas em formato JSON, filtrando se necessário 
    echo $hospPerguntas->getAllAsJson($filtro); // Passa o filtro para o método

} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]); // Retorna erro em JSON
}
?>
