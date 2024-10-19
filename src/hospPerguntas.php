<?php
class HospPerguntas
{
    private $conn;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    // Método para inserir uma nova pergunta
    public function insert($ds_pergunta, $status_pergunta)
    {
        $query = "INSERT INTO hosp_perguntas (ds_pergunta, status_pergunta) VALUES (:ds_pergunta, :status_pergunta)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':ds_pergunta', $ds_pergunta);
        $stmt->bindParam(':status_pergunta', $status_pergunta);

        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        return false;
    }

    // Método para atualizar uma pergunta existente
    public function update($id_pergunta, $ds_pergunta, $status_pergunta)
    {
        $query = "UPDATE hosp_perguntas SET ds_pergunta = :ds_pergunta, status_pergunta = :status_pergunta WHERE id_pergunta = :id_pergunta";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_pergunta', $id_pergunta);
        $stmt->bindParam(':ds_pergunta', $ds_pergunta);
        $stmt->bindParam(':status_pergunta', $status_pergunta);

        return $stmt->execute();
    }

    // Método para deletar uma pergunta
    public function delete($id_pergunta)
    {
        $query = "DELETE FROM hosp_perguntas WHERE id_pergunta = :id_pergunta";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_pergunta', $id_pergunta);

        return $stmt->execute();
    }


    // Método para obter perguntas (todas ou por ID)
    public function getAll($id_pergunta = null)
    {
        if ($id_pergunta) {
            $query = "SELECT * FROM hosp_perguntas WHERE id_pergunta = :id_pergunta";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id_pergunta', $id_pergunta);
        } else {
            $query = "SELECT * FROM hosp_perguntas";
            $stmt = $this->conn->prepare($query);
        }

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obter todas as perguntas em formato JSON
    public function getAllAsJson($id_pergunta = null)
    {
        $perguntas = $this->getAll($id_pergunta);
        return json_encode($perguntas, JSON_UNESCAPED_UNICODE);
    }

}
