<?php

class HospUsuarios {
    private $conn;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    // Método para criar um novo usuário
    public function create($cd_usuario, $ds_senha) {
        $query = "INSERT INTO hosp_usuarios (cd_usuario, ds_senha) VALUES (:cd_usuario, :ds_senha)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':cd_usuario', $cd_usuario);
        $stmt->bindParam(':ds_senha', $ds_senha);
        return $stmt->execute();
    }

    // Método para obter um usuário pelo ID
    public function getById($id_usuario) {
        $query = "SELECT * FROM hosp_usuarios WHERE id_usuario = :id_usuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    // Método para obter todos os usuários
    public function getAll() {
        $query = "SELECT * FROM hosp_usuarios";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para atualizar um usuário
    public function update($id_usuario, $cd_usuario, $ds_senha) {
        $query = "UPDATE hosp_usuarios SET cd_usuario = :cd_usuario, ds_senha = :ds_senha WHERE id_usuario = :id_usuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':cd_usuario', $cd_usuario);
        $stmt->bindParam(':ds_senha', $ds_senha);
        $stmt->bindParam(':id_usuario', $id_usuario);
        return $stmt->execute();
    }

    // Método para deletar um usuário
    public function delete($id_usuario) {
        $query = "DELETE FROM hosp_usuarios WHERE id_usuario = :id_usuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario);
        return $stmt->execute();
    }

    // Método para validar a senha
    public function validatePassword($cd_usuario, $senha_fornecida) {
        // Obtém o usuário pelo código
        $query = "SELECT ds_senha FROM hosp_usuarios WHERE cd_usuario = :cd_usuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':cd_usuario', $cd_usuario);
        $stmt->execute();
        
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Verifica se o usuário foi encontrado
        if ($usuario) {
            // Verifica a senha fornecida com a senha armazenada
            return password_verify($senha_fornecida, $usuario['ds_senha']);
        }

        return false; // Usuário não encontrado ou senha inválida
    }

    // Método para fechar a conexão
    public function close() {
        $this->conn = null;
    }
}


?>
