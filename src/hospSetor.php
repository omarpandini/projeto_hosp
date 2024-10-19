<?php

class HospSetor
{
    private $conn;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    // Método para inserir um novo setor
    public function insert($ds_setor)
    {
        $sql = "INSERT INTO hosp_setor (ds_setor) VALUES (:ds_setor)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ds_setor', $ds_setor);

        if ($stmt->execute()) {
            return $this->conn->lastInsertId(); // Retorna o ID do setor inserido
        } else {
            return false;
        }
    }

    // Método para atualizar um setor existente
    public function update($id_setor, $ds_setor)
    {
        $sql = "UPDATE hosp_setor SET ds_setor = :ds_setor WHERE id_setor = :id_setor";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ds_setor', $ds_setor);
        $stmt->bindParam(':id_setor', $id_setor);

        return $stmt->execute(); // Retorna verdadeiro se a atualização for bem-sucedida
    }

    // Método para deletar um setor
    public function delete($id_setor)
    {
        $sql = "DELETE FROM hosp_setor WHERE id_setor = :id_setor";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_setor', $id_setor);

        return $stmt->execute(); // Retorna verdadeiro se a deleção for bem-sucedida
    }

    // Método para obter todos os setores
    public function getAll()
    {
        $sql = "SELECT * FROM hosp_setor";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos os setores como um array associativo
    }

    // Método para obter todos os setores em formato JSON
    public function getAllAsJson()
    {
        $setores = $this->getAll(); // Obtém todos os setores
        return json_encode($setores, JSON_UNESCAPED_UNICODE); // Retorna os setores como uma string JSON
    }

}
?>
