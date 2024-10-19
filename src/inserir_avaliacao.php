<?php
require_once 'db.php';
require_once 'hospAvaliacao.php';
// Conexão com o banco de dados

$password = 'senha';

try {

    $db = new Database();
        
    // Conectar ao banco
    $conn = $db->connect();

} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Erro de conexão: ' . $e->getMessage()]);
    exit();
}

// Verificar se os dados foram enviados via POST (AJAX)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Receber dados enviados via AJAX
    $id_setor = isset($_POST['id_setor']) ? intval($_POST['id_setor']) : null;
    $id_pergunta = isset($_POST['id_pergunta']) ? intval($_POST['id_pergunta']) : null;
    $id_dispositivo = isset($_POST['id_dispositivo']) ? intval($_POST['id_dispositivo']) : null;
    $nr_nota_resposta = isset($_POST['nr_nota_resposta']) ? intval($_POST['nr_nota_resposta']) : null;
    $ds_feedback = isset($_POST['ds_feedback']) ? $_POST['ds_feedback'] : null;

    // Validar se todos os campos obrigatórios foram preenchidos
    if ($id_setor && $id_pergunta && $id_dispositivo ) {
        
        // Instanciar a classe HospAvaliacao
        $avaliacao = new HospAvaliacao($conn);

        // Atribuir valores à classe
        $avaliacao->id_setor = $id_setor;
        $avaliacao->id_pergunta = $id_pergunta;
        $avaliacao->id_dispositivo = $id_dispositivo;
        $avaliacao->nr_nota_resposta = $nr_nota_resposta;
        $avaliacao->ds_feedback = $ds_feedback;
        $avaliacao->dt_hora_avaliacao = date('Y-m-d H:i:s'); // Pegando a data/hora atual

        // Inserir a avaliação no banco de dados
        if ($avaliacao->create()) {
            // Retornar uma resposta JSON de sucesso
            echo json_encode(['status' => 'success', 'message' => 'Avaliação inserida com sucesso!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Erro ao inserir a avaliação.']);
        }
    } else {
        // Retornar erro caso algum campo obrigatório esteja faltando
        echo json_encode(['status' => 'error', 'message' => 'Preencha todos os campos obrigatórios.']);
    }
} else {
    // Método de requisição inválido
    echo json_encode(['status' => 'error', 'message' => 'Método de requisição inválido.']);
}
?>
