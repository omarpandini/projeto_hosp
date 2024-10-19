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
    $idStatus = isset($_GET['idStatus']) ? $_GET['idStatus'] : null;

    // Retornar todos as perguntas em formato JSON, filtrando se necessário 
    echo $hospPerguntas->getAllAsJson($idStatus ); // Passa o filtro para o método

} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]); // Retorna erro em JSON
}
?>
