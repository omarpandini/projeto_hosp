<?php

class HospAvaliacao
{
    private $pdo;

    public $id_avaliacao;
    public $id_setor;
    public $id_pergunta;
    public $id_dispositivo;
    public $nr_nota_resposta;
    public $ds_feedback;
    public $dt_hora_avaliacao;

    // Construtor que recebe a instância do PDO
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Método para criar uma nova avaliação
    public function create()
    {
        $sql = "INSERT INTO hosp_avaliacoes (id_setor, id_pergunta, id_dispositivo, nr_nota_resposta, ds_feedback, dt_hora_avaliacao)
                VALUES (:id_setor, :id_pergunta, :id_dispositivo, :nr_nota_resposta, :ds_feedback, :dt_hora_avaliacao)";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_setor', $this->id_setor);
        $stmt->bindParam(':id_pergunta', $this->id_pergunta);
        $stmt->bindParam(':id_dispositivo', $this->id_dispositivo);
        $stmt->bindParam(':nr_nota_resposta', $this->nr_nota_resposta);
        $stmt->bindParam(':ds_feedback', $this->ds_feedback);
        $stmt->bindParam(':dt_hora_avaliacao', $this->dt_hora_avaliacao);

        return $stmt->execute();
    }

    // Método para buscar uma avaliação pelo ID
    public function read($id)
    {
        $sql = "SELECT * FROM hosp_avaliacoes WHERE id_avaliacao = :id_avaliacao";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_avaliacao', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para atualizar uma avaliação
    public function update()
    {
        $sql = "UPDATE hosp_avaliacoes 
                SET id_setor = :id_setor, id_pergunta = :id_pergunta, id_dispositivo = :id_dispositivo, 
                    nr_nota_resposta = :nr_nota_resposta, ds_feedback = :ds_feedback, dt_hora_avaliacao = :dt_hora_avaliacao
                WHERE id_avaliacao = :id_avaliacao";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_avaliacao', $this->id_avaliacao);
        $stmt->bindParam(':id_setor', $this->id_setor);
        $stmt->bindParam(':id_pergunta', $this->id_pergunta);
        $stmt->bindParam(':id_dispositivo', $this->id_dispositivo);
        $stmt->bindParam(':nr_nota_resposta', $this->nr_nota_resposta);
        $stmt->bindParam(':ds_feedback', $this->ds_feedback);
        $stmt->bindParam(':dt_hora_avaliacao', $this->dt_hora_avaliacao);

        return $stmt->execute();
    }

    // Método para deletar uma avaliação
    public function delete($id)
    {
        $sql = "DELETE FROM hosp_avaliacoes WHERE id_avaliacao = :id_avaliacao";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_avaliacao', $id);
        return $stmt->execute();
    }

    // Método para listar todas as avaliações
    public function listAll()
    {
        $sql = "SELECT * FROM hosp_avaliacoes";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
