<?php

class Database {
    private $host = "localhost"; // Host de la BD
    private $username = "root"; // Usuario de la BD
    private $password = "XXXXXX"; // Password del usuario
    private $dbname = "rifa"; // Nombre de la base de datos
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if (!$this->conn) {
            die("Fallo en la conexión a la base de datos.");
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function close() {
        $this->conn->close();
    }
}
