<?php

namespace Repository;

use Entity\Comment;

class CommentRepository
{
    private $conn;
    private $tableName = "comment";

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

    public function findApprovedComment()
    {
        $query = "select * from " . $this->tableName . " where approve=1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function findUnapprovedComments()
    {
        $query = "select * from " . $this->tableName . " where approve=0";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function save(Comment $comment)
    {
        // query to insert record
        $query = "INSERT INTO " . $this->tableName . " SET name=:name, email=:email, 
        text=:text, date=:date, approve=:approve";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $comment->setName(htmlspecialchars(strip_tags($comment->getName())));
        $comment->setEmail(htmlspecialchars(strip_tags($comment->getEmail())));
        $comment->setText(htmlspecialchars(strip_tags($comment->getText())));
        $comment->setDate(htmlspecialchars(strip_tags($comment->getDate())));
        $comment->setApprove(htmlspecialchars(strip_tags($comment->getApprove())));

        // bind values
        $stmt->bindParam(":name", $comment->getName());
        $stmt->bindParam(":email", $comment->getEmail());
        $stmt->bindParam(":text", $comment->getText());
        $stmt->bindParam(":date", $comment->getDate());
        $stmt->bindParam(":approve", $comment->getApprove());

        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }
        return false;
    }

    public function editComment($id, $approve)
    {
        $query = "update " . $this->tableName . " set approve = " . "'" . $approve . "' where id = " . $id;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}