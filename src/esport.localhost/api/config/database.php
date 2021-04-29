<?php


class Database {
    private $host;
    private $db_name;
    private $username;
    private $password ;
    public $conn;

    public function __construct() {
        $this->host = 'mysql';
        $this->db_name = 'api';
        $this->username = 'root';
        $this->password = 'root';
    }

    public function getConnection() {
        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";port=3307;dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
