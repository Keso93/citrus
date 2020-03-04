<?php

namespace Database;

use PDO;
use PDOException;

class Database
{
    private $host="localhost";
    private $username="marko";
    private $password="root";
    private $dbName="citrus";

    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}