<?php
namespace Repository;


class AdminRepository
{
    private $conn;
    private $tableName = "admin";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function loginAdmin($name, $password)
    {
        $query = "SELECT `id`, `name`, `password` FROM " . $this->tableName . " WHERE name='".$name."' AND password='".$password."'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

}