<?php
namespace Database\mysqli;

use mysqli;
use Exception;

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
            $this->conn = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name, $this->db_port);
            $this->conn->set_charset("utf8mb4");
        } catch (Exception $e) {
            die("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }
    
    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }

    public function __destruct()
    {
        $this->conn->close();
    }

}