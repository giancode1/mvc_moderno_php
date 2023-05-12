<?php
namespace Database\pdo;


use PDO;
use PDOException;

class Connection
{
    private $db_host = DB_HOST;
    private $db_port = DB_PORT;
    private $db_username = DB_USERNAME;
    private $db_password = DB_PASSWORD;
    private $db_name = DB_DATABASE;

    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->db_host};dbname={$this->db_name};port={$this->db_port};charset=utf8mb4", $this->db_username, $this->db_password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            die("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function prepare($sql)
    {
        return $this->conn->prepare($sql);
    }

    public function __destruct()
    {
        $this->conn = null;;
    }

}