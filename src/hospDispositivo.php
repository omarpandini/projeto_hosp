<?php

class HospDispositivo
{
    private $pdo;

    public $id_dispositivo;
    public $nome_dispositivo;
    public $status_dispositivo;

    // Construtor que recebe a instância do PDO
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Método para criar um novo dispositivo
    public function create()
    {
        $sql = "INSERT INTO hosp_dispositivos (nome_dispositivo, status_dispositivo) 
                VALUES (:nome_dispositivo, :status_dispositivo)";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nome_dispositivo', $this->nome_dispositivo);
        $stmt->bindParam(':status_dispositivo', $this->status_dispositivo);

        return $stmt->execute();
    }

    // Método para buscar um dispositivo pelo ID
    public function read($id)
    {
        $sql = "SELECT * FROM hosp_dispositivos WHERE id_dispositivo = :id_dispositivo";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dispositivo', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para atualizar um dispositivo
    public function update()
    {
        $sql = "UPDATE hosp_dispositivos 
                SET nome_dispositivo = :nome_dispositivo, status_dispositivo = :status_dispositivo
                WHERE id_dispositivo = :id_dispositivo";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dispositivo', $this->id_dispositivo);
        $stmt->bindParam(':nome_dispositivo', $this->nome_dispositivo);
        $stmt->bindParam(':status_dispositivo', $this->status_dispositivo);

        return $stmt->execute();
    }

    // Método para deletar um dispositivo
    public function delete($id)
    {
        $sql = "DELETE FROM hosp_dispositivos WHERE id_dispositivo = :id_dispositivo";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dispositivo', $id);
        return $stmt->execute();
    }

    // Método para listar todos os dispositivos
    public function listAll($idStatus = null)
    {
        $sql = "SELECT * FROM hosp_dispositivos WHERE (status_dispositivo = :status_dispositivo or :status_dispositivo is null) ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':status_dispositivo', $idStatus);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
