<?php
class Database {
    private $host;
    private $dbname;
    private $user;
    private $password;
    private $port;
    private $conn;

    // Construtor: Carrega as configurações do arquivo config.php
    public function __construct() {
        // Carrega as configurações do arquivo config.php
        $config = require('../config.php');
        
        // Inicializa os parâmetros de conexão com os valores do config.php
        $this->host = $config['host'];
        $this->dbname = $config['dbname'];
        $this->user = $config['user'];
        $this->password = $config['password'];
        $this->port = $config['port'];
    }

    // Método para conectar ao banco de dados
    public function connect() {
        try {
            $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->dbname};";
            $this->conn = new PDO($dsn, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
            return null;
        }
    }

    // Método para desconectar do banco de dados
    public function disconnect() {
        $this->conn = null;
    }
}
