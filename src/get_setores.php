<?php
require_once 'db.php';
require_once 'hospSetor.php';

header('Content-Type: application/json; charset=utf-8'); // Define o cabeçalho correto

try {
    $db = new Database();
        
    // Conectar ao banco
    $conn = $db->connect();

    $hospSetor = new HospSetor($conn);

    // Obtém o parâmetro de filtro, se houver
    $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '';

    // Retornar todos os setores em formato JSON, filtrando se necessário
    echo $hospSetor->getAllAsJson(); // Passa o filtro para o método

} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]); // Retorna erro em JSON
}
?>
