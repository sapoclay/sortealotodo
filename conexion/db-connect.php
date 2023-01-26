<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "36159152";
    private $dbname = "rifa";
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