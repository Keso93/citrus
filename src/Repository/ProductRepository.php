<?php

namespace Repository;


class ProductRepository
{
    private $conn;
    private $tableName = "product";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function findAll()
    {
        $query = "select * from " . $this->tableName;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

}